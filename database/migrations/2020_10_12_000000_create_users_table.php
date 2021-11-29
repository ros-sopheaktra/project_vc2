<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class CreateUsersTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('firstName');
        $table->string('lastName');
        $table->string('email')->unique();
        $table->integer('role')->default(4); // 1 : admin 2 : HR 3: manager 4 : employee
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->date('startDate')->date('Y-m-d H:i:s');
        $table->string('profile')->default('profile.png');
        $table->integer('status')->default(1);
        $table->integer('position_id')->unsigned();
        $table->foreign('position_id')
        ->references('id')
        ->on('positions')
        ->onDelete('cascade');
        $table->integer('department_id')->unsigned();
        $table->foreign('department_id')
        ->references('id')
        ->on('departments')
        ->onDelete('cascade');
        $table->integer('manager_id')->unsigned()->nullable();
        $table->rememberToken();
        $table->timestamps();
});

        // Insert default user as admin
    DB::table('users')->insert(
        array(
        'id'=>1,
        'firstName'=>'Admin',
        'lastName'=>'User',
        'email'=>'admin@gmail.com',
        'role'=>1,
        'password'=>bcrypt('password'),
        'startDate'=>'2020-07-10',
        'profile'=>'profile.png',
        'status'=>2,
        'position_id'=>1,
        'department_id'=>1,
        'department_id'=>1,
        'manager_id'=> null,
        'remember_token' => Str::random(10)
        ),
    );
    DB::table('users')->insert(
        array(
        'id'=>2,
        'firstName'=>'HR',
        'lastName'=>'User',
        'email'=>'hr@gmail.com',
        'role'=>2,
        'password'=>bcrypt('password'),
        'startDate'=>'2020-07-10',
        'profile'=>'profile.png',
        'status'=>1,
        'position_id'=>1,
        'department_id'=>1,
        'department_id'=>1,
        'manager_id'=> 1,
        'remember_token' => Str::random(10)
        ),
    );
    DB::table('users')->insert(
        array(
        'id'=>3,
        'firstName'=>'Manager',
        'lastName'=>'User',
        'email'=>'manager@gmail.com',
        'role'=>3,
        'password'=>bcrypt('password'),
        'startDate'=>'2020-07-10',
        'profile'=>'profile.png',
        'status'=>2,
        'position_id'=>1,
        'department_id'=>1,
        'department_id'=>1,
        'manager_id'=> 1,
        'remember_token' => Str::random(10)
        ),
        );
    DB::table('users')->insert(
        array(
        'id'=>4,
        'firstName'=>'Normal',
        'lastName'=>'User',
        'email'=>'normal@gmail.com',
        'role'=>4,
        'password'=>bcrypt('password'),
        'startDate'=>'2020-07-10',
        'profile'=>'profile.png',
        'status'=>1,
        'position_id'=>1,
        'department_id'=>1,
        'department_id'=>1,
        'manager_id'=> 1,
        'remember_token' => Str::random(10)
        ),
    );
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
    Schema::dropIfExists('users');
}
}