<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use Carbon\Carbon;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        Character::insert([
            ['name' => 'Anakin Skywalker', 
            'species' => 'Human', 
            'character_img' => 'Anakin_Skywalker.png', 
            'bio' => "Discovered as a slave on Tatooine by Qui-Gon Jinn and Obi-Wan Kenobi, Anakin Skywalker had the potential to become one of the most powerful Jedi ever. Some even believed he was the prophesied Chosen One who would bring balance to the Force. Always pushing the limits of his Jedi training, seeking to excel and live up to his reputation, Skywalker's passion often brought him into conflict with his mentor, Jedi Master Obi-Wan Kenobi. A hero of the Clone Wars, Anakin was caring and compassionate, but suffered from a deep fear of loss that would prove to be his downfall.", 
            'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp], 
            
            ['name' => 'Luke Skywalker', 
            'species' => 'Human', 
            'character_img' => 'Luke_Skywalker.png', 
            'bio' => "Luke Skywalker, the son of Anakin Skywalker and Padmé Amidala, was raised on Tatooine by his aunt and uncle. Trained as a Jedi by Obi-Wan Kenobi and Yoda, he became one of the greatest heroes of the Rebel Alliance. His journey led him to confront his father, redeeming him and helping bring about the fall of the Galactic Empire.", 
            'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],
            
            ['name' => 'Leia Organa', 
            'species' => 'Human', 
            'character_img' => 'Leia_Organa.png', 
            'bio' => "Princess Leia Organa, the twin sister of Luke Skywalker and the daughter of Anakin Skywalker, was a leading figure in the Rebel Alliance. A skilled diplomat and strategist, she was instrumental in the fall of the Galactic Empire. Later, she became a general in the Resistance against the First Order.", 
            'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],
            
            ['name' => 'Darth Vader', 
            'species' => 'Human (cyborg)', 
            'character_img' => 'Darth_Vader.png', 
            'bio' => "Once a heroic Jedi Knight, Anakin Skywalker fell to the dark side of the Force and became Darth Vader, a Dark Lord of the Sith. His turn to the dark side helped the Empire rise to power, and he became the enforcer of Emperor Palpatine's rule, feared throughout the galaxy.", 
            'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],
            
            ['name' => 'Obi-Wan Kenobi', 
            'species' => 'Human', 
            'character_img' => 'Obi_Wan_Kenobi.png', 
            'bio' => "Obi-Wan Kenobi, a wise and patient Jedi Master, trained Anakin Skywalker and later watched over Luke Skywalker on Tatooine. He played a pivotal role in both the Clone Wars and the eventual downfall of the Sith by guiding Luke in his journey to become a Jedi.", 
            'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],
            
            ['name' => 'Yoda', 
            'species' => 'Yoda’s species', 
            'character_img' => 'Yoda.png', 
            'bio' => "Yoda was one of the most powerful Jedi Masters in galactic history and a leader of the Jedi Council. With centuries of experience, he trained many generations of Jedi Knights, including Luke Skywalker. His wisdom and teachings helped guide the fate of the galaxy during the turbulent times of the Republic and Empire.", 
            'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp]
            
        ]);
    }
}
