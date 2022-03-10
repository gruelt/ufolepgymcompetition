<?php

namespace App\Services;

use App\Models\Categorie;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Equipe;
use App\Models\Genre;
use App\Models\Niveau;
use App\Models\OldCompetition;

class ImportService
{
        public $oldCompetitionId;

        public function __construct($oldCompetition)
        {

            $this->oldCompetition = $oldCompetition;


        }

        public function import()
        {
           $this->importCompetition();
        }




        public function importCompetition()
        {
            $competition = Competition::where('old_numCompet',$this->oldCompetition->numCompet);

            $competitiondata = [
                'old_numCompet' => $this->oldCompetition->numCompet,
                'type' => $this->oldCompetition->typeCompet,
                'ville' => $this->oldCompetition->lieuCompet,
                'departement' => $this->oldCompetition->depCompet,
                'old_date' => $this->oldCompetition->dateCompet,
                'niveau_gaf' => $this->oldCompetition->niveauxGaf,
                'niveau_gam' => $this->oldCompetition->niveauxGam,
            ];

            if($competition->count() > 0)
            {
                $competition->first();
                $competition->update($competitiondata);
            }
            else{
                $competition = new Competition;
                $competition->fill($competitiondata);
                $competition->save();
            }





            foreach($this->oldCompetition->oldEquipes()->get() as $oldEquipe)
            {
                print "<hr>".$oldEquipe;
                $this->importEquipe($oldEquipe,$competition->first());
            }


        }



        public function importEquipe($oldEquipe,$competition)
        {
            $oldClub = $oldEquipe->oldClub()->first();


            $club = $this->importClub($oldClub);

            $categorie = $this->importCategorie($oldEquipe->sexe, $oldEquipe->cate);

            $niveau = $this->importNiveau($oldEquipe->niveau);

            $genre = Genre::where('description',$oldEquipe->sexe)->first();




            $equipe = Equipe::where('old_numEquipe',$oldEquipe->numEquipe);

            if($equipe->count() > 0)
            {
                $equipe = $equipe->first();
            }
            else{

                $equipe = new Equipe;


            }

            $equipe->name = $club->nom ."-".$oldEquipe->numeroEquipe;
            $equipe->individuel = $oldEquipe->indiv;
            $equipe->finalite = $oldEquipe->finalite;
            $equipe->club_id = $club->id;
            $equipe->genre_id = $genre->id;
            $equipe->niveau_id = $niveau->id;
            $equipe->categorie_id = $categorie->id;
            $equipe->old_numEquipe = $oldEquipe->numEquipe;
            $equipe->competition_id = $competition->id;

                $equipe->save();


        }





        public function importClub($oldClub)
        {


            $club = Club::firstOrNew(['old_idClub' => $oldClub->idClub]);

            $club->nom   = $oldClub->nomClub;
            $club->ville = $oldClub->villeClub;
            $club->mail  = $oldClub->mailClub;
            $club->departement = $oldClub->depClub;
            $club->old_idClub = $oldClub->idClub;
            $club->code = $oldClub->codeClub;

            $club->save();

            return $club;

        }

        public function importCategorie($oldgenre,$oldcategorie)
        {




            $categorie = Categorie::where('description',$oldcategorie);

            if($categorie->count() > 0)
            {
                $categorie = $categorie->first();
            }
            else{
                $categorie = new Categorie;
            }

            if(str_contains($oldcategorie,'+'))
            {
                $age_max=99;
                $age_min=11;
                $name = $age_min."+";
            }else{

                $ages = explode('-',str_replace(' ans','',$oldcategorie));
                $age_min = $ages[0];
                $age_max = $ages[1];
                $name=$age_min."-".$age_max;
            }


            $categorie->description = $oldcategorie;
            $categorie->name = $name;
            $categorie->age_min = $age_min;
            $categorie->age_max = $age_max;


            $categorie->save();

            return $categorie;

        }



        public function importNiveau($oldniveau)
        {
            $niveau = Niveau::where('description',$oldniveau);


            if($niveau->count() > 0)
            {
                $niveau = $niveau->first();
            }
            else{
                $niveau = new Niveau;
                $niveau->name = $oldniveau;
                $niveau->description = $oldniveau;


            }



            $niveau->save();

            return $niveau;


        }

}
