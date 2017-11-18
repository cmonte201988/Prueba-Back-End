<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('id', 50);            
            $table->char('isOnline', 1)->default(1);
            $table->char('salary', 11)->nullable();
            $table->char('age', 3)->nullable();
            $table->string('position')->nullable();
            $table->string('name');
            $table->char('gender', 15)->nullable();
            $table->string('email');
            $table->char('phone', 25)->nullable();
            $table->string('address')->nullable();
            $table->text('skills', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
