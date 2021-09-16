<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public  function  redirect($service){
        return Socialite::driver($service)->redirect();
    }

    public  function  callback($service, Request $request){
        $user = Socialite::with($service);
        return response()->json($user);
    //    $provider = Socialite::with($service);
     //   return    $user = $provider->stateless()->user();



    }


}
