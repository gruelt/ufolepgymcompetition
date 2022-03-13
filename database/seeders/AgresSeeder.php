<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agres')->insert([
            'id' => '1',
            'name' => 'Sol-GAM',
            'shortname' => 'MS',
            'description'=> 'Sol Masculin',
            'genre_id' => 1
        ]);

        DB::table('agres')->insert([
            'id' => '2',
            'name' => 'Arçons',
            'shortname' => 'MAR',
            'description'=> 'Arçons',
            'genre_id' => 1
        ]);

        DB::table('agres')->insert([
            'id' => '3',
            'name' => 'Anneaux',
            'shortname' => 'MAN',
            'description'=> 'Anneaux',
            'genre_id' => 1
        ]);

        DB::table('agres')->insert([
            'id' => '4',
            'name' => 'Saut-GAM',
            'shortname' => 'MSA',
            'description'=> 'Saut Masculin',
            'genre_id' => 1
        ]);

        DB::table('agres')->insert([
            'id' => '5',
            'name' => 'Barres Parallèles',
            'shortname' => 'MBP',
            'description' => 'Barres Parallèles',
            'genre_id' => 1
        ]);

        DB::table('agres')->insert([
            'id' => '6',
            'name' => 'Barre Fixe',
            'shortname' => 'MBF',
            'description' => 'Barre Fixe',
            'genre_id' => 1
        ]);

        DB::table('agres')->insert([
            'id' => '7',
            'name' => 'Saut-GAF',
            'shortname' => 'FSA',
            'description' => 'Saut Féminin',
            'genre_id' => 2
        ]);

        DB::table('agres')->insert([
            'id' => '8',
            'name' => 'Barres Asymétriques',
            'shortname' => 'FB',
            'description' => 'Barres Asymétriques',
            'genre_id' => 2
        ]);

        DB::table('agres')->insert([
            'id' => '9',
            'name' => 'Poutre',
            'shortname' => 'FP',
            'description' => 'Poutre',
            'genre_id' => 2
        ]);

        DB::table('agres')->insert([
            'id' => '10',
            'name' => 'Sol-GAF',
            'shortname' => 'FS',
            'description' => 'Sol Féminin',
            'genre_id' => 2
        ]);



    }
}
