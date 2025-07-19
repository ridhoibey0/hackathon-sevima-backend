<?php

namespace Database\Seeders;

use App\Models\DepartmentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department_category')->insert([
            [
                'name' => 'plumbing',
            ],
            [
                'name' => 'electrical',
            ],
            [
                'name' => 'cleaning',
            ],
            [
                'name' => 'security',
            ],
        ]);
    }
}
