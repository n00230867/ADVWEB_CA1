<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Movies') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12 relative">
        <video autoplay loop muted class="fixed top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-black opacity-50 z-10"></div> <!-- Dark overlay -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-20"> <!-- Higher z-index for content -->
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="font-semibold text-lg mb-4">List of Movies:</h3>

                    <div class="mb-4 flex justify-between items-center">
                        <form action="{{ route('movies.index') }}" method="GET" class="flex items-center space-x-4 w-full">
                            <!-- Search Input -->
                            <label class="block mb-2 flex-1"> 
                                <span class="text-white">Search movies by title:</span>
                                <input 
                                    type="text" 
                                    id="movie-search" 
                                    name="search" 
                                    placeholder="Type a title" 
                                    value="{{ request('search') }}" 
                                    class="border border-blue-500 rounded-lg p-3 w-full sm:w-1/3 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 text-black">
                            </label>

                            <div class="flex space-x-2">
                                <button type="submit" class="bg-blue-500 text-white rounded-lg p-3 hover:bg-blue-600 transition duration-200">Search</button>
                                <a href="{{ route('movies.index') }}" class="bg-gray-300 text-gray-700 rounded-lg p-3 hover:bg-gray-400 transition duration-200">Reset</a>
                            </div>
                        </form>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($movies as $movie)
                        <a href="{{ route('movies.show', $movie) }}">
                            <div class="bg-gray-900 border p-4 rounded-lg shadow-md text-black">
                                <x-movie-card
                                    :title="$movie->title"
                                    :poster="$movie->poster"
                                    :release="$movie->release"
                                />
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>