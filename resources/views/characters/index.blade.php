<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Characters') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Characters:</h3>
                    
                    <!-- Search Input -->
                    <label class="block mb-4">
                        <span class="text-gray-700">Search characters by name:</span>
                        <input 
                            type="text" 
                            id="character-search" 
                            placeholder="Type a name" 
                            value="{{ request('search') }}" 
                            class="border rounded p-2 w-full sm:w-1/3 mt-1"
                            oninput="window.location = '?search=' + this.value"
                        >
                    </label>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($characters as $character)
                        <div class="border p-4 rounded-lg shadow-md">
                            <a href="{{ route('characters.show', $character) }}">
                                <x-character-card
                                    :name="$character->name"
                                    :character_img="$character->character_img"
                                />
                            </a>  
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('characters.edit', $character) }}" class="text-gray-600 bg-blue-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('characters.destroy', $character) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
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
