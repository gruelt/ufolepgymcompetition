<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    public function gymnastes()
    {
        return $this->belongsToMany(Gymnaste::class);
    }
}
