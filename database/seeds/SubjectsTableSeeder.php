<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('subjects')->insert([
          'name' => 'Bahasa Indonesia',
      ]);

      DB::table('subjects')->insert([
          'name' => 'Bahasa Inggris',
      ]);

      DB::table('subjects')->insert([
          'name' => 'Matematika',
      ]);

      DB::table('subjects')->insert([
          'name' => 'Ilmu Pengetahuan Alam',
      ]);
    }
}
