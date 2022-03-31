<?php

namespace App\Http\Controllers;

use App\Models\Agres;
use App\Models\AgresCompetitionGymnaste;
use App\Models\AgresCompetitionGymnasteNote;
use App\Models\Competition;
use App\Models\Gymnaste;
use Illuminate\Http\Request;

class AgresCompetitionGymnasteNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return "okokaaa";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$competition_id,$gymnaste_id , $agres_id)
    {



        // To do  : put in Gymnaste Service
        $acg = AgresCompetitionGymnaste::where('gymnaste_id',$gymnaste_id)
            ->where('competition_id',$competition_id)
            ->where('agres_id', $agres_id);

        if($acg->count() <= 0)
        {
            $acg = new AgresCompetitionGymnaste;


            $acg->gymnaste_id = $gymnaste_id;
            $acg->competition_id = $competition_id;
            $acg->agres_id = $agres_id;




            $acg->save();
        }
        else{
            $acg= $acg->first();
        }

        if($request->depart)
        {
            $acg->note_depart = $request->note;
            $acg->save();
        }
        else{
            $acgn = $acg->notes()->where('juge_id',$request->juge_id);

            if($acgn->count() <= 0)
            {
                $acgn = new AgresCompetitionGymnasteNote();

                $acgn->juge_id = $request->juge_id ;

                $acgn->agres_competition_gymnaste_id = $acg->id;

                $acgn->status = 'wait_check';


            }
            else{
                $acgn = $acgn->first();
            }

            if($request->note == "" || $request->note ==null)
            {
                print "nul note";
                $acgn->penalite = null;
            }
            else{
                $acgn->penalite = $request->note;

            }

            $acgn->save();

        }



        return "ok";


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgresCompetitionGymnasteNote  $agresCompetitionGymnasteNote
     * @return \Illuminate\Http\Response
     */
    public function show(AgresCompetitionGymnasteNote $agresCompetitionGymnasteNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgresCompetitionGymnasteNote  $agresCompetitionGymnasteNote
     * @return \Illuminate\Http\Response
     */
    public function edit(AgresCompetitionGymnasteNote $agresCompetitionGymnasteNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgresCompetitionGymnasteNote  $agresCompetitionGymnasteNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgresCompetitionGymnasteNote $agresCompetitionGymnasteNote)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgresCompetitionGymnasteNote  $agresCompetitionGymnasteNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgresCompetitionGymnasteNote $agresCompetitionGymnasteNote)
    {
        //
    }
}
