<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $table ="niveaux";

    public function equipes()
    {
        return $this->hasMany(Equipe::class);
    }
}
