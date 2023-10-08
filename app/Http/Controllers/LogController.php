<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LogController extends Controller
{
    public function show()
    {
        return view('Login/index');
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'company_email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (!auth()->attempt($user)) {
            throw ValidationException::withMessages(['loginerror' => 'Your email or password were incorrect.']);
        }
        //to handle session fixation
        session()->regenerate();
        return redirect()->route('dashboard.index');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
