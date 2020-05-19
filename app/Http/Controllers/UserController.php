<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home()
    {
        if (session()->get('blog_name')) {
            return redirect()->to('/posts');
        } else {
            return view('guest');
        }
    }
    public function resetpasswd(){
        return "503";
    }
    public function page_signin()
    {
        return view('user.signin');
    }
    public function page_signup()
    {
        return view('user.signup');
    }
    public function page_resetpasswd()
    {
        return view('user.resetpasswd');
    }
    public function page_logout()
    {
        session()->flush();
        return redirect()->to('/');
    }
    public function api_signup(Request $request)
    {
        $blog_name = $request->input('blog_name');
        $email = $request->input('email');
        $md5_passwd = $request->input('md5_passwd');

        $blog_name_count = DB::table('settings')->where(['blog_name' => $blog_name])->count();
        $email_count = DB::table('settings')->where(['email' => $email])->count();

        $flag = true;
        $err = [];

        if ($email_count >= 1) {
            $err[] = ['err_type' => 'email', 'err_msg' => '电子邮件已存在'];
            $flag = false;
        }
        if ($blog_name_count >= 1) {
            $err[] = ['err_type' => 'blog_name', 'err_msg' => '博客名称已存在'];
            $flag = false;
        }

        if ($flag) {
            DB::table('settings')->insert(['email' => $email, 'md5_passwd' => $md5_passwd, 'blog_name' => $blog_name]);
            session()->put('email', $email);
            session()->put('blog_name', $blog_name);
            session()->flash('success', '您已注册成功！');
            return response()->json(['err' => false, 'signup' => true]);
        } else {
            $err[] = ['err_type' => 'alert', 'err_msg' => '存在一些错误，请更正后再提交'];
            return response()->json(['err' => true, 'errs' => $err]);
        }
    }
    public function api_signin(Request $request)
    {
        $email = $request->input('email');
        $md5_passwd = $request->input('md5_passwd');

        $user = DB::table('settings')->where(['email' => $email, 'md5_passwd' => $md5_passwd])->first();

        $err = [];

        if ($user !== null) {
            session()->flash('success', '您已登陆成功！');
            session()->put('email', $email);
            session()->put('blog_name', $user->blog_name);
            return response()->json(['err' => false, 'signup' => true]);
        } else {
            $err[] = ['err_type' => 'alert', 'err_msg' => '登陆失败'];
            return response()->json(['err' => true, 'errs' => $err]);
        }
    }
}
