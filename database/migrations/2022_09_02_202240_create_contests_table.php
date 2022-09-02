<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('last_name', 50);
            $table->string('phone', 20);
            $table->integer('identification_number')->unique(); // numero de cedula
            $table->string('email')->unique();
            $table->boolean('habeas_data')->default(true);
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();


            $table->foreign('department_id')->references('id')->on('departments')->onDelete('no action');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contests');
    }
};
