<x-layout>
    <x-slot name="heading">
        Edit Job: {{ $job->title }}
    </x-slot>
    <form method="post" action="/jobs/{{$job->id}}">
        @csrf
        @method('patch')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text"
                                       name="title"
                                       id="title"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="Developer"
                                       value="{{$job->title}}"
                                       required>
                            </div>
                        </div>
                        @error('title')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text"
                                       name="salary"
                                       id="salary"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="$10,000 Per Year"
                                       value="{{$job->salary}}"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>
                @error('salary')
                <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <section class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </section>
            <section class="flex items-center gap-x-6">
                <a href="/jobs/{{$job->id}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <section>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </section>
            </section>
        </div>
    </form>
    <form method="post" action="/jobs/{{$job->id}}" id="delete-form" class="hidden">
        @csrf
        @method('delete')
    </form>
</x-layout>
