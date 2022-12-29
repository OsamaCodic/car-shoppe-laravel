<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use carbon\carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([FeaturesSeeder::class]);
        $this->call([PostTableSeeder::class]);
    }
}
