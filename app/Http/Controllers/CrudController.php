<?php

namespace App\Http\Controllers;

use App\Models\ResultModel;
use App\Models\SchoolModel;
use App\Models\StudentModel;
use App\Models\User;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index(Request $request)
    {
        return view('userList');
    }

    public function get_list()
    {
        $students = StudentModel::with('result', 'school')->get();
        return $students;
    }

    public function create(request $request)
    {

        $data= new StudentModel;
       



        // dd($data);
        
        return view('userAdd' , compact('data'));
    }

    public function createUser(request $request)
    {

        $school = new SchoolModel;

        // Assign values to the model attributes
        $school->schoolName = $request->input('schoolName');
        $school->location = $request->input('location');

        // Save the school record
        $school->save();

        // dd($school);

        $student = new StudentModel;

        // Assign values to the model attributes
        $student->studentName = $request->input('studentName');
        $student->school_id = $school->id;

        // Save the student record
        $student->save();

        // Create a new result instance
        $result = new ResultModel;

        // Assign values to the model attributes
        $result->marks = $request->input('marks');
        $result->student_id = $student->id;

        // Save the result record
        $result->save();

        return response()->json(['message' => 'Data submit successfully'], 200);

    }


    public function updateUser(request $request)
    {
        
       // Get the student ID from the request
    $studentId = $request->input('studentId');

    // Find the student record
    $student = StudentModel::findOrFail($studentId);

    // Update the student name
    $student->studentName = $request->input('studentName');

    // Save the updated student record
    $student->save();

    // Update the associated result record
    $result = ResultModel::where('student_id', $studentId)->first();
    $result->marks = $request->input('marks');
    $result->save();

    // Update the associated school record
    $school = SchoolModel::findOrFail($student->school_id);
    $school->schoolName = $request->input('schoolName');
    $school->location = $request->input('location');
    $school->save();

        return response()->json(['message' => 'Data update successfully'], 200);

    }

    public function update($id)
    {

        $data = StudentModel::with('result', 'school')->find($id);
        // return $students;
        // update
        return view('userAdd' , compact('data'));
    }

    public function deleteUser($id)
    {

        // $data = SchoolModel::with('result', 'student')->find($id);
        $data = StudentModel::with('result', 'school')->find($id);


        if ($data) {
            $data->delete();
            $data->school->delete();
            $data->result->delete();
            return redirect('/');
        }

    }

    public function userfilter()
    {

        return view('userFilter');
    }

}
