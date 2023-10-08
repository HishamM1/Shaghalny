<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ApplicationController extends Controller
{
    public function index(Job $job)
    {
        return view(
            'Applications/index',
            [
            'applications' => $job->applications,
            'job_title' => $job->title,
            'job_id' => $job->id
            ]
        );
    }
    public function create(Job $job)
    {
        return view(
            'Applications/create',
            ['job' =>  $job]
        );
    }

    public function store(Job $job, StoreApplicationRequest $request)
    {
        $attributes = $request->validated();
        $cv_name = Str::random(30) . '.' . $request->file('cv')->getClientOriginalExtension();
        $request->file('cv')->move(public_path('cvs'), $cv_name );
        $attributes['cv'] = asset('cvs/'.$cv_name);
        $job->applications()->create($attributes);

        return redirect('/')->with('success', 'Application has been sent!');
    }

    public function destroy(Job $job, Application $application)
    {
        if(file_exists(public_path('cvs/'.basename($application->cv)))){
            unlink(public_path('cvs/'.basename($application->cv)));
        }
        $application->delete();
        return redirect()->back()->with('success', 'Application Deleted!');
    }
}
