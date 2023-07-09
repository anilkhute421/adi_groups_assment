<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeaSalaryModel extends Model
{
    use HasFactory;

    protected $table = 'teacher_salary';

    protected $fillable = [
        'salary', 'teacher_id',
    ];

}
