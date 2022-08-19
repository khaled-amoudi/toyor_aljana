<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Student;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function show($id){

        $student = Student::find($id);
        $amounts = Finance::where('student_id', $id)->get();


        $The_amount_paid = $amounts->sum('amount');
        $remaining_amount = 400 - $The_amount_paid;
        // foreach($amounts as $amount){
        //     $oldamount = 0;
        //     $newamount = $oldamount + $amount;
        // }

        return view('show-finance', compact('amounts', 'student', 'The_amount_paid', 'remaining_amount'))->with('i', 1);
    }

    public function store(Request $request, $id){
        $amount = Finance::create([
            'amount' => $request->amount,
            'student_id' => $id,
        ]);

        if ($amount) {
            return redirect()->back()->with(['success' => 'تمت عملية الإضافة بنجاح ✔️']);
        } else {
            return back()->withInput();
        }
    }


    public function delete($id)
    {
        $amount = Finance::find($id);

        if (!$amount) {
            return redirect()->back();
        }

        $amount->delete();

        return redirect()->back()->with(['success' => 'تمت عملية الحذف بنجاح ✔️']);
        // return redirect()->route('home')->with(['success' => 'تمت عملية الحذف بنجاح ✔️']);
    }

}
