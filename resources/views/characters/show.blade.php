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

                        <!-- Character Power -->
            <h4 class="font-semibold text-md mt-8">Power</h4>
            @if($character->powers->isEmpty())
                <p class="text-gray-600">No Power Ratings yet.</p>
            @else
                <ul class="mt-4 space-y-4">
                    @foreach($character->powers as $power)
                        <li class="bg-gray-100 p-4 rounded-lg">
                            <p class="font-semibold">{{ $power->user->name }} ({{ $power->created_at->format('M d,Y') }})</p>
                            <p>Power: {{ $power->rating }} / 5</p>
                            <p>{{ $power->comment }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif

                        <!-- Add a New Power -->
            <h4 class="font-semibold text-md mt-8">Add a Power Rating</h4>
            <form action="{{ route('powers.store', $character) }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label for="rating" class="block font-medium text-sm text-gray-700">Power Rating</label>
                    <select name="rating" id="rating" class="mt-1 block w-full" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="comment" class="block font-medium text-sm text-gray-700">Comment</label>
                    <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full" placeholder="Write your comment here..."></textarea>
                </div>

                <button type="submit" class="bg-blue-700 text-white font-bold py-2 px-2 rounded">
                    Submit Comment
                </button>
            </form>

            </div>
        </div>
    </div>
</x-app-layout>