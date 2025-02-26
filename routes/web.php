<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Job;

/*Route::get('/', function () {
    $jobs = Job::all();

    dd($jobs[0]->title);
});*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(3);
    // $jobs = Job::with('employer')->simplePaginate(3);
    //$jobs = Job::with('employer')->cursorPaginate(3);
    return view('jobs.index', ["jobs" => $jobs]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{jobId}', function ($jobId) {
    $job = Job::find($jobId);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/post', [PostController::class, "index"]);

