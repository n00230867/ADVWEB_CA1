@props(['action', 'method', 'character'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $character->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="character_img" class="block text-sm font-medium text-gray-700">Character Cover Image</label>
        <input
            type="file"
            name="character_img"
            id="character_img"
            {{ isset($character) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />

    <!-- Bio -->
    <div class="mb-4">
        <label for="bio" class="block text-sm text-gray-700">Bio</label>
        <input
            type="text"
            name="bio"
            id="bio"
            value="{{ old('bio', $character->bio ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('bio')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Species -->
    <div class="mb-4">
        <label for="species" class="block text-sm text-gray-700">Species</label>
        <input
            type="text"
            name="species"
            id="species"
            value="{{ old('species', $character->species ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('species')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

        
        
        @error('character_img')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($character->character_img)
        <div class="mb-4">
            <img src="{{ asset($character->character_img) }}" alt="Character cover" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($character) ? 'Update Character' : 'Add Character' }}
        </x-primary-button>
    </div>
</form>
