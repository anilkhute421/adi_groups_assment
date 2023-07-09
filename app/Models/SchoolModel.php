<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentModel;


class SchoolModel extends Model
{
    use HasFactory;

    protected $table = 'schools';

    protected $fillable = [
        'schoolName', 'location',
    ];

    public function students()
    {
        return $this->hasMany(StudentModel::class, 'school_id');
    }
    

}
