@props(['action', 'method', 'movie'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Title -->
    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $movie->title ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Poster Upload with Styled Black Button -->
    <div class="mb-4">
        <label for="poster" class="block text-sm font-medium text-gray-700">Movie Poster</label>
        
        <!-- Hidden default file input for functionality -->
        <input
            type="file"
            name="poster"
            id="poster"
            {{ isset($movie) ? '' : 'required' }}
            class="hidden"
            onchange="document.getElementById('fileName').textContent = this.files[0].name" />

        <!-- Custom black button to trigger file selection -->
        <label for="poster" class="cursor-pointer inline-flex items-center px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
            Choose File
        </label>
        
        <!-- Display the selected file name -->
        <span id="fileName" class="ml-2 text-sm text-gray-600">No file chosen</span>
        
        <!-- Error message for validation -->
        @error('poster')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Release Date -->
    <div class="mb-4">
        <label for="release" class="block text-sm text-gray-700">Release Date</label>
        <input
            type="date"
            name="release"
            id="release"
            value="{{ old('release', $movie->release ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('release')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Director -->
    <div class="mb-4">
        <label for="director" class="block text-sm text-gray-700">Director</label>
        <input
            type="text"
            name="director"
            id="director"
            value="{{ old('director', $movie->director ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('director')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <textarea
            name="description"
            id="description"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $movie->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Display Existing Poster -->
    @isset($movie->poster)
        <div class="mb-4">
            <img src="{{ asset('images/movies/' . $movie->poster) }}" alt="Movie poster" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($movie) ? 'Update Movie' : 'Add Movie' }}
        </x-primary-button>
    </div>
</form>