<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Characters') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="relative bg-black py-12 overflow-hidden">
        <video autoplay loop class="fixed top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        <h3 class="font-semibold text-lg mb-4">List of Characters:</h3>

                        <div class="mb-4 flex justify-between items-center">
                            <form action="{{ route('characters.index') }}" method="GET" class="flex items-center space-x-4 w-full">
                                <!-- Search Input -->
                                <label class="block mb-2 flex-1"> 
                                    <span class="text-white">Search characters by name:</span>
                                    <input 
                                        type="text" 
                                        id="character-search" 
                                        name="search" 
                                        placeholder="Type a name" 
                                        value="{{ request('search') }}" 
                                        class="border border-blue-500 rounded-lg p-3 w-full sm:w-1/3 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 text-black">
                                </label>

                                <!-- Species Filter -->
                                <label class="block mb-2 flex-1">
                                    <span class="text-white">Filter by Species:</span>
                                    <select name="species" class="border border-gray-300 rounded-lg p-3 bg-white appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 text-black w-48">
                                        <option value="">All Species</option>
                                        <option value="Human" {{ request('species') == 'Human' ? 'selected' : '' }}>Human</option>
                                        <option value="Wookiee" {{ request('species') == 'Wookiee' ? 'selected' : '' }}>Wookiee</option>
                                        <option value="Chiss" {{ request('species') == 'Chiss' ? 'selected' : '' }}>Chiss</option>
                                        <option value="Droid" {{ request('species') == 'Droid' ? 'selected' : '' }}>Droid</option>
                                        <option value="Cyborg" {{ request('species') == 'Cyborg' ? 'selected' : '' }}>Cyborg</option>
                                        <option value="Dathomirian Zabrak" {{ request('species') == 'Dathomirian Zabrak' ? 'selected' : '' }}>Dathomirian Zabrak</option>
                                    </select>
                                </label>

                                <div class="flex space-x-2">
                                    <button type="submit" class="bg-blue-500 text-white rounded-lg p-3 hover:bg-blue-600 transition duration-200">Filter</button>
                                    <a href="{{ route('characters.index') }}" class="bg-gray-300 text-gray-700 rounded-lg p-3 hover:bg-gray-400 transition duration-200">Reset</a>
                                </div>
                            </form>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($characters as $character)
                            <div class="bg-gray-900 border p-4 rounded-lg shadow-md text-black">
                                <a href="{{ route('characters.show', $character) }}">
                                    <x-character-card
                                        :name="$character->name"
                                        :character_img="$character->character_img"
                                    />
                                </a>
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('characters.edit', $character) }}" class="text-white bg-blue-500 hover:bg-blue-900 font-bold py-2 px-4 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('characters.destroy', $character) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?');">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>