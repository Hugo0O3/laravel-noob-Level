<x-layout>
    <x-slot:heading>
        Jobs Listening
    </x-slot:heading>
    <h1>Hello from the Jobs page.</h1>
    <ul>
        @foreach($jobs as $job)
            <a class="text-blue-500 hover:underline" href="/jobs/{{$job['id']}}">
                <li><strong>{{$job['title']}}</strong>: Pays {{$job['salary']}} Per year.</li>
            </a>
        @endforeach
    </ul>
</x-layout>
