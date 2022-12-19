<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class MyPageController extends Controller
{

    public function index()
    {
        return view('twitter.mypage.login');
    }

    public function login(Request $request)
    {
        if(!$request->isMethod('post')){
            return view('twitter.mypage.login');
        }
        //ログインボタンを押したらTwitterの認証ページへ
        return Socialite::driver('twitter')->redirect();
    }

    public function callback(Request $request)
    {
        dd('ok');
    }
}