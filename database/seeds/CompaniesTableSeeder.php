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
        factory(App\User::class, 50)->states('company')->create()->each(function ($u) {
            $u->company()->save(factory(App\Company::class)->make());
        });
    }
}
