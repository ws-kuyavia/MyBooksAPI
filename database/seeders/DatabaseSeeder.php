<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['random','apiuser@yrandomgeneric.com',md5('qwerty1')]);
        DB::table('users')->insert(['random','apiuser@kuyavia.pl',md5('qwerty1')]);

         User::factory(10)->create();
    }
}
