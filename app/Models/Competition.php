<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable=[
        'old_numCompet',
        'ville',
        'departement',
        'type',
        'old_date',
        'niveau_gaf',
        'niveau_gam',
        'date_debut',
        'date_fin',
        'saison_id'
    ];

    public function equipes(){
        return $this->hasMany(Equipe::class);
    }



}
