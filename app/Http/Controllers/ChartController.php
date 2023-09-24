<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showCharts()
    {
        $student_count = Student::count();
        $state_count = City::count();
        $male_count = Student::where('gender', 'male')->count();
        $female_count = Student::where('gender', 'female')->count();

        $cities = City::all();
        $data = Student::with('city')->get();

        // $data = DB::table('students')
        //     ->join('city', 'city.id', '=', 'students.city_id')
        //     ->get();

        $genderData = Student::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        $majorData = Student::select('major', DB::raw('count(*) as total'))
            ->groupBy('major')
            ->get();

        $stateData = City::select('state', DB::raw('count(*) as total'))
            ->groupBy('state')
            ->get();

        $studentMonthlyCount = Student::select(
            DB::raw('DATE_FORMAT(date_apply, "%Y-%m") as month'),
            DB::raw('YEAR(date_apply) as year'),
            DB::raw('count(*) as total')
        )
            ->groupBy('year', 'month')
            ->get();

        return view('dashboard', compact('female_count', 'male_count', 'student_count', 'state_count', 'genderData', 'cities', 'studentMonthlyCount', 'majorData', 'stateData', 'data'));
    }

    public function showCharts1()
    {

        $genderData = Student::select('gender', DB::raw('count(*) as total'))->groupBy('gender')->get();
        $majorData = Student::select('major', DB::raw('count(*) as total'))->groupBy('major')->get();
        $stateData = City::select('state', DB::raw('count(*) as total'))->groupBy('state')->get();
        // Query to get student count by month from date_apply
        $studentMonthlyCount = Student::select(
            DB::raw('DATE_FORMAT(date_apply, "%Y-%m") as month'),
            DB::raw('YEAR(date_apply) as year'),
            DB::raw('count(*) as total')
        )
            ->groupBy('year', 'month')
            ->get();

        return view('components.charts.charts', compact('genderData', 'studentMonthlyCount', 'majorData', 'stateData'));
    }
}
