<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'pokemon_types');
    }

    public function attacks(): HasMany
    {
        return $this->hasMany(Attack::class);
    }
}
