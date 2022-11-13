<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class LogController extends Controller
{
    public function view()
    {
        return view('login');
    }

    public function login():
    {
        $user = request()->validate([
            'company_email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (!auth()->attempt($user)) {
            throw ValidationException::withMessages(['loginerror' => 'Your email or password were incorrect.']);
        }
        //to handle session fixation
        session()->regenerate();
        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
