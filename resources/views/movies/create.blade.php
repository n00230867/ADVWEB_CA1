<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Movie') }}
        </h2>
    </x-slot>

    <div class="relative bg-black-900 py-12 overflow-hidden pt-16"> <!-- Add padding-top to avoid content being hidden under the fixed nav -->
        <video autoplay loop muted class="fixed top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">Add a New Movie:</h3>

                        {{-- Using the MovieForm component for movie creation --}}
                        <x-movie-form
                            :action="route('movies.store')"
                            :method="'POST'"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>