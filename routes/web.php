<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Job;

/*Route::get('/', function () {
    $jobs = Job::all();

    dd($jobs[0]->title);
});*/

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');


//Route::controller(JobController::class)->group(function () {
//// index
//    Route::get('jobs', 'index');
//// create
//    Route::get('/jobs/create', 'create');
//// show
//    Route::get('/jobs/{job}', 'show');
//// store
//    Route::post('/jobs', 'store');
//// Edit
//    Route::get('/jobs/{job}/edit', 'edit');
//// Update
//    Route::patch('/jobs/{job}', 'update');
//// Destroy
//    Route::delete('/jobs/{job}', 'delete');
//});

Route::resource('jobs', JobController::class);

Route::get('/post', [PostController::class, "index"]);

