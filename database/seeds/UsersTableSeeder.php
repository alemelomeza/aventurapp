<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('users')->insert([
        [
          'name' => 'Abner Galvez',
          'dni' => '16069022-4',
          'email' => 'agc005@gmail.com',
          'address' => 'San Martin 73',
          'phone' => '225735441',
          'password' => bcrypt('abnerosk8'),
          'role' => 'administrator'
        ],
        [
          'name' => 'Empresa',
          'dni' => '11111111-1',
          'email' => 'empresa@mail.com',
          'address' => 'San Martin 73',
          'phone' => '225735441',
          'password' => bcrypt('abnerosk8'),
          'role' => 'company'
        ],
        [
          'name' => 'Usuario Normal',
          'dni' => '2222222-2',
          'email' => 'usuario@mail.com',
          'address' => 'San Martin 73',
          'phone' => '225735441',
          'password' => bcrypt('abnerosk8'),
          'role' => 'normal'
        ],


      ]);

    }
}
