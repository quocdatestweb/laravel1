<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class FakeDataSeeder extends Seeder
{
    public function run()
    {
        // Create 10 fake users
        User::factory()->count(10)->create();

        // Insert other fake data as needed
    }
}
