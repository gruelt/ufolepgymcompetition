<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgresCompetitionGymnasteNote extends Model
{
    use HasFactory;

    protected $table ='agres_competition_gymnaste_note';

    public function agresCompetitionGymnaste()
    {
        $this->belongsTo(AgresCompetitionGymnaste::class);
    }
}
