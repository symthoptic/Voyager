<?php

namespace Voyager\App\Handlers/Auth;

use Illuminate\App\Request;
use Illuminate\Support\Facades\Auth;
use Voyager\App\Handlers\Controller;

class AutoLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
