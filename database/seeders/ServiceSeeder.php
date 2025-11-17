<?php

/*namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /*public function run(): void
    {
        //
    }
}*/



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            ['nom' => 'Ressources Humaines', 'departement_id' => 1],
            ['nom' => 'Comptabilité',        'departement_id' => 1],
            ['nom' => 'Informatique',        'departement_id' => 2],
            ['nom' => 'Logistique',          'departement_id' => 3],
            ['nom' => 'Marketing',           'departement_id' => 3],
            ['nom' => 'Sécurité',            'departement_id' => 4],
        ]);
    }
}

