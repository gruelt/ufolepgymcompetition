<?php

namespace App\Services;

use App\Models\Categorie;
use App\Models\Competition;
use App\Models\Niveau;

class CompetitionService
{
    public $competition;

    public function __construct(Competition $competition){
        $this->competition =$competition;
    }

    /** Récupère les catégories d'une compétition
     * @param Competition $competition
     * @return mixed
     */
    public static function categories(Competition $competition){
        $categories = Categorie::wherehas('equipes' , function ($equipes) use ($competition) {
            $equipes->wherehas('competition', function ($compet) use ($competition) {
                $compet->where('id',$competition->id);
            });
        });

        return $categories;
    }

    /** Récupère les niveaux d'une competition
     * @param Competition $competition
     * @return mixed
     */
    public static function niveaux(Competition $competition){
        $niveaux = Niveau::wherehas('equipes' , function ($equipes) use ($competition) {
            $equipes->wherehas('competition', function ($compet) use ($competition) {
                $compet->where('id',$competition->id);
            });
        })->get();

        return $niveaux;
    }

    /** récupère les équipes
     * @param Competition $competition
     * @return mixed
     */
    public static function equipes(Competition $competition){
        $equipes = $competition->equipes();

        return $equipes;
    }


}
