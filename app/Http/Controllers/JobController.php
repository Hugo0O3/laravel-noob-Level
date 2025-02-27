<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public static function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(3);
        // $jobs = Job::with('employer')->simplePaginate(3);
        //$jobs = Job::with('employer')->cursorPaginate(3);
        return view('jobs.index', ["jobs" => $jobs]);
    }

    public static function create()
    {
        return view('jobs.create');
    }

    public static function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public static function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public static function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public static function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

//    $job = Job::findOrFail($jobId);

        $job->title = request('title');
        $job->salary = request('salary');
//    $job->save();

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public static function destroy(Job $job)
    {
//    $job = Job::findOrFail($jobId);
        $job->delete();

        // Version plus court
//    Job::findOrFail($jobId)->delete();

        return redirect('/jobs');
    }

}
