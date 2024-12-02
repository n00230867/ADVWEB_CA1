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

                <!-- PLANETS SECTION -->
                <h4 class="text-gray-300 font-semibold text-md mt-8">Planets</h4>
                @if($character->planets->isEmpty())
                    <p class="text-gray-300">No planets yet.</p>
                @else
                    <ul class="mt-4 space-y-4">
                        @foreach($character->planets as $planet)
                            <li>
                                <x-planet-details
                                    :name="$planet->name"
                                    :climate="$planet->climate"
                                    :description="$planet->description"
                                    :planet_img="$planet->planet_img"
                                />
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>