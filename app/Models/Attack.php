<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attack extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
