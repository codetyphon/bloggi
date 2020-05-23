<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Socialite;

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
    public function resetpasswd()
    {
        return "503";
    }
    public function page_signin()
    {
        return view('user.signin');
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
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $user_name = $user->nickname;
        $user_email = $user->email;
        session()->put('email', $user_email);
        session()->put('blog_name', $user_name);
        return redirect()->to('/posts');
    }
}
