<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldEquipe extends Model
{
    use HasFactory;

    protected $table = 'compet_equipe';

    protected $primaryKey = 'numEquipe';

    public function gymnastes(){
        return $this->belongsToMany(OldGymnaste::class,'compet_composer','numEquipe','licenceG');
    }

    public function club(){
        return $this->belongsTo(OldClub::class,'idClub');
    }
}
