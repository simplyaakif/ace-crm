q<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admission_id');
            $table->foreign('admission_id')->references('id')->on('admissions')->onDelete('cascade');
            $table->string('guard_name');
            $table->string('guard_relation')->nullable();
            $table->string('guard_cnic')->nullable();
            $table->string('guard_occupation_type')->nullable();
            $table->string('guard_occupation_designation')->nullable();
            $table->string('guard_mobile');
            $table->string('guard_email')->nullable();
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
        Schema::dropIfExists('guardian');
    }
}
