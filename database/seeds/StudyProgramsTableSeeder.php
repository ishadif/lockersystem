<?php

use Illuminate\Database\Seeder;

class StudyProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\StudyProgram')->create([
        	'name' => 'sistem informasi',
        	'slug' => 'sif'
        ]);

        factory('App\StudyProgram')->create([
        	'name' => 'teknik informatika',
        	'slug' => 'tik'
        ]);

        factory('App\StudyProgram')->create([
        	'name' => 'manajemen',
        	'slug' => 'mananjemen'
        ]);

        factory('App\StudyProgram')->create([
        	'name' => 'akuntansi',
        	'slug' => 'akuntansi'
        ]);

        factory('App\StudyProgram')->create([
        	'name' => 'hubungan internasional',
        	'slug' => 'hi'
        ]);
    }
}
