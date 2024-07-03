<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Purchase;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::factory()->count(50)->create()->each(function ($user) use ($faker) {
            Purchase::factory()->count(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
