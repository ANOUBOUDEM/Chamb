<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['poison', 'grass', 'fire', 'flying', 'water', 'bug', 'normal', 'electric', 'ground', 'fairy', 'fighting'];
        foreach ($types as $type) {
            Type::query()->create([
                'name' => $type
            ]);
        }
    }
}
