<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workers')->insert([
            [
                'name' => 'Jhon Doe',
                'username'=> 'jhondoe',
                'email' => 'jhondoe@gmail.com',
                'password' => bcrypt('jhondoe123'),
                'phone' => '62127889921',
                'departmen_id' => 2
            ]
            ]);
    }
}
