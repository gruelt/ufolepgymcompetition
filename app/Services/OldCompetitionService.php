<?php

namespace App\Services;

use App\Models\OldCompetition;

class OldCompetitionService
{
        public $oldCompetition;

        public function __construct($oldCompetitionId)
        {

            $this->oldCompetition = OldCompetition::find($oldCompetitionId)
            ->load(
                'oldEquipes',
                'oldEquipes.oldClub',
                'oldEquipes.oldGymnastes'
            )
            ;

        }

        public function import()
        {
           $this->importCompetition();
        }

        public function importCompetition()
        {
            print $this->oldCompetition;

                print json_encode($this->oldCompetition);
        }
}
