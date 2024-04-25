<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect($Provider){
        return Socialite::driver($Provider)->redirect();
    }

    
    public function callback($Provider)
{
    $socialUser = Socialite::driver($Provider)->user();

    $user = User::firstOrCreate(
        ['email' => $socialUser->getEmail()],
        [
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'provider_id' => $socialUser->getId(),
            'provider' => $Provider,
            'provider_token' => $socialUser->token,
            'image' => $socialUser->getAvatar(),
        ]
    );

    Auth::login($user);

    return redirect()->route('Home.index')->with('message', 'Votre message ici');
}

}
