<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('a_name');
            $table->text('a_dp')->nullable();
            $table->string('a_reg_id');
            $table->string('a_father_name')->nullable();
            $table->string('a_gender')->nullable();
            $table->string('a_nationality')->nullable();
            $table->string('a_place_of_birth')->nullable();
            $table->string('a_first_language')->nullable();
            $table->date('a_dob')->nullable();
            $table->string('a_cnic')->nullable();
            $table->string('a_mobile');
            $table->string('a_email')->nullable();
            $table->string('a_phone')->nullable();
            $table->text('a_address')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
