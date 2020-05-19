<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function get()
    {
        if (session()->get('blog_name')) {
            $blog_name = session()->get('blog_name');
            $setting = DB::table('settings')->where(['blog_name' => $blog_name])->first();
            return view('user.settings')->with(['blog_name' => $blog_name, 'setting' => $setting]);
        } else {
            return redirect()->to('/signin');
        }
    }
    public function put(Request $request)
    {
        if (session()->get('blog_name')) {
            $blog_name = session()->get('blog_name');
            $blog_bio = $request->input('blog_bio');
            DB::table('settings')->where(['blog_name' => $blog_name])->update(['blog_bio' => $blog_bio]);
            return response()->json(['err' => false, 'msg' => 'ok']);
        } else {
            return response()->json(['err' => true, 'msg' => 'err']);
        }
    }
}
