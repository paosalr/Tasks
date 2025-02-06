<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'title' => 'Tarea 1',
                'description' => 'Prueba de tarea 1.',
                'state_id' => 1
            ],
            [
                'title' => 'Tarea 2',
                'description' => 'Prueba de tarea 2.',
                'state_id' => 2
            ],
            [
            'title' => 'Tarea 3',
            'description' => 'Prueba de tarea 3.',
            'state_id' => 3
            ]
        ]);
    }
}
