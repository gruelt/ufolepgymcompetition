<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class SaisonSeeder extends  CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function __construct()
    {
        $this->file = '/database/seeders/csv/SaisonSeeder.csv';
        $this->tablename = 'saisons';
        $this->delimiter = ',';
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($this->tablename)->truncate();
        parent::run();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
