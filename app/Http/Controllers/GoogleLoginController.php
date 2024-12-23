<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('handleGoogleLogout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // $googleUser = Socialite::driver('google')->stateless()->user();
            $googleUser = Socialite::driver('google')->user();
            // OAuth 2.0 providers...
            $token        = $googleUser->token;
            $refreshToken = $googleUser->refreshToken;
            $expiresIn    = $googleUser->expiresIn;
            // dd($googleUser->id);

            $user = User::where('google_id', $googleUser->id)->first();
            if (!$user) {
                $user = User::updateOrCreate(
                    [
                        'google_id' => $googleUser->id,
                    ],
                    [
                        'name'           => $googleUser->name,
                        'email'          => $googleUser->email,
                        'remember_token' => $token,
                        'password'       => Hash::make(rand(1000, 9999))
                    ]
                );
            }

            auth('web')->login($user);
            session()->regenerate();

            // return redirect(RouteServiceProvider::HOME);
            return redirect()->intended(RouteServiceProvider::HOME);
            // return redirect()->intended('chat-ai');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function handleGoogleLogout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
