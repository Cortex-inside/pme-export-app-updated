<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'uuid'              => (string) Str::uuid(),
                'name'              => 'Suporte',
                'status'            => 1,
                'company_id'        => null,
                'email'             => 'suporte@fsitecnologia.com.br',
                'password'          => bcrypt('123456'),
                'remember_token'    => Str::random(10),
                'created_at'        => Carbon::now()
            ]
        ]);

        DB::table('users')->insert([
            [
                'uuid'              => (string) Str::uuid(),
                'name'              => 'Admin',
                'status'            => 1,
                'company_id'        => null,
                'email'             => 'admin@pmeexporte.co.mz',
                'password'          => bcrypt('123456'),
                'remember_token'    => Str::random(10),
                'created_at'        => Carbon::now()
            ]
        ]);

        // Spatie: model_has_roles (role_id, model_type, model_id)
        $userClass = \PMEexport\Models\User::class;
        DB::table('model_has_roles')->insert(['role_id' => 1, 'model_type' => $userClass, 'model_id' => 1]);
        DB::table('model_has_roles')->insert(['role_id' => 2, 'model_type' => $userClass, 'model_id' => 2]);
    }
}
