<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::query()
            ->where('google_user_id', $googleUser->id)
            ->orWhere('email', $googleUser->email)->first();

        if($user){

            Auth::login($user);

            if (session('url')) {
                return redirect(session('url'));
            }

            return redirect('/');

        }
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_user_id'=> $googleUser->id,
                'social_type'=> 'google',
                'password' => encrypt(config('app.social_admin_password')),
                'qr_token' => Str::random(60),
            ]);

            Auth::login($user);

        if (session('url')) {
            return redirect(session('url'));
        }

        return redirect('/');
    }
}
