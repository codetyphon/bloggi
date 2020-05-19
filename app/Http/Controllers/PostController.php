<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function from10to62($dec)
{
    $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    do {
        $result = $dict[$dec % 62] . $result;
        $dec = intval($dec / 62);
    } while ($dec != 0);
    return $result;
}

class PostController extends Controller
{
    public function list()
    {
        if (session()->get('blog_name')) {
            $blog_name = session()->get('blog_name');
            $posts = DB::table('posts')
                ->where(['blog_name' => $blog_name])
                ->orderBy('time', 'desc')
                ->paginate(10);
            return view('manage.posts')->with(['blog_name' => $blog_name, 'posts' => $posts]);
        } else {
            return redirect()->to('/signin');
        }
    }
    public function new()
    {
        if (session()->get('blog_name')) {
            $blog_name = session()->get('blog_name');
            $count = DB::table('posts')->count();
            $sid = from10to62(10000000000 + $count);
            $slug = $sid;
            DB::table('posts')->insert(['sid' => $sid, 'slug' => $slug, 'blog_name' => $blog_name]);
            return redirect()->to("/posts/$sid");
        } else {
            return redirect()->to('/signin');
        }
    }
    public function edit($sid)
    {
        if (session()->get('blog_name')) {
            $post = DB::table('posts')->where(['sid' => $sid])->first();
            return view('manage.post')->with(['post' => $post]);
        } else {
            return redirect()->to('/signin');
        }
    }
    public function save(Request $request)
    {
        if (session()->get('blog_name')) {
            $blog_name = session()->get('blog_name');
            $title = $request->input('title');
            $text = $request->input('text');
            $slug = $request->input('slug');
            $time = $request->input('time');
            $sid = $request->input('sid');

            DB::table('posts')->where(['sid' => $sid, 'blog_name' => $blog_name])
                ->update([
                    'title' => $title,
                    'text' => $text,
                    'time' => $time,
                ]);
            $count = DB::table('posts')
                ->where(['slug' => $slug])
                ->count();
            if ($count == 0) {
                DB::table('posts')->where(['sid' => $sid, 'blog_name' => $blog_name])
                    ->update([
                        'slug' => $slug
                    ]);
            }
            return response()->json(['err' => false, 'msg' => 'saved']);
        } else {
            return response()->json(['err' => true, 'msg' => 'session']);
        }
    }
    public function del(Request $request)
    {
        if (session()->get('blog_name')) {
            $blog_name = session()->get('blog_name');
            $sid = $request->input('sid');
            DB::table('posts')->where(['sid' => $sid, 'blog_name' => $blog_name])
                ->delete();
            return response()->json(['err' => false, 'msg' => 'deleted']);
        } else {
            return response()->json(['err' => true, 'msg' => 'session']);
        }
    }
}
