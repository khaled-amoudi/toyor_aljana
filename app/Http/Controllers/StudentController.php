<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Imports\StudentsImport;
use App\Models\Room;
use App\Models\Year;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {

        $search = request()->query('search');
        if($search){
            $students = Student::where('name', 'LIKE', "%{$search}%")->get();  //->simplePaginate(2);
        } elseif(!$search || $search == '') {
            $students = Student::get();  //simplePaginate(30);
        }
        return view('list-student', compact('students'))->with('i', 1);
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('show-student', compact('student'));
    }

    public function create()
    {

        $years = Year::get(['id', 'name'])->sortDesc();
        $rooms = Room::get(['id', 'name']);

        return view('add-student', compact('years', 'rooms'));
    }

    public function store(StudentRequest $request)
    {
        $students = Student::create([
            'name' => $request->name,
            'idNumber' => $request->idNumber,
            'birthday' => $request->birthday,
            'stage' => $request->stage,
            'fastTest' => $request->fastTest,
            'gender' => $request->gender,
            'room_id' => $request->room_id,
            'location' => $request->location,
            'phone' => $request->phone,
            'fatherIdNumber' => $request->fatherIdNumber,
            'description' => $request->description,
            'year_id' => $request->year_id,
        ]);

        if ($students) {
            return redirect()->back()->with(['success' => 'تمت عملية الإضافة بنجاح ✔️']);
        } else {
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $years = Year::get(['id', 'name'])->sortDesc();
        $rooms = Room::get(['id', 'name']);

        return view('edit-student', compact('student', 'years', 'rooms'));
    }

    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->back();
        }

        $student->update($request->all()); // this way is unsecure

        return redirect()->back()->with(['success' => 'تمت عملية التعديل بنجاح ✔️']);
    }

    public function delete($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return redirect()->back();
        }

        $student->finances()->delete();
        $student->delete();

        return redirect()->back()->with(['success' => 'تمت عملية الحذف بنجاح ✔️']);
        // return redirect()->route('home')->with(['success' => 'تمت عملية الحذف بنجاح ✔️']);
    }



    public function import(Request $request){

        $file = $request->file('file');

        // Excel::import(new StudentsImport, $file);
        (new StudentsImport)->import($file); //->store('import');  // we use store method to save the file in storage (تستخدم فقط اذا كانت البيانات المستوردة كبيرة)
        return back()->with('status', 'تم رفع الملف بنجاح ');

    }

}
