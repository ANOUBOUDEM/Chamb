<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Type::query()->create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
        ]);
        return redirect()->route('types.index')->with('message', 'Type ajoute avec succes....');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $type = Type::query()->findOrFail($type->id);
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $type = Type::query()->findOrFail($type->id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $typ = Type::query()->findOrFail($type->id);

        $typ->update([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
        ]);
        return redirect()->route('types.index')->with('message', 'Type mis a jour avec succe');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $typ = Type::query()->findOrFail($type->id);
        $typ->delete();
        return redirect()->route('types.index')->with('message', 'Type supprime avec succes...');
    }
}
