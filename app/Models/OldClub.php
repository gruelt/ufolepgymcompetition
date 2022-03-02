<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldClub extends Model
{
    use HasFactory;

    protected $table = 'compet_club';

    protected $primaryKey = 'idClub';

    // retrieving gymnasts

    public function gymnastes(){
        return $this->hasMany(OldGymnaste::class,'clubG','codeClub');
    }

    // Retrievieng relations teams.

    public function equipes(){
        return $this->hasMany(OldEquipe::class,'idClub');
    }
}
