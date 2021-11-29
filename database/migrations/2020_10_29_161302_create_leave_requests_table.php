<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->date('startDate')->date('Y-m-d H:i:s');
            $table->date('endDate')->date('Y-m-d H:i:s');
            $table->string('duration');
            $table->string('comment')->default('OFF');
            $table->string('types');
            $table->integer('status')->default(1);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('leave_requests')->insert(
            array(
                'id'=>1,
                'startDate'=>'2020-07-10',
                'endDate'=>'2020-07-11',
                'duration'=> '1 day',
                'comment' => 'this is the comment',
                'types'=>'training',
                'status'=> 1, // 1 : Requested 2: Cancelled 3 : Accepted 
                'user_id'=>1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}
