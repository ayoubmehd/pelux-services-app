<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use App\Models\City;
use App\Models\Category;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(20)->for(
            Service::factory()
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
        )->for(
            User::factory()
        )->create();
    }
}