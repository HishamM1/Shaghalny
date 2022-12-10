<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ApplicationController extends Controller
{
    public function show(Job $job)
    {
        return view(
            'applicationFormPage',
            ['job' =>  $job]
        );
    }

    public function storeApplication(Request $request)
    {
        $attributes = request()->validate([
            'job_id' => ['required', Rule::exists('jobs', 'id')],
            'full_name' => ['required', 'string'],
            'number' => ['required', 'numeric', 'digits:11'],
            'email' => ['required', 'email'],
            'finished_military' => ['required'],
            'about_applier' => ['required', 'max:800'],
            'cv' => ['required', 'max:5048']
        ]);
        $attributes['cv'] = request()->file('cv')->store('cvs', 'public');
        Application::create($attributes);
        return redirect('/')->with('success', 'Application has been sent!');
    }
}
