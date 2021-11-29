<?php

namespace App\Http\Controllers;
use App\LeaveRequest;
use App\User;
use Illuminate\Http\Request;
use Auth;
use \App\Mail\AcceptMail;
use \App\Mail\rejectRequested;
class leaveRequesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = LeaveRequest::all();
        $user = User::all(); // select all users
        $log = Auth::user()->id; // get the user id of login 
        $auth = Auth::user()->role; //get the role of user login
            return view('showLeave.leaveRequest' ,compact('leave','auth','log'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        //
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
    public function accepted($id)
    {
       $leaveRequest = LeaveRequest::find($id);
       $email = $leaveRequest->user->email;
       $firstName = $leaveRequest->user->firstName;
       $lastName = $leaveRequest->user->lastName;
       $startDate = $leaveRequest->startDate;
       $endDate = $leaveRequest->endDate;
       $type = $leaveRequest->types;
       $comment = $leaveRequest->comment;
       $leaveRequest->status = 4;
       $accepts = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'type' => $type,
        'comment' => $comment
    ];
       $leaveRequest->save();
       \Mail::to($email)->send(new AcceptMail($accepts));
       return back();
    }

    public function rejected($id)
    {
       $leaveRequest = LeaveRequest::find($id);
       $email = $leaveRequest->user->email;
       $firstName = $leaveRequest->user->firstName;
       $lastName = $leaveRequest->user->lastName;
       $leaveRequest->status = 3;
       $leaveRequest->save();
       $verify =[
           'startDate' => $leaveRequest->startDate,
           'endDate' => $leaveRequest->endDate,
           'type' => $leaveRequest->types,
           'comment' => $leaveRequest->comment,
           'firstName' => $firstName,
           'lastName' => $lastName,

       ];
       \Mail::to($email)->send(new rejectRequested($verify));
       return back();
    }

}
