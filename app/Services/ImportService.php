<?php

namespace App\Services;

use App\Models\Categorie;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Equipe;
use App\Models\Genre;
use App\Models\Gymnaste;
use App\Models\Niveau;
use App\Models\OldCompetition;
use App\Models\Saison;

class ImportService
{
        public $oldCompetitionId;
        public $debug;
        public $saison;

        public function __construct($oldCompetition)
        {

            $this->oldCompetition = $oldCompetition;
            $this->debug = true;
            $this->saison = Saison::where('actuelle',1)->first();
        }

        public function log($data,$color="black")
        {
            if($this->debug) {
                print "<font color=$color>".$data."</font>";
            }
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
                'saison_id' => $this->saison->id
            ];

            $this->log("Competition : ". $competitiondata['ville'] . $competitiondata['old_date']);

            if($competition->count() > 0)
            {
                $competition = $competition->first();
                $competition->update($competitiondata);


                $this->log('UPDATE',"green");
            }
            else{
                $competition = new Competition;
                $competition->fill($competitiondata);
                $competition->save();
                $competition->first();

                $this->log('Import' .$competition->id,"orange");
            }





            foreach($this->oldCompetition->oldEquipes()->get() as $oldEquipe)
            {

                $equipe = $this->importEquipe($oldEquipe,$competition);

                foreach ($oldEquipe->oldGymnastes()->get() as $oldGymnaste)
                {


                    $gymnaste = $this->importGymnaste($oldGymnaste,$equipe);



                    if($gymnaste->clubs()->wherePivot('club_id',$equipe->club_id)->wherePivot('saison_id',$this->saison->id)->count() <= 0 )
                    {
                        $gymnaste->clubs()->attach($equipe->club_id, ['saison_id' => $this->saison->id]);
                    }

                    $gymnaste->equipes()->syncWithoutDetaching($equipe->id);

                }


            }


        }



        public function importEquipe($oldEquipe,$competition)
        {

            $this->log('Old competition Id'. $competition->id ,'red');

            $oldClub = $oldEquipe->oldClub()->first();

            $this->log('<br><br>>>Equipe : ' .$oldClub->nomClub."-".$oldEquipe->sexe . " ".$oldEquipe->niveau ." ".$oldEquipe->cate ."-".$oldEquipe->numeroEquipe);

            $club = $this->importClub($oldClub);

            $categorie = $this->importCategorie($oldEquipe->sexe, $oldEquipe->cate);

            $niveau = $this->importNiveau($oldEquipe->niveau);

            $genre = Genre::where('description',$oldEquipe->sexe)->first();




            $equipe = Equipe::where('old_numEquipe',$oldEquipe->numEquipe);

            if($equipe->count() > 0)
            {
                $this->log('<br> Equipe :update','green');
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

            return $equipe;

        }

        public function importGymnaste($oldgymnaste,$equipe)
        {
                $gymnaste = Gymnaste::where('licence',$oldgymnaste->licenceG);

                $this->log("<br>".$oldgymnaste->nomG." ".$oldgymnaste->prenomG,"black");

                if($gymnaste->count() > 0)
                {
                    $gymnaste = $gymnaste->first();
                    $this->log('UPDATE','green');
                }
                else{
                    $gymnaste = new Gymnaste();
                    $this->log('NEW','orange');

                }

                $gymnaste->nom = $oldgymnaste->nomG;
                $gymnaste->prenom = $oldgymnaste->prenomG;
                $gymnaste->annee = $oldgymnaste->anneeG;
                $gymnaste->licence = $oldgymnaste->licenceG;
                $gymnaste->genre_id = $equipe->genre_id;

                $gymnaste->save();



                 return $gymnaste;

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
                $this->log('<br> Categorie :update','green');
                $categorie = $categorie->first();
            }
            else{
                $categorie = new Categorie;
                $this->log('<br> Categorie :New','orange');
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
                $this->log("<br> Niveau: $oldniveau" ,"green");
            }
            else{
                $this->log("<br>Nouveau Niveau: $oldniveau" ,"orange");
                $niveau = new Niveau;
                $niveau->name = $oldniveau;
                $niveau->description = $oldniveau;


            }



            $niveau->save();

            return $niveau;


        }

}
