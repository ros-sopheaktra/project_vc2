<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Department;
use App\Position;
use Laravel\Ui\Presets\React;
class employeeViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $department = Department::all();
        $position = Position::all();
        return view('showEmployee.employeeView',['users' => $users,] ,compact('department','position'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    function editEmployee(){
       
        return view('showEmployee.employeeView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $user =  new User;
         $user->firstName = $request->get('first');
         $user->lastName = $request->get('last');
         $user->startDate = $request->get('date');
         $user->email = $request->get('email');
         $user->role = $request->get('role');
         $user->password = bcrypt($request->get('password'));
         $user->department_id = $request->get('depart');
         $user->position_id = $request->get('position');
         if($user->manager_id = $request->get('manager') != null){
            $user->manager_id = $request->get('manager');
         }else{
             $user->manager_id = NULL;
         }
         $user->save();
         return redirect('employee');
    }
    // public function addEmployee(Request $request){
       
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
       
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
        $user = User::find($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->department_id = $request->department;
        $user->position_id = $request->position;
        $user->startDate = $request->startDate;
        $user->manager_id = $request->manager;
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('img/', $filename);
            $user->profile = $filename;
        }
        if ($request->hasfile('editProfile')){
            $file = $request->file('editProfile');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('img/', $filename);
            $user->profile = $filename;
        }
        $user->save();
        return back();
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @4return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
    
    public function deleteProfile($id)
    {
        $user = User::find($id);
        $user->profile = "profile.png";
        $user->save();
        return back();
    }
    public function employeeActivate($id){
        $user=  User::find($id);
        $user->status = 2;
        $user->save();
        return back();
    }

    public function employeeDeactivate($id){
        $user=  User::find($id);
        $user->status = 1;
        $user->save();
        return back();
    }
}

