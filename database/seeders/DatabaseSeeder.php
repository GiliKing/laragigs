<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' =>'John Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' =>'laravel, Javascritp',
        //     'company' => 'Gili King',
        //     'location' => 'Nigeria Lahos',
        //     'email' => 'email@gmail.com',
        //     'website' => 'https://www.gili.com',
        //     'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi omnis, voluptates nemo quasi ullam modi doloremque 
        //     delectus nihil laborum. Neque soluta, 
        //     rem quis voluptates a fugiat quo saepe. 
        //     Iusto quibusdam sit nam distinctio hic minus temporibus fugiat quia 
        //     blanditiis totam, adipisci odio! Voluptatum 
        //     fuga aliquam quo ipsum autem sequi eius.',
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' =>'laravel, Javascritp',
        //     'company' => 'mike King',
        //     'location' => 'us ny',
        //     'email' => 'email@12mail.com',
        //     'website' => 'https://www.mike.com',
        //     'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi omnis, voluptates nemo quasi ullam modi doloremque 
        //     delectus nihil laborum. Neque soluta, 
        //     rem quis voluptates a fugiat quo saepe. 
        //     Iusto quibusdam sit nam distinctio hic minus temporibus fugiat quia 
        //     blanditiis totam, adipisci odio! Voluptatum 
        //     fuga aliquam quo ipsum autem sequi eius.',
        // ]);
    }
}
