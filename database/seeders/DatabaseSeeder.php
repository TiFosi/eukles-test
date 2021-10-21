<?php

namespace Database\Seeders;

use App\Models\Client;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\Client::factory(50)->create();
        \App\Models\Materiel::factory(100)->create();

        foreach (Client::all() as $client) {
            for ($i=1; $i <= rand(20, 100); $i++) {
                $client->materiels()->attach(rand(1, 100), [
                    'is_sold' => (bool)rand(0, 1)
                ]);
            }
        }
    }
}
