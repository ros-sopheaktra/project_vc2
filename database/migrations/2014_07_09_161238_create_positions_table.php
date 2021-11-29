<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position');
            $table->timestamps();
        });
        
        // Insert default position
        DB::table('positions')->insert(
            array(
                'id'=>1, // 1: admin 2 : HR 3: manager 4 : employee
                'position'=> 'IT Admin'
            )
        );
        DB::table('positions')->insert(
            array(
                'id'=>2, // 1: admin 2 : HR 3: manager 4 : employee
                'position'=> 'WEB Coordinator'
            )
        );
        DB::table('positions')->insert(
            array(
                'id'=>3, // 1: admin 2 : HR 3: manager 4 : employee
                'position'=> 'WEB Training'
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
        Schema::dropIfExists('positions');
    }
}
