<?php

namespace Database\Seeders;

use App\Models\assignament;
use App\Models\Course;
use App\Models\exercise;
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
        $this->call(UserSeeder::class);
        Course::factory(3)->create();
        assignament::factory(9)->create();
        exercise::factory(6)->create();
    }
}
