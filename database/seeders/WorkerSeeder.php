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
                'phone' => '621278921',
                'telegram_id' => '7735887326',
                'departmen_id' => 1
            ],
            [
                'name' => 'Jhon',
                'username'=> 'jhondoe',
                'email' => 'jdoe@gmail.com',
                'password' => bcrypt('jhondoe123'),
                'phone' => '6212789921',
                'telegram_id' => '7735887326',
                'departmen_id' => 2
            ],
              [
                'name' => 'Jhon',
                'username'=> 'jhondoe',
                'email' => 'jhdoe@gmail.com',
                'password' => bcrypt('jhondoe123'),
                'phone' => '6212788921',
                'telegram_id' => '7735887326',
                'departmen_id' => 3
              ],
              [
                'name' => 'Jhon',
                'username'=> 'jhondoe',
                'email' => 'jondoe@gmail.com',
                'password' => bcrypt('jhondoe123'),
                'phone' => '621221',
                'telegram_id' => '7735887326',
                'departmen_id' => 2
            ]
            ]);
    }
}
