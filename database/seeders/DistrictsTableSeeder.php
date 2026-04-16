<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/distritos.json");
        $data = json_decode($json);
        $arrayFinal = [];
        foreach ($data as $district)
        {
            $arrayFinal[] = array(
                'id'          => $district->id,
                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
                'name'          => $district->name,
                'province_id'          => $district->provinciaId,
                'created_at'    => \Carbon\Carbon::now()
            );
        }

        DB::table('districts')->insert($arrayFinal);
    }
}