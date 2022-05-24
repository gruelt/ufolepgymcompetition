<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([GenreSeeder::class]);
        $this->call([NiveauSeeder::class]);
        $this->call([SaisonSeeder::class]);
        $this->call([AgresSeeder::class]);
        $this->call([CategorieGenreNiveauSeeder::class]);
    }
}
