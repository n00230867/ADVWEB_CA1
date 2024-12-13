<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movie Details') }}
        </h2>
    </x-slot>

    <div class="relative bg-black py-12 overflow-hidden">
        <video autoplay loop muted class="fixed top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-movie-details
                    :title="$movie->title"
                    :poster="$movie->poster"
                    :release="$movie->release"
                    :director="$movie->director"
                    :description="$movie->description"
                />
            </div>
            <h3 class="font-semibold text-lg mt-6">Characters:</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mt-4 ml-20">
                @foreach($characters as $character)
                    <div class="bg-gray-800 border p-4 rounded-lg shadow-md text-white">
                        <h4 class="font-semibold">{{ $character->name }}</h4>
                        <img src="{{asset('images/characters/' . $character->character_img)}}" alt="{{ $character->name }}" class="mt-2 rounded">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>