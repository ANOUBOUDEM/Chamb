<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attack;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AttackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attacks = Attack::query()->get();
        return view('admin.attacks.index', compact('attacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::query()->get();
        return view('admin.attacks.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Attack::query()->create([
            'name' => $request->input('name'),
            'damage' => $request->input('damage'),
            'description' => $request->input('description'),
            'type_id' => $request->input('type_id'),
        ]);
        return redirect()->route('attacks.index')->with('message', 'Attaque ajoutee avec succes....');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attack $attack)
    {
        return view('admin.attacks.show', ['attack' => Attack::query()->findOrFail($attack->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attack $attack)
    {
        $types = Type::query()->get();
        return view('admin.attacks.edit', [
            'attack' => Attack::query()->findOrFail($attack->id),
            'types' => $types
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attack $attack)
    {
        $att = Attack::query()->findOrFail($attack->id);
        $att->update([
            'name' => $request->input('name'),
            'damage' => $request->input('damage'),
            'description' => $request->input('description'),
            'type_id' => $request->input('type_id'),
        ]);
        return redirect()->route('attacks.index')->with('message', 'Attaque modifiee avec succes....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attack $attack)
    {
        $att = Attack::query()->findOrFail($attack->id);
        $att->delete();
        return redirect()->route('attacks.index')->with('message', 'Attaque supprimee avec succes...');
    }

    /**
     * @param array|\Illuminate\Http\UploadedFile $imageType
     * @return string
     */
    public function getImageName(array|\Illuminate\Http\UploadedFile $imageType): string
    {
        if (!Storage::disk('public')->exists('attacks')) {
            Storage::makeDirectory('public/attacks', 0777);
        }
        $currentDate = Carbon::now()->toDateString();
        $imageName = $currentDate . '-' . uniqid('', true) . '.' . $imageType->getClientOriginalExtension();
        $path = Image::make($imageType)->save($imageName, 90);
        Storage::disk('public')->put('attacks/' . $imageName, $path);
        return $imageName;
    }
}
