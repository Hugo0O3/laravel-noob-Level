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
});

Route::get('/jobs/{jobId}/edit', function ($jobId) {
    $job = Job::find($jobId);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{jobId}', function ($jobId) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job = Job::findOrFail($jobId);

    $job->title = request('title');
    $job->salary = request('salary');
//    $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('/jobs/' . $job->id);

});

// Destroy
Route::delete('/jobs/{jobId}', function ($jobId) {

    $job = Job::findOrFail($jobId);
    $job->delete();

    // Version plus court
//    Job::findOrFail($jobId)->delete();

    return redirect('/jobs');
});

Route::get('/post', [PostController::class, "index"]);

