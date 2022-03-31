<?php

namespace App\Services;

use App\Models\AgresCompetitionGymnaste;
use App\Models\Competition;
use App\Models\Gymnaste;
use App\Models\Agres;

class GymnasteService
{

    /** Initiates all entries on agres for a gymnas in a competition
     * @param Gymnaste $gymnaste
     */
    public static function initAgresCompetition(Gymnaste $gymnaste,Competition $competition){
        $agres = Agres::where('genre_id',$gymnaste->genre_id)->get();

        foreach($agres as $agre)
        {
            $acg = AgresCompetitionGymnaste::where('gymnaste_id', $gymnaste->id)
                                             ->where('agres_id',$agre->id)
                                             ->where('competition_id',$competition->id);

            if($acg->count() == 0){
                $acg=new AgresCompetitionGymnaste();

                $acg->gymnaste_id = $gymnaste->id;
                $acg->agres_id = $agre->id;
                $acg->competition_id = $competition->id;

                $acg->save();

            }
        }
    }

}
