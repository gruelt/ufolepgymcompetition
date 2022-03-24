<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgresCompetitionCategorieGenreNiveau extends Model
{
    use HasFactory;

    protected $table = "agres_competition_categorie_genre_niveau";

    protected $fillable=[
        'categorie_genre_niveau_id',
        'agres_id',
        'competititon_id'
    ];

}
