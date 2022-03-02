<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldGymnaste extends Model
{
    use HasFactory;

    protected $table = 'compet_gymnastes';

    protected $primaryKey = 'licenceG';

    protected $keyType = 'string';

    public function club(){
        return $this->belongsTo(OldClub::class,'clubG','codeClub');
    }

    public function equipes(){
        return $this->belongsToMany(OldEquipe::class,'compet_composer','licenceG','numEquipe');
    }
}
