<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Illuminate\Auth\AuthenticationException;

class AuthenticateController extends Controller
{
    public function reg()
    {
        $user = User::create(request()->only(['email', 'password']));

        $user = User::find($user->id);
        
        Auth::login($user);

        return response('', 204);
    }

    public function login()
    {
        $user = User::where('email', request('email'))->first();

        if(!$user) {
            abort(401);
        }

        if(! $user->verified_at) {
            abort(422);
        }

        if (! Auth::attempt(request()->only(['email', 'password']))) {
            throw new AuthenticationException;
        }

        Auth::login(Auth::user());

        return response('', 204);
    }

    public function logout()
    {
        Auth::logout();

        return response('', 204);
    }

    public function check()
    {
        if(Auth::check()) {
            return 'true';
        } else {
            return 'false';
        }
    }
}
