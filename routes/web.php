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
    $jobs = Job::with('employer')->paginate(3);
    // $jobs = Job::with('employer')->simplePaginate(3);
    //$jobs = Job::with('employer')->cursorPaginate(3);
    return view('jobs', ["jobs" => $jobs]);
});

Route::get('/jobs/{jobId}', function ($jobId) {
    $job = Job::find($jobId);
    return view('job', ['job' => $job]);
});

Route::get('/post', [PostController::class, "index"]);

