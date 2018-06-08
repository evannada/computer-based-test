<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        'name' => 'Admin',
        'username' => 'administrator',
        'password' => bcrypt('administrator'),
        'remember_token' => str_random(10),
      ]);

      DB::table('users')->insert([
        'name' => 'Guru',
        'username' => 'teacher',
        'password' => bcrypt('teacher'),
        'remember_token' => str_random(10),
      ]);

      DB::table('users')->insert([
        'name' => 'Siswa',
        'username' => 'student',
        'password' => bcrypt('student'),
        'remember_token' => str_random(10),
      ]);
    }
}
