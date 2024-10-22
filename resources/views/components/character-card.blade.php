@props(['name', 'species', 'character_img', 'bio'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$name}}</h4>
    <img src="{{asset( 'images/characters/' . $character_img)}}" alt="{{$name}}">
    <p class="text-gray-600">({{ $species }})</p>
    <p class="text-gray-600 mt-4">({{ $bio }})</p>
</div>