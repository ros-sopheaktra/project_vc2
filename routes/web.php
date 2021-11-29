<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/addLeaves', 'HomeController@addLeavesRequest')->name('addLeaves');
Route::patch('/editLeaves/{id}', 'HomeController@udateLeave')->name('editLeaves');
Route::delete('/deleteLeaves/{id}', 'HomeController@destroy')->name('deleteLeaves');

Route::get('/showDepartment', 'DepartmentController@index')->name('showDepartment');
Route::post('/addDepartment', 'DepartmentController@addDepartment')->name('addDepartment');
Route::get('/editDepartment/{id}', 'DepartmentController@edit')->name('editDepartment');
Route::patch('/updateDepartment/{id}', 'DepartmentController@update')->name('updateDepartment');
Route::delete('/deleteDepartment/{id}', 'DepartmentController@destroy')->name('deleteDepartment');

//Route::delete('/deleteEmployee/{id}', 'EmployeeController@destroy')->name('deleteEmployee');

Route::get('/showPosition', 'PositionController@index')->name('showPosition');
Route::get('existPosition','PositionController@existPosition')->name('existPosition');
Route::post('addPosition', 'PositionController@addPosition')->name('addPosition');
Route::get('existPosition', 'PositionController@existPosition')->name('existPosition');
Route::patch('editPosition/{id}', 'PositionController@editPosition')->name('editPosition');
Route::patch('deletePosition/{id}', 'PositionController@deletePosition')->name('deletePosition');

Route::get('/showEmployee', 'EmployeeController@index')->name('showEmployee');
Route::get('/showLeave', 'LeaveController@index')->name('showLeave');
Route::get('/showYourLeave', 'YourLeaveController@index')->name('showYourLeave');
Route::get('editEmployee', 'employeeViewController@editEmployee')->name('editEmployee');
Route::resource('request','leaveRequesController');

Route::resource('employee','employeeViewController');
Route::get('/deleteProfile/{id}' , 'employeeViewController@deleteProfile')->name('deleteProfile');
Route::resource('deleteEmployee', 'employeeViewController');

Route::get('/accepted/{id}', 'leaveRequesController@accepted')->name('accepted');
Route::get('/rejected/{id}', 'leaveRequesController@rejected')->name('rejected');

Route::resource('deleteEmployee', 'employeeViewController');
Route::post('/addProfile/{id}','HomeController@addProfile')->name('addProfile');
Route::get('/deleteProfile/{id}','HomeController@deleteProfile')->name('deleteProfile');
Route::get('/deleteYourLeave/{id}', 'HomeController@destroy')->name('deleteYourLeave');

Route::get('/viewmail', 'HomeController@viewMail')->name('viewmail');
Route::get('activate/{id}','employeeViewController@employeeActivate')->name('activate');
Route::get('deactivate/{id}','employeeViewController@employeeDeactivate')->name('deactivate');