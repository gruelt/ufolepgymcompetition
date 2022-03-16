<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldCompetition extends Model
{
    use HasFactory;

    protected $connection = 'mysql_ufolep';

    protected $table = "compet_competition";

    protected $primaryKey = "numCompet";

    public function oldEquipes(){
        return $this->belongsToMany(OldEquipe::class,'compet_participer','numCompet','numEquipe');
    }



    public function oldJuges(){
        return $this->belongsToMany(OldJuge::class,'compet_jugement','numCompet','idJuge')
            ->withPivot([
                'jugementAgres',
                'jugementSexe',
                'jugementPlateau',
                'jugementJour'
            ]);
    }

}
