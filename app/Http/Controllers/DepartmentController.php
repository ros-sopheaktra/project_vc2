<?php

namespace App\Http\Controllers;
use\App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('pages.department.showDepartment', compact('departments'));
    } 

    public function addDepartment(Request $request){
        $departments = new Department;
        $departments->department = $request->dname;
        $departments->save();
        return redirect('/showDepartment');
    }

    public function edit($id){
        $department = Department::find($id);
        return view('pages.department.showDepartment',compact('department'));
    }

    public function update(Request $request, $id){
        $department = Department::find($id);
        $department->department = $request->editdname;
        $department->save();
        return redirect('/showDepartment');
    }
    
    public function destroy($id)
    {
       $item = Department::find($id);
       $item ->delete();
       return redirect('/showDepartment');
    }

    public function showDepartment(){
        $departments = Department::all();
        return view('showEmployee.employeeView',compact('departments'));
    }
}
