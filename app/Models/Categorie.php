<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable=['genre_id'];

    /** Toutes les Equipes d'un catégorie
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipes(){
        return $this->hasMany(Equipe::class);
    }
}
