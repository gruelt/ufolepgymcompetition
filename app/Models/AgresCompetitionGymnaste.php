<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgresCompetitionGymnaste extends Model
{
    use HasFactory;

    protected $table="agres_competition_gymnaste";

    protected $fillable =
        ['gymnaste_id'];


    public function notes(){
        return $this->hasMany(AgresCompetitionGymnasteNote::class);
    }



}
