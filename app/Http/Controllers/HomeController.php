<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home()
    {
        $pokemons = Pokemon::query()->select('id', 'name', 'image')->get();

        return view('welcome', compact('pokemons'));

    }

    public function pokemon($id)
    {
        $pokemon = Pokemon::query()->findOrFail($id);
        return view('pokemon', compact('pokemon'));
    }
}
