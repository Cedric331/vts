<?php

namespace Database\Seeders;

use App\Models\Announcer;
use App\Models\Campaign;
use App\Models\MediaPlan;
use App\Models\Message;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        User::factory(2)->create();
        Announcer::factory(2)->create();
        Campaign::factory(2)->create();
        MediaPlan::factory(2)->create();
        Message::factory(10)->create();
    }
}
