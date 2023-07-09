<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentModel;


class ResultModel extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = [
        'marks', 'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }
}
