<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialiteConnection;
use App\Models\SocialiteType;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller {
    public function githubLogin() {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubLogin() {
        $socialiteUser = Socialite::driver('github')->user();

        if ($socialiteConnection = SocialiteConnection::where('external_id', $socialiteUser->id)->first()) {
            Auth::login(User::find($socialiteConnection->user_id));
            return redirect(route('home', absolute: false));
        }

        $newGithubUser = User::create([
            'username' => $socialiteUser->nickname,
            'email' => $socialiteUser->email,
            'avatar' => $socialiteUser->avatar,
            'is_socialite_user' => true,
            'timezone' => getDeviceTimezone()
        ]);

        SocialiteConnection::create([
            'user_id' => $newGithubUser->getKey(),
            'socialite_type_id' => SocialiteType::GITHUB_ID,
            'external_id' => $socialiteUser->id,
            'external_token' => $socialiteUser->token,
            'external_refresh_token' => $socialiteUser->refreshToken
        ]);

        event(new Registered($newGithubUser));

        Auth::login($newGithubUser);

        return redirect(route('home', absolute: false));
    }
}
