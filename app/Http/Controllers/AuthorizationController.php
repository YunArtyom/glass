<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class AuthorizationController extends Controller
{
    public function authenticationPage(): View
    {
        return view('pages/authentication');
    }

    public function login(LoginFormRequest $request): RedirectResponse
    {
        $login = $request->validated()['email'];
        $password = $request->validated()['password'];
        $remember = $request->validated()['remember_me'] ?? false;

        if (Auth::attempt(['email' => $login, 'password' => $password], $remember)) {
            $request->session()->regenerate();

            return redirect()->intended();
        } else {
            return back()->withErrors([
                'email' => 'Логин или пароль не действительны!',
            ])->onlyInput('email');
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->intended('/authentication');
    }
}
