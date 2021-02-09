<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthenticateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }
    public function __invoke(Request $request)
    {
        $user= $request->user();
        return response()->json([
            'user'=>$user,
        ]);    
    }
}
