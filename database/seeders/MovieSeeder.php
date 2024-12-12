<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        Movie::insert([
            ['title' => 'Star Wars: Episode I: The Phantom Menace',
            'poster' => 'PhantomM.png',
            'release' => 'May 19, 1999',
            'director' => 'George Lucas',
            'description' => "When the Trade Federation organize a blockade around the planet Naboo, the Supreme Chancellor Valorum sends the Jedi Qui-Gon Jinn and Obi-Wan Kenobi to negotiate the end of the blockade. However the evil Viceroy Nute Gunray is ordered to kill the Jedi and invade Naboo. However the Jedi escape and Qui-Gon saves the life of the clumsy Gungan Jar Jar Binks. The outcast native takes the Jedi to his submerged city and the Gungan leader gives transportation to them. The Jedi head to the capital to warn Queen Amidala about the invasion. However she has been captured by the Federation droids but the Jedi rescue the queen and her court and they flee in a spacecraft that is damaged when they cross the blockade. They land on a desert planet and Qui-Gon Jinn goes to the town with Jar Jar, the droid R2-D2 and the queen's assistant Padmé to seek the necessary part for the spacecraft. When they find the component, they do not have money to buy it.", 'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],

            ['title' => 'Star Wars: Episode II: Attack of the Clones',
            'poster' => 'AClone.png',
            'release' => 'May 16, 2002',
            'director' => 'George Lucas',
            'description' => "Ten years after the invasion of Naboo, the Galactic Republic is facing a Separatist movement and the former queen and now Senator Padmé Amidala travels to Coruscant to vote on a project to create an army to help the Jedi to protect the Republic. Upon arrival, she escapes from an attempt to kill her, and Obi-Wan Kenobi and his Padawan Anakin Skywalker are assigned to protect her. They chase the shape-shifter Zam Wessell but she is killed by a poisoned dart before revealing who hired her. The Jedi Council assigns Obi-Wan Kenobi to discover who has tried to kill Amidala and Anakin to protect her in Naboo. Obi-Wan discovers that the dart is from the planet Kamino, and he heads to the remote planet. He finds an army of clones that has been under production for years for the Republic and that the bounty hunter Jango Fett was the matrix for the clones.", 'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],

            ['title' => 'Star Wars: Episode III: Revenge of the Sith',
            'poster' => 'RevengeOS.png',
            'release' => 'March 26, 1978',
            'director' => 'George Lucas',
            'description' => "Nearly three years have passed since the beginning of the Clone Wars. The Republic, with the help of the Jedi, take on Count Dooku and the Separatists. With a new threat rising, the Jedi Council sends Obi-Wan Kenobi and Anakin Skywalker to aid the captured Chancellor. Anakin feels he is ready to be promoted to Jedi Master. Obi-Wan is hunting down the Separatist General, Grievous. When Anakin has future visions of pain and suffering coming Padmé's way, he sees Master Yoda for counsel. When Darth Sidious executes Order 66, it destroys most of all the Jedi have built. Experience the birth of Darth Vader. Feel the betrayal that leads to hatred between two brothers. And witness the power of hope.", 'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],

            ['title' => 'Star Wars: Episode IV: A New Hope', 
            'poster' => 'NewHope.png',
            'release' => 'May 19, 2005',
            'director' => 'George Lucas',
            'description' => "The Imperial Forces under orders from cruel Darth Vader (David Prowse) -- hold Princess Leia (Carrie Fisher) hostage, in their efforts to quell the rebellion against the Galactic Empire. Luke Skywalker (Mark Hamill) and Han Solo (Harrison Ford), captain of the Millennium Falcon, work together with the companionable droid duo R2-D2 (Kenny Baker) and C-3PO (Anthony Daniels) to rescue the beautiful princess, help the Rebel Alliance, and restore freedom and justice to the Galaxy.", 'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],

            ['title' => 'Star Wars: Episode V: The Empire Strikes Back',
            'poster' => 'StrikeBack.png',
            'release' => 'May 21, 1980',
            'director' => 'George Lucas',
            'description' => "The legendary saga continues as the Rebel Alliance faces increasing challenges from the mighty Galactic Empire. Luke Skywalker, Han Solo, and Princess Leia Organa confront new trials that test their courage, friendships, and beliefs. The Rebel Alliance has established a hidden base on the icy planet of Hoth, where they hope to regroup and plan their next moves against the Empire. Luke Skywalker receives a message from a familiar source, prompting him to seek further guidance in understanding his connection to the Force. Han Solo and Princess Leia's journey takes them on a dangerous path as they navigate a galaxy under Imperial control. Their actions and decisions lead to unforeseen consequences that will impact the fate of the Rebellion. Meanwhile, the dark presence of Darth Vader looms as he relentlessly pursues the Rebels while dealing with inner conflicts of his own.", 'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],
            
            ['title' => 'Star Wars: Episode VI: Return of the Jedi',
            'poster' => 'ReturnJedi.png',
            'release' => 'May 25, 1983',
            'director' => 'George Lucas',
            'description' => "Luke Skywalker (Mark Hamill) battles horrible Jabba the Hut and cruel Darth Vader to save his comrades in the Rebel Alliance and triumph over the Galactic Empire. Han Solo (Harrison Ford) and Princess Leia (Carrie Fisher) reaffirm their love and team with Chewbacca, Lando Calrissian (Billy Dee Williams), the Ewoks and the androids C-3PO and R2-D2 to aid in the disruption of the Dark Side and the defeat of the evil emperor.",'created_at' => $currentTimestamp, 
            'updated_at' => $currentTimestamp],
        ]);
    }
}
