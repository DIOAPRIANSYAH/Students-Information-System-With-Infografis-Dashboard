<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentsController extends Controller
{
    public function index()
    {
        $cities = City::all();

        $data = Student::with('city')->get();
        // $data = DB::table('students')
        //     ->join('city', 'city.id', '=', 'students.city_id')
        //     ->get();
        // dd($student);

        return view('components.tables.student', compact('data', 'cities'));
    }

    public function showForm()
    {
        $cities = City::all();
        $data = DB::table('students')
            ->join('city', 'city.id', '=', 'students.city_id')
            ->get();

        return view('components.form.add-data', compact('cities'))->with('data', $data);
    }


    public function store(Request $request)
    {
        $student = new Student;

        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->major = $request->input('major');
        $student->date_apply = $request->input('date_apply');
        $student->city_id = $request->input('city_id');

        $student->save();
        return redirect('students.store')->with('Success', 'Add Student Successfuly');
    }
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('components.detail.detail-student', compact('student'));
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        $data = DB::table('students')
            ->join('city', 'city.id', '=', 'students.city_id')
            ->get();
        return view('students.edit', compact('student', 'cities'))->with('data', $data);
    }

    public function update(Request $request, Student $student)
    {
        // $student = Student::find($id);

        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->major = $request->major;
        // $student->date_apply = $request->date_apply;
        // $student->city_id = $request->city_id;
        // $student->save();
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
