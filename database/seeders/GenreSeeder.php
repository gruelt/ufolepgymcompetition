<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;


class GenreSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->file = '/database/seeders/csv/GenreSeeder.csv';
        $this->tablename = 'genres';
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
