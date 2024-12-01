<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Character Details') }}
        </h2>
    </x-slot>

    <div class="relative bg-black py-12 overflow-hidden">
        <video autoplay loop muted class="fixed top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-character-details
                    :name="$character->name"
                    :character_img="$character->character_img"
                    :species="$character->species"
                    :bio="$character->bio"
                />

                <!-- CHARACTER PLANET -->
                <h4 class="text-gray-300 font-semibold text-md mt-8">Planets</h4>
                @if($character->planets->isEmpty())
                    <p class="text-gray-300">No planets yet.</p>
                @else
                    <ul class="mt-4 space-y-4">
                        @foreach($character->planets as $planet)
                            <li class="bg-gray-100 p-4 rounded-lg">
                                <p class="font-semibold">{{ $planet->user->name }}</p>
                                <p>Planet name: {{ $planet->name }} </p>
                                <p>Climate: {{ $planet->climate }} </p>
                                <p>Description: {{ $planet->description }} </p>
                                <p>planet_img: {{ $planet->planet_img }} </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <!-- resources/views/characters/show.blade.php -->

<h1>{{ $character->name }}</h1>
<p>{{ $character->description }}</p>

<h2>Planets</h2>
<ul>
    @foreach($character->planets as $planet)
        <li>
            <strong>{{ $planet->name }}</strong>: {{ $planet->description }} 
            <img src="{{ $planet->planet_img }}" alt="{{ $planet->name }}" style="width: 100px;">
        </li>
    @endforeach
</ul>

<!-- Form to add a new planet -->
<form action="{{ route('planets.store') }}" method="POST">
    @csrf
    <input type="hidden" name="character_id" value="{{ $character->id }}">
    
    <label for="name">Planet Name:</label>
    <input type="text" name="name" required>
    
    <label for="climate">Climate:</label>
    <input type="text" name="climate" required>
    
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    
    <label for="planet_img">Image URL:</label>
    <input type="url" name="planet_img" required>
    
    <button type="submit">Add Planet</button>
</form>

</x-app-layout>