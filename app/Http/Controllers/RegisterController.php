<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use App\Models\Company;
class RegisterController extends Controller
{
    public function create()
    {
        return view('Register/create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'company_name' => ['required', 'max:101'],
            'industry' => ['required', 'string', 'max:100'],
            'company_description' => ['required', 'max:400'],
            'location' => ['required', 'string', 'max:100'],
            'company_email' => ['required', 'email', 'unique:companies,email'],
            'password' => ['required', Password::min(6)->mixedCase()],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:5048']
        ]);
        
        if ($request->hasFile('image')) {
            $image_name = Str::random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $image_name );
            $attributes['image'] = asset('images/'.$image_name);
        }

        $user = Company::create($attributes);
        auth()->login($user);
        return redirect()->route('dashboard.index')->with('success', 'Company account has been created!');
    }
}
