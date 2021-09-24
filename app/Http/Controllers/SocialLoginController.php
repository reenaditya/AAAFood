<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Cache;

class SocialLoginController extends Controller
{

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            
            $url = '/';
            if(Cache::has('checkout_url')){
                $url = Cache::get('checkout_url');
            }

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();
     
            if($isUser){
                Auth::login($isUser);
                Cache::forget('checkout_url');
                return redirect($url);
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);
    
                Auth::login($createUser);
                Cache::forget('checkout_url');
                return redirect($url);
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            
            $url = '/';
            if(Cache::has('checkout_url')){
                $url = Cache::get('checkout_url');
            }
                 
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
                Cache::forget('checkout_url');
                
                return redirect($url);
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
                Cache::forget('checkout_url');
                
                return redirect($url);
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
        

}
