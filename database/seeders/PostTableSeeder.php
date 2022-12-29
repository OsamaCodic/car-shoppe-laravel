<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use carbon\carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        $total = 10000;
        $faker = Faker::create();
        foreach(range(1, $total) as $index) {
            DB::table('posts')->insert(
                array(
                    'details' => $faker->paragraph(1),
                    'image'  => 'testing.jpeg',
                    'privacy' => $faker->text($maxNbChars = 20),
                    'privacy' => 'testing.jpeg',
                    'created_at' => $faker->dateTimeBetween('+0 days', '+2 years'),
                    'updated_at' => $faker->dateTimeBetween('+1 week', '+1 month')
                ),
            );
        }
    }
}
