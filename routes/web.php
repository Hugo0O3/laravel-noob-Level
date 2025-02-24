<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50000'
            ], [
                'id' => 2,
                'title' => 'Developer',
                'salary' => '$30000'
            ], [
                'id' => 3,
                'title' => 'Manager',
                'salary' => '$5555'
            ],
        ]
    ]);
});

Route::get('/jobs/{jobId}', function ($jobId) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '$50000'
        ], [
            'id' => 2,
            'title' => 'Developer',
            'salary' => '$30000'
        ], [
            'id' => 3,
            'title' => 'Manager',
            'salary' => '$5555'
        ],
    ];

    $job = Arr::first($jobs, fn($job) => $job['id'] == $jobId);
    return view('job', ['job' => $job]);
});

Route::get('/post', [PostController::class, "index"]);
