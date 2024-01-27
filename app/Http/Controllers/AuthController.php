<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function signup()
    {
        return view('auth.signup');
    }

    function register(UserRequest $req) {

        $user = User::create($req->all());
        
        if(!$user) return "usuario no creado";

        return redirect()->route('auth.signin');
    }

    function signin () {
        return view ("auth.signin");
    }

    function login(LoginUserRequest $req) {
        $credentials = $req->only('email', 'password');
        
        if(!Auth::validate($credentials)) 
            return redirect()
                    ->to('auth.signin')
                    ->withErrors('auth.failed');

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($req, $user);
    }

    function authenticated(LoginUserRequest $req, $user) {
        return redirect()->route('short.index');
    }

    function logout () {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.signin');
    }
  
}
