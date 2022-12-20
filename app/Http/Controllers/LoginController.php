<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function index()
    {
        return view('twitter.mypage.login');
    }

    public function redirectToProvider(Request $request)
    {
        if(!$request->isMethod('post')){
            return view('twitter.mypage.login');
        }
        //ログインボタンを押したらTwitterの認証ページへ
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $twitterUser = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        if(User::where('name', $twitterUser->getNickname())->exists()) {
            $user = User::where('name', $twitterUser->getNickname())->first();
        }
        else {
            $user = new User();
            $user->name = $twitterUser->getNickname();
            $user->password = md5(Str::uuid()->toString());
            $user->profile_photo_path = $twitterUser->getAvatar();
            $user->twitter = true;
            $user->save();
        }
        Log::info($user);
        Auth::login($user);
        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}