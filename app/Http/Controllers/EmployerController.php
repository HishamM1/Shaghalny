<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Auth\Authenticatable;

class EmployerController extends Controller
{
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('employer');
    }
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'company_name' => ['required', 'max:100'],
            'industry' => ['required', 'string', 'max:100'],
            'company_description' => ['required', 'max:400'],
            'location' => ['required', 'string', 'max:100'],
            'company_email' => ['required', 'email', Rule::unique('companies', 'company_email')],
            'password' => ['required', Password::min(6)->mixedCase()],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5048']
        ]);
        $attributes['image'] = $request->file('image')->store('images', 'public');

        $user = Company::create($attributes);
        auth()->login($user);
        return redirect('/')->with('success', 'Company account has been created!');
    }
}
