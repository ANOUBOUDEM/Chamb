<?php

namespace Database\Seeders;

use App\Models\Attack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attack::factory()->count(50)->create();
    }
}
