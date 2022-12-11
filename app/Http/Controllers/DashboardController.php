<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Application;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function show(Company $company)
    {
        return view('dashboard', [
            'jobs' => Job::where('company_id', $company->id)->get()
        ]);
    }
    public function delete(Job $job)
    {
        Job::find($job->id)->delete();
        return redirect()->route('dashboard', ['company' => $job->company_id])->with('success', 'Job Deleted!');
    }
    public function jobApplications(Job $job)
    {
        $applications = Application::where('job_id', $job->id)->get();
        return view(
            'applications',
            ['applications' => $applications, 'jobTitle' => $job->title]
        );
    }
    public function deleteApplication(Application $application)
    {
        $cv = Application::find($application->id)->cv;
        Storage::delete('public/' . $cv);
        Application::find($application->id)->delete();
        return redirect()->back()->with('success', 'Application Deleted!');
    }
    public function addJob(Company $company)
    {
        return view('addJob', [
            'company' => $company->id,
            'categories' => Category::all()
        ]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'job_description' => 'required',
            'experience' => 'required',
            'category_id' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'company_id' => 'required'
        ]);
        Job::create($attributes);
        return redirect()->route('dashboard', ['company' => $request->company_id])->with('success', 'Job Added!');
    }
    public function showupdateJob(Job $job)
    {
        return view('updateJob', [
            'job' => $job,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'job_description' => 'required',
            'experience' => 'required',
            'category_id' => 'required',
            'salary' => 'required',
            'type' => 'required',
        ]);
        Job::where('id', $job->id)->update($attributes);
        return redirect()->route('dashboard', ['company' => $request->company_id])->with('success', 'Job Updated!');
    }
}
