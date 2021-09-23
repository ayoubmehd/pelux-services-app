<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Category;
use App\Models\Service;
use \App\Models\User;
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

        User::factory()->state(['role' => 'admin'])->create();
        City::factory(1)->create();
        Category::factory(3)->create();

        Service::factory(1)
            ->for(
                User::factory()->state(['role' => 'provider']),
                'provider'
            )
            ->for(
                City::factory(),
            )
            ->has(
                Category::factory(3),
            )
            ->create();
    }
}