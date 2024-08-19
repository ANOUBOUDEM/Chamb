<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pokemons(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class);
    }

    public function attacks()
    {
        return $this->hasMany(Attack::class);
    }
}
