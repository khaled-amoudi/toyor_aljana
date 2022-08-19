<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;

class RoomController extends Controller
{


    public function room()
    {
        $rooms = Room::get(['id', 'name']);

        return view('rooms', compact('rooms'));
    }

    public function show($id)
    {

        $search = request()->query('search');

        if($search){
            $students = Student::where('name', 'LIKE', "%{$search}%")->where('room_id', $id)->get();
        } elseif(!$search || $search == '') {
            $students = Room::find($id)->students->where('room_id', $id);
        }
        $room = Room::find($id);
        return view('show-room', compact('students', 'room'))->with('i', 1);
    }


    public function store(RoomRequest $request)
    {

        $room = Room::create([
            'name' => $request->name,
        ]);

        if ($room) {
            return redirect()->back()->with(['success' => 'تمت عملية الإضافة بنجاح ✔️']);
        } else {
            return back()->withInput();
        }
    }
}
