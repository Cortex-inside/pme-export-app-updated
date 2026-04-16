<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/provincias.json");
        $data = json_decode($json);
        $arrayFinal = [];
        foreach ($data as $provincia)
        {
            $arrayFinal[] = array(
                'id'            => $provincia->id,
                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
                'name'          => $provincia->name,
                'created_at'    => \Carbon\Carbon::now()
            );
        }

        DB::table('provinces')->insert($arrayFinal);
    }
}