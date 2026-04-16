<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//            $arrayFinal = array(
//                'uuid'          => (string) \Illuminate\Support\Str::uuid(),
//                'name'          => "Teste Categoria",
//                'photo'          => "ArhMsB2B9KAVSW7EHk0fIq2qKypP7A38ulhP9NiZ.jpeg",
//                'created_at'    => \Carbon\Carbon::now()
//            );

        DB::table('product_categories')->insert($arrayFinal);
    }
}