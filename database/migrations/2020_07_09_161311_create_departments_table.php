<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department');
            $table->timestamps();
        });

        // Insert default department 
        DB::table('departments')->insert(
            array(
                'id'=>1,
                'department'=> 'Traning and education team',
            )
        );
        DB::table('departments')->insert(
            array(
                'id'=>2,
                'department'=> 'External ralation team',
            )
        );
        DB::table('departments')->insert(
            array(
                'id'=>3,
                'department'=> 'Admin and finance team',
            )
        );
        DB::table('departments')->insert(
            array(
                'id'=>4,
                'department'=> 'Selection',
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
        Schema::dropIfExists('departments');
    }
}
