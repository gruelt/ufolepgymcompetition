<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldEquipe extends Model
{
    use HasFactory;

    protected $connection = 'mysql_ufolep';

    protected $table = 'compet_equipe';

    protected $primaryKey = 'numEquipe';

    public function oldGymnastes(){
        return $this->belongsToMany(OldGymnaste::class,'compet_composer','numEquipe','licenceG');
    }

    public function oldCompetitions(){
        return $this->belongsToMany(OldCompetition::class,'compet_participer','numEquipe','numCompet');
    }

    public function OldClub(){
        return $this->belongsTo(OldClub::class,'idClub');
    }
}
