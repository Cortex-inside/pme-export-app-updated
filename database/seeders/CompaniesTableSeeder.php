<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('companies')->insert([
//            [
//                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
//                'name'          => 'Empresa Padrão',
//                'district_id'   => 1,
//                'nuit'          => 123,
//                'alvara'        => 123,
//                'created_at'    => \Carbon\Carbon::now()
//            ]
//        ]);


        DB::table('legal_situations')->insert([
            [
                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
                'name'          => 'Estatal',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
                'name'          => 'Privada',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
                'name'          => 'Mista',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
                'name'          => 'Indefinido',
                'created_at'    => \Carbon\Carbon::now()
            ]
        ]);
    }
}
