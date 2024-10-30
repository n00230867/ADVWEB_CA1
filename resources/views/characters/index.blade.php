<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Characters') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Characters:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($characters as $character)
                        <a href="{{ route('characters.show', $character) }}">
                            <x-character-card
                                :name="$character->name"
                                :character_img="$character->character_img"
                            />
                        </a>        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>