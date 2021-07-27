<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
    	switch (auth()->user()->role) {
    		case 1:
    			$home = "/";
    			break;
    		case 2:
    			$home = "/admin/dashboard";
    			break;
    		
    		default:
    			$home = "/";
    			break;
    	}
        
        return redirect()->intended($home);
    }
}