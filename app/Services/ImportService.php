<?php

namespace App\Services;

use App\Models\Categorie;
use App\Models\Club;
use App\Models\Genre;
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


            foreach($this->oldCompetition->oldEquipes()->get() as $oldEquipe)
            {
                print "<hr>".$oldEquipe;
                $this->importEquipe($oldEquipe);
            }


        }



        public function importEquipe($oldEquipe)
        {
            $oldClub = $oldEquipe->oldClub()->first();

            //Import Club / update
            $club_id = $this->importClub($oldClub);

            //print $oldEquipe->cate;
            $this->importCategorie($oldEquipe->sexe, $oldEquipe->cate);



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

            return $club->id;

        }

        public function importCategorie($oldgenre,$oldcategorie)
        {
            $genre = Genre::where('description',$oldgenre)->first();

//            $categorie = Categorie::firstOrNew(
//                            ['genre_id' => $genre->id],
//                            ['description' => $oldcategorie]
//            );

            $categorie = Categorie::where('genre_id',$genre->id)
                            ->where('description',$oldcategorie);

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

            $categorie->genre_id = $genre->id;
            $categorie->description = $oldcategorie;
            $categorie->name = $name;
            $categorie->age_min = $age_min;
            $categorie->age_max = $age_max;


            $categorie->save();


        }

}
