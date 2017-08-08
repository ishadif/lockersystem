<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Permission')->create([
            'name' => 'create_sewa',
            'label' => 'Buat Data Sewa Baru'
        ]);

        factory('App\Permission')->create([
            'name' => 'edit_sewa',
            'label' => 'Ubah Data Sewa'
        ]);

        factory('App\Permission')->create([
            'name' => 'delete_sewa',
            'label' => 'Hapus Data Sewa'
        ]);

        factory('App\Permission')->create([
            'name' => 'create_sewa',
            'label' => 'Buat Data Sewa Baru'
        ]);

        factory('App\Permission')->create([
            'name' => 'create_maintenance',
            'label' => 'Buat Data Perawatan Loker Baru'
        ]);

        factory('App\Permission')->create([
            'name' => 'edit_maintenance',
            'label' => 'Ubah Data Perawatan Loker'
        ]);

        factory('App\Permission')->create([
            'name' => 'delete_maintenance',
            'label' => 'Hapus Data Perawatan Loker'
        ]);
    }
}
