<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use DB;

class SalaryController extends Controller
{
    public function paid(Request $request,$id){

        //dd($request->all());

       $validateData = $request->validate([
           
           'salary_month'=>'required',


       ]);

       $check= Salary::where('employee_id',$id)->where('salary_month',$request->salary_month)->first();

       if ($check) {
          return response()->json('Salary Already Paid');
       }else{


       $salary = new Salary();
       $salary->employee_id = $id;
       $salary->amount = $request->salary;
       $salary->salary_month=$request->salary_month;
       $salary->salary_year=date('Y');
       $salary->salary_date=date('d/m/Y');
       $salary->save();

       }

       

    }

    public function allSalary(Request $request){
     $salary= Salary::select('salary_month')->groupBy('salary_month')->get();

     return response()->json($salary);

    }

    public function viewSalary(Request $request,$id){

        $view = DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('employees.name','salaries.*')
                ->where('salaries.salary_month',$id)
                ->get();

                return response()->json($view);

    }

    //edit salary
    public function editSalary(Request $request,$id){
           $view = DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('employees.name','employees.email','salaries.*')
                ->where('salaries.id',$id)
                ->first();

                return response()->json($view);
    }

    //update salary

    public function updateSalary(Request $request,$id){

        $data = array();
        $data['employee_id']=$request->employee_id;
        $data['amount']=$request->amount;
        $data['salary_month']=$request->salary_month;
        DB::table('salaries')->where('id',$id)->update($data);
    }
}
