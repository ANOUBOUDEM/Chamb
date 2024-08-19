<?php

namespace App\Livewire;

use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Component;

class PokemonFilter extends Component
{

    public $search = '';
    public $type = 'All Types';
    public $types;

    public function mount()
    {
        $this->types = Type::all();
    }
    public function render()
    {
        $pokemons = Pokemon::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->type !== 'All Types', function ($query) {
                $query->whereHas('types', function ($q) {
                    $q->where('types.name', $this->type);
                });
            })
            ->paginate(5);
        return view('livewire.pokemon-filter', [
            'pokemons' => $pokemons,
        ]);
    }
}
