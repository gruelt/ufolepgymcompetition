<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gymnaste extends Model
{
    use HasFactory;

    public function clubs(){
        return $this->belongsToMany(Club::class)->withPivot('saison_id');
    }

    public function equipes(){
        return $this->belongsToMany(Equipe::class);
    }
    public function notes(){
        return $this->belongsToMany(AgresCompetitionGymnaste::class,'agres_competition_gymnaste');
    }




}
