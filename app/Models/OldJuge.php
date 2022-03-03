<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldJuge extends Model
{
    use HasFactory;

    protected $table = "compet_juges";

    protected $primaryKey="idJuge";

    public function oldCompetitions(){
        return $this->belongsToMany(OldCompetition::class,'compet_jugement','idJuge','numCompet');
    }

}
