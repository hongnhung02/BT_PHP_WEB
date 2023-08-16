<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $params = $request->all('first_name', 'last_name', 'email', 'password');
        $params['password'] = bcrypt($params['password']);
        $user = $this->user->create($params);
        if ($user) {
            return redirect()->route('auth.login');
        }
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $params = $request->all('email', 'password');
        if (Auth::attempt($params)) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
