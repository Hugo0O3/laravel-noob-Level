<x-layout>
    <x-slot name="heading">
        Jobs Listening
    </x-slot>
    <h1>Hello from the Jobs page.</h1>
    <section class="space-y-4">
        @foreach($jobs as $job)
            <a class="block px-4 py-6 border border-gray-200 rounded-lg" href="/jobs/{{$job['id']}}">
                <section
                    class="font-bold text-blue-500 text-sm">{{ $job->employer->name}}</section>
                <section>
                    <strong>{{$job['title']}}</strong>: Pays {{$job['salary']}} Per year.
                </section>

            </a>
        @endforeach
        <section>{{ $jobs->links() }}</section>
    </section>
</x-layout>
