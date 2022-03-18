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

    public function competition()
    {
        return $this->belongsTo(Competition::class);

    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

}
