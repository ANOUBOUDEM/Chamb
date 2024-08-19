<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use OpenAI\Laravel\Facades\OpenAI;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('admin.pokemons.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.pokemons.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Storage::disk('public')->exists('pokemons')) {
            Storage::makeDirectory('public/pokemons', 0777);
        }
        $image = $request->file('image');
        $currentDate = Carbon::now()->toDateString();
        $imageName = $currentDate . '-' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $path = Image::make($image)->save($imageName, 90);
        Storage::disk('public')->put('pokemons/' . $imageName, $path);
        $pokemon = Pokemon::query()->create([
            'name' => ucfirst($request->input('name')),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'point' => $request->input('point'),
            'image' => $imageName
        ]);
        foreach ($request->get('type_id') as $type_id) {
            $type = Type::query()->findOrFail($type_id);
            $pokemon->types()->attach($type);
        }

        return redirect()->route('pokemons.index')->with('message', 'Pokemon ajoute avec succes!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        $pokemon = Pokemon::query()->findOrFail($pokemon->id);
        return view('admin.pokemons.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        $pokemon = Pokemon::query()->findOrFail($pokemon->id);
        $types = Type::query()->get();
        return view('admin.pokemons.edit', compact('pokemon', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $pokemon = Pokemon::query()->findOrFail($pokemon->id);

        if (!Storage::disk('public')->exists('pokemons')) {
            Storage::makeDirectory('public/pokemons', 0777);
        }
        $image = $request->file('image');
        $currentDate = Carbon::now()->toDateString();
        $imageName = $currentDate . '-' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $path = Image::make($image)->save($imageName, 90);
        Storage::disk('public')->put('pokemons/' . $imageName, $path);
        $pokemon->update([
            'name' => ucfirst($request->input('name')),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'point' => $request->input('point'),
            'image' => $imageName
        ]);

        foreach ($request->get('type_id') as $type_id) {
            $type = Type::query()->findOrFail($type_id);
            $pokemon->types()->attach($type);
        }

        return redirect()->route('pokemons.index')->with('message', 'Pokemon ajoute avec succes!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        session('message', 'Pokemon supprime avec succes...');
        return redirect()->route('pokemons.index');
    }
}
