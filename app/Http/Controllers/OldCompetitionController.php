<?php

namespace App\Http\Controllers;

use App\Models\OldCompetition;
use App\Services\ImportService;
use Illuminate\Http\Request;

class OldCompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldCompetitions = OldCompetition::all()->load('oldEquipes');

        return view('pages.old-competitions.old-competitions-index',compact('oldCompetitions'));
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
     * @param  \App\Models\OldCompetition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(OldCompetition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OldCompetition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(OldCompetition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OldCompetition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OldCompetition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OldCompetition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(OldCompetition $competition)
    {
        //
    }

    public function import($oldCompetitionId)
    {
        //print $oldCompetitionId;
        set_time_limit(300);
        $oldCompetition = OldCompetition::find($oldCompetitionId);
        $ImportService = new ImportService($oldCompetition);
        $ImportService->import();
    }
}
