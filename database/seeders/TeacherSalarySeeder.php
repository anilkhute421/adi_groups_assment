<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeaSalaryModel;

class TeacherSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeaSalaryModel::create([
            'salary' => 35000,
            'teacher_id' => 1,
        ]);
    }
}
