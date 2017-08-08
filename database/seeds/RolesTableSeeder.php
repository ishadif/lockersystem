<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Role')->create([
            'name' => 'admin',
            'slug' => 'admin'
        ]);

        factory('App\Role')->create([
            'name' => 'bagian kemahasiswaan',
            'slug' => 'kemahasiswaan'
        ]);

        factory('App\Role')->create([
            'name' => 'bagian keuangan',
            'slug' => 'keuangan'
        ]);

        factory('App\Role')->create([
            'name' => 'bagian umum',
            'slug' => 'umum'
        ]);
    }
}
