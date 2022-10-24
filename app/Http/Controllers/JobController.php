<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Company;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function getJobs()
    {
        $jobs = Job::latest();
        $searched = 'All Jobs';
        if (request('search')) {
            $jobs->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
            $searched = request('search');
        }
    }
    public function search()
    {
        $jobs = Job::latest();
        $searched = 'All Jobs';
        if (request('search')) {
            $jobs->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
            $searched = request('search');
        }

        return view('jobs', [
            'jobs' => $jobs->get(),
            'jobtypes' => Job::select('type')->distinct()->pluck('type'),
            'companies' => Company::all(),
            'countries' => Company::select('location')->distinct()->pluck('location'),
            'categories' => Category::all(),
            'searched' => $searched
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
