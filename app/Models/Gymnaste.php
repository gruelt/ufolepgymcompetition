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

    /** Returns all Agres strating notes for each competition
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agresCompetition(){
        return $this->hasMany(AgresCompetitionGymnaste::class);
    }




}
