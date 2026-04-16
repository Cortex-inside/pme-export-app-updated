<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;

class CaesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Now it knows where to find the File facade!
        $json = File::get("database/data/cae.json");
        $data = json_decode($json);
        $arrayFinal = [];
        
        foreach ($data as $cae)
        {
            $arrayFinal[] = array(
                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
                'code'          => $cae->codCae,
                'description'   => $cae->descriacao,
                'designation'   => $cae->desiganacao,
                'created_at'    => \Carbon\Carbon::now()
            );
        }

        // And it knows where to find the DB facade!
        DB::table('caes')->insert($arrayFinal);
    }
}