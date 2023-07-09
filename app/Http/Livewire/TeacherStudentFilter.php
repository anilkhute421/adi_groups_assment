<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TeacherModel;
use App\Models\StudentModel;

class TeacherStudentFilter extends Component
{
    public $teacherMinSalary;
    public $teacherMaxSalary;
    public $studentMinMarks;
    public $studentMaxMarks;

    public function render()
    {
        $teachers = TeacherModel::whereHas('salary', function ($query) {
            $query->whereBetween('salary', [$this->teacherMinSalary, $this->teacherMaxSalary]);
        })
            ->with(['school', 'salary'])
            ->get();

        $students = StudentModel::whereHas('result', function ($query) {
            $query->whereBetween('marks', [$this->studentMinMarks, $this->studentMaxMarks]);
        })
            ->with(['school', 'result'])
            ->get();

            // dd($teachers);

        return view('livewire.teacher-student-filter', compact('teachers', 'students'));
    }
}
