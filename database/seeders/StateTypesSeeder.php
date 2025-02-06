<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_types')->insert([
           ['name' => 'Pending'],
           ['name' => 'Completed'],
           ['name' => 'In Progress'],
        ]);
    }
}
