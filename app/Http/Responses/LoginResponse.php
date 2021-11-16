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
        if(Cache::has('redirect_url')){
            $url = Cache::get('redirect_url');
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
        Cache::forget('redirect_url');
        return redirect()->intended($home);
    }
}