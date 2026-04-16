<?php

namespace Database\Seeders; // Added for Laravel 10 compatibility

use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Imported the Str facade

class PaisesTableSeeder extends Seeder
{
    public function run()
    {
        $lista = listaPais();

        foreach($lista as $item) {
            \PMEexport\Models\Country::create([
                    "uuid"  => (string) Str::uuid(), // Removed the stray '\' before (string)
                    "sigla" => $item->sigla,
                    "nome"  => $item->nome_pais
                ]
            );
        }
    }
}