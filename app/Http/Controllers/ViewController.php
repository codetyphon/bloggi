<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function home($blog_name)
    {
        $pages = DB::table('pages')
            ->where(['blog_name' => $blog_name])
            ->orderBy('id', 'desc')
            ->get();
        $posts = DB::table('posts')
            ->where(['blog_name' => $blog_name])
            ->orderBy('time', 'desc')
            ->paginate(10);
        return view('view.view')->with(['blog_name' => $blog_name, 'posts' => $posts, 'pages' => $pages]);
    }
    public function explorer()
    {
        $pages = [];
        $posts = DB::table('posts')
            ->orderBy('time', 'desc')
            ->paginate(10);
        return view('view.view')->with(['blog_name' => 'explorer', 'posts' => $posts, 'pages' => $pages]);
    }
    public function post($blog_name,$slug)
    {
        $pages = DB::table('pages')
            ->where(['blog_name' => $blog_name])
            ->orderBy('id', 'desc')
            ->get();
        $post = DB::table('posts')
            ->where(['blog_name' => $blog_name,'slug'=>$slug])
            ->first();
        return view('view.post')->with(['blog_name' => $blog_name, 'post' => $post, 'pages' => $pages]);
    }
    public function page($blog_name,$slug)
    {
        $pages = DB::table('pages')
            ->where(['blog_name' => $blog_name])
            ->orderBy('id', 'desc')
            ->get();
        $post = DB::table('pages')
            ->where(['blog_name' => $blog_name,'slug'=>$slug])
            ->first();
        return view('view.page')->with(['blog_name' => $blog_name, 'post' => $post, 'pages' => $pages]);
    }
}
