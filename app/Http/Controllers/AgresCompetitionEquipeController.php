<?php

namespace App\Http\Controllers;

use App\Models\AgresCompetitionCategorieGenreNiveau;
use App\Models\Competition;
use App\Models\Equipe;
use App\Models\Agres;
use Illuminate\Http\Request;

class AgresCompetitionEquipeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition,Equipe $equipe,$agres_id)
    {
        $nav['parent']['title'] = "Compétition";
        $nav['parent']['url'] = route('competitions.show',$competition->id);
        $nav['title']="haha";

        $agres=Agres::find($agres_id);

        $agresCompetitionCategorieGenreNiveau = AgresCompetitionCategorieGenreNiveau::where('competition_id',$competition->id)->where('agres_id',$agres_id);



        if($agresCompetitionCategorieGenreNiveau->count() <= 0)
        {
            $juges = new AgresCompetitionCategorieGenreNiveau;

            $juges->competition_id = $competition->id;
            $juges->agres_id= $agres_id;
            $juges->categorie_genre_niveau_id = $equipe->categorie_genre_niveau_id;

            $juges->save();
        }
        else{
            $juges = $agresCompetitionCategorieGenreNiveau->first();
        }


        $equipe = $equipe->load([

            'genre',
            'gymnastes.agresCompetition.notes',

            'gymnastes.agresCompetition' => function ($agrescompetition) use ($competition,$agres) {
            $agrescompetition->where('competition_id', $competition->id)
                ->where('agres_id',$agres->id);
        }]);


        return view('pages.competitions.equipes.agres.show',compact('competition','nav','agres','equipe','juges'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
