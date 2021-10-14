<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    /*
    * Chat model
    *
    */
    public function chatMessage(Request $request)
    {
        if ($request->message) {
            Chat::create($request->all());
        }
        return back();
    }    
}
