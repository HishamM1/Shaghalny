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
            'jobs' => Job::latest()
                ->select("jobs.*", "categories.category_name", "companies.location")
                ->join('categories', 'categories.id', '=', 'jobs.category_id')
                ->join('companies', 'companies.id', '=', 'jobs.company_id')
                ->filter(request(['search', 'type', 'category', 'country']))
                ->paginate(6)->withQueryString(),
            'jobtypes' => Job::select('type')->distinct()->pluck('type'),
            'companies' => Company::all(),
            'countries' => Company::select('location')->distinct()->pluck('location'),
            'categories' => Category::pluck("category_name")
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
