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

    <!-- Image Upload with Styled Black Button -->
    <div class="mb-4">
        <label for="character_img" class="block text-sm font-medium text-gray-700">Character Cover Image</label>
        
        <!-- Hidden default file input for functionality -->
        <input
            type="file"
            name="character_img"
            id="character_img"
            {{ isset($character) ? '' : 'required' }}
            class="hidden"
            onchange="document.getElementById('fileName').textContent = this.files[0].name" />

        <!-- Custom black button to trigger file selection -->
        <label for="character_img" class="cursor-pointer inline-flex items-center px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
            Choose File
        </label>
        
        <!-- Display the selected file name -->
        <span id="fileName" class="ml-2 text-sm text-gray-600">No file chosen</span>
        
        <!-- Error message for validation -->
        @error('character_img')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


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

    <!-- Display Existing Image -->
    @isset($character->character_img)
        <div class="mb-4">
            <img src="{{ asset('images/characters/' . $character->character_img) }}" alt="Character cover" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($character) ? 'Update Character' : 'Add Character' }}
        </x-primary-button>
    </div>
</form>
