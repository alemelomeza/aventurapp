<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('companies')->insert([
        [
          'name' => 'Empresa 1',
          'dni' => '33333333-3',
          'email' => 'empresa_mail@mail.com',
          'address' => 'San Martin 73',
          'contact_name' => 'Encargado Empresa',
          'user_id' => 2
        ]
      ]);
    }
}
