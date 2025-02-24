<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Job;

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
    return view('jobs', ["jobs" => Job::all()]);
});

Route::get('/jobs/{jobId}', function ($jobId) {
    $job = Job::find($jobId);
    return view('job', ['job' => $job]);
});

Route::get('/post', [PostController::class, "index"]);
