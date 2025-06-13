<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendTokenFcm extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $token = $request->token_fcm;
        $user = $request->user();
        $user->fcm_token = $token;
        $user->save();
    }
}
