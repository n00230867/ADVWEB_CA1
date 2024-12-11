@props(['action', 'method', 'character', 'power'])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    <div class="mb-4">
        {{-- this should be a dropdown box with values 1-5 --}}
        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
        <input 
            type="text" 
            name="rating" 
            id="rating" 
            value="{{ old('rating', $power->rating ?? '') }}" 
            required 
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
        />
        @error('rating')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
        <input 
            type="text" 
            name="comment" 
            id="comment" 
            value="{{ old('comment', $power->comment ?? '') }}" 
            required 
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
        />
        @error('comment')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <x-primary-button>
        {{ isset($power) ? 'Update Power' : 'Save Power' }}
    </x-primary-button>
</form>
