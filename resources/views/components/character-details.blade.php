@props(['name', 'species', 'bio', 'character_img'])

<!-- Character Details Component -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <!-- Character name --> 
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $name }}</h1>

    <!-- Character Image --> 
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center"> 
        <img src="{{ asset('images/characters/' . $character_img) }}" alt="{{ $name }}" class="w-full max-w-xs h-auto object-cover">
    </div> 

    <!-- Character Species --> 
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">Species: {{ $species }}</h2>

    <!-- Character Description --> 
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">Description</h3>
        <p class="text-gray-700 leading-relaxed">{{ $bio }}</p>
</div> 
