<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assurons-nous que le dossier existe
        Storage::makeDirectory('public/pokemons');

        $imagesDirectory = public_path('PokemonDataset');

        // Remplacons par le chemin ou se trouvent nos images initiales
        $files = scandir($imagesDirectory);

        foreach ($files as $file) {
            if (is_file($imagesDirectory . '/' . $file)) {
                $filename = Str::random(10) . '-' . $file;
                Storage::putFileAs('public/pokemons', $imagesDirectory . '/' . $file, $filename);

                // Enregistrement des pokemons dans la table
                $pokemon = Pokemon::query()->create([
                    'name' => pathinfo($file, PATHINFO_FILENAME),
                    'weight' => random_int(0,2),
                    'height' => random_int(0,2),
                    'image' => 'storage/pokemons/'.$filename,
                ]);
            }
        }
        // Recuperons tous les types de la table types et affectons les aux pokemons
        $types = Type::query()->get();
        foreach ($types as $type) {
            foreach (Pokemon::query()->get() as $pok){

            }
            $type = Type::query()->findOrFail($type->id);
            $pok->types()->attach($type);
        }
    }
}
