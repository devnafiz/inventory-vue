<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Expense::all();
        return response()->json($expense);
        
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([

             'amount'=>'required',
             'details'=>'required'
        ]);

        $expense = new Expense();

        $expense->amount = $request->amount;
        $expense->details = $request->details;
        $expense->expense_date = date('d/m/y');

        $expense->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $expense = Expense::where('id',$id)->first();

        return response()->json($expense);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validateData = $request->validate([

             'amount'=>'required',
             'details'=>'required'
        ]);

        $expense = Expense::findorfail($id);

        $expense->amount = $request->amount;
        $expense->details = $request->details;
        $expense->expense_date = date('d/m/y');

        $expense->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
