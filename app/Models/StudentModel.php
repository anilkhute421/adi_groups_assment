<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ResultModel;
use App\Models\SchoolModel;


class StudentModel extends Model
{
    use HasFactory;


    protected $table = 'studens';

    protected $fillable = [
        'studentName', 'school_id',
    ];

    public function result()
    {
        return $this->hasOne(ResultModel::class, 'student_id');
    }

    public function school()
    {
        return $this->belongsTo(SchoolModel::class, 'school_id');
    }
}


