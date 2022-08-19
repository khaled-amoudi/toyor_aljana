<?php

namespace App\Http\Controllers;

use App\Http\Requests\YearRequest;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function year(){

        $years = Year::get(['id', 'name']);
        return view('years', compact('years'));
    }

    public function show($id)
    {

        $search = request()->query('search');

        if($search){
            $students = Student::where('name', 'LIKE', "%{$search}%")->where('year_id', $id)->get();
        } elseif(!$search || $search == '') {
            $students = Year::find($id)->students->where('year_id', $id);
        }
        $year = Year::find($id);
        return view('show-year', compact('students', 'year'))->with('i', 1);
    }


    public function store(YearRequest $request)
    {
        $year = Year::create([
            'name' => $request->name,
        ]);

        if ($year) {
            return redirect()->back()->with(['success' => 'تمت عملية الإضافة بنجاح ✔️']);
        } else {
            return back()->withInput();
        }
    }

}
