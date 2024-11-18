<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function login(): View
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.animal.index'));
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrect'
        ])->onlyInput('email');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }

}
