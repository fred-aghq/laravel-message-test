<?php

namespace Database\Seeders;

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
         \App\Models\Message::factory(25)->create();
         \App\Models\Message::factory(25)->archived()->create();
         \App\Models\Message::factory(25)->read()->create();
    }
}
