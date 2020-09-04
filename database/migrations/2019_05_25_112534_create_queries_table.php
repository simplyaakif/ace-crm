<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('q_name');
            $table->string('q_contact');
            $table->string('q_email')->nullable();
            $table->boolean('q_is_converted')->default('0');
//            $table->unsignedBigInteger('admission_id');
            $table->text('q_admitted_by')->nullable();
            $table->string('q_address')->nullable();
            $table->string('q_preferred_timings')->nullable();
            $table->string('q_session_type')->nullable();
            $table->string('q_interaction_type')->nullable();
            $table->string('q_dealt_by')->nullable();
            $table->timestamps();

//            $table->foreign('admission_id')->references('id')->on('admissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
