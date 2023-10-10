<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Category;
use App\Models\Company;

use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        return view('Jobs/index', [
            'jobs' => Job::latest()
                ->select("jobs.*", "categories.category_name", "companies.location")
                ->join('categories', 'categories.id', '=', 'jobs.category_id')
                ->join('companies', 'companies.id', '=', 'jobs.company_id')
                ->filter(request(['search', 'type', 'category', 'country']))
                ->paginate(6)->withQueryString(),
            'job_types' => Job::select('type')->distinct()->pluck('type'),
            'companies' => Company::all(),
            'countries' => Company::select('location')->distinct()->pluck('location'),
            'categories' => Category::pluck("category_name")
        ]);
    }

    public function show(Job $job)
    {
        return view('Jobs/show', [
            'job' => $job,
            'companies' => Company::all(),
            'categories' => Category::all()
        ]);
    }

    public function create(Request $request) {
        return view('Jobs/create', [
            'company' => $request->user()->id,
            'categories' => Category::all()
        ]);
    }

    public function store(StoreJobRequest $request)
    {
        $request->user()->jobs()->create($request->validated());
        return redirect()->route('dashboard.index')->with('success', 'Job Added!');
    }

    public function edit(Job $job)
    {
        return view('Jobs/edit', [
            'job' => $job,
            'categories' => Category::all()
        ]);
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->validated());
        return redirect()->route('dashboard.index')->with('success', 'Job Updated!');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('dashboard.index')->with('success', 'Job Deleted!');
    }
}
