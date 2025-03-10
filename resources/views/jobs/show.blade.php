<x-layout>
    <x-slot name="heading">
        Jobs Listening
    </x-slot>
    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p>
        This job pays {{$job->salary}} per year.
    </p>

    <p class="mt-6">
        <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
</x-layout>
