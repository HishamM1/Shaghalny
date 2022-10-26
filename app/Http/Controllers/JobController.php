<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Company;

use Illuminate\Http\Request;

class JobController extends Controller
{

    public function search()
    {
        return view('jobs', [
            'jobs' => Job::latest()->filter(request(['search', 'type']))->get(),
            'jobtypes' => Job::select('type')->distinct()->pluck('type'),
            'companies' => Company::all(),
            'countries' => Company::select('location')->distinct()->pluck('location'),
            'categories' => Category::all(),
        ]);
    }

    public function show(Job $job)
    {
        return view('job', [
            'job' => $job,
            'companies' => Company::all(),
            'categories' => Category::all()
        ]);
    }
}