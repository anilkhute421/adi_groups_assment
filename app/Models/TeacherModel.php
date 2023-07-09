<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolModel;
use Illuminate\Database\Eloquent\Relations\HasOne;


class TeacherModel extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'teacherName', 'school_id',
    ];

    public function salary(): HasOne
    {
        return $this->hasOne(TeaSalaryModel::class, 'teacher_id');
    }
}
