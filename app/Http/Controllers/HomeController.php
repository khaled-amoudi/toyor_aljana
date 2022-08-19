<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students_count = Student::count();

        // $students_full_paied ==> (sum of all amounts of all stds - sum of paied amounts of all stds)/ students_count

        $rooms_count = Room::count();

        return view('home', compact('students_count', 'rooms_count'));
    }



}
