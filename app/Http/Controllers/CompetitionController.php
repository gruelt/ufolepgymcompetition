<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Agres;
use App\Models\OldCompetition;
use App\Services\CompetitionService;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::all()->load('equipes');

        return view('pages.competitions.index',compact('competitions'));
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
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        $competition = $competition;

        $nav['parent']['title'] = "Compétitions";
        $nav['parent']['url'] = route('competitions.index');
        $nav['title']=$competition->ville. " ". $competition->old_date;

        $niveaux = CompetitionService::niveaux($competition)->pluck('description','id');
        $categories = CompetitionService::categories($competition)->pluck('description','id');
        $agres = Agres::all();

        return view('pages.competitions.show',compact('competition','nav','agres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        //
    }
}
