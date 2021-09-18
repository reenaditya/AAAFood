<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

use Cache;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $url = '/';
        if(Cache::has('checkout_url')){
            $url = Cache::get('checkout_url');
        }

    	switch (auth()->user()->role) {
    		case 1:
    			$home = "/admin/dashboard";
    			break;
    		case 2:
    			$home = "/admin/dashboard";
    			break;
            case 3:
                $home = "/admin/dashboard";
                break;
    		
    		default:
    			$home = $url;
    			break;
    	}
        Cache::forget('checkout_url');
        return redirect()->intended($home);
    }
}