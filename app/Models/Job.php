<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
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
    }

    public static function find(int $jobId): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $jobId);

        if (!$job) {
            abort(404);
        }

        return $job;
    }
}
