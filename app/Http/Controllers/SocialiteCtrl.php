<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;
use iloilofinest\Http\Requests;

use iloilofinest\Http\Controllers\Controller;
use iloilofinest\SocialAccountService;

use Socialite;

class SocialiteCtrl extends Controller
{
    
    public function redirect_facebook($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback_facebook(SocialAccountService $service,$provider)
    {
		$user = $service->createOrGetUser(Socialite::driver($provider));
		auth()->login($user);
		return redirect('/admin');
    }







}
