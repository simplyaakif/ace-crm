<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('c_title');
            $table->mediumText('c_description')->nullable();
            $table->mediumText('c_duration')->nullable();
            $table->float('c_fee');
            $table->timestamps();
        });
        DB::table('courses')->insert(['c_title' => 'Spoken English', 'c_description' => '', 'c_fee'
                                           => '22500']);
        DB::table('courses')->insert(['c_title' => 'Graphics Designing', 'c_description' => '',
                                'c_fee'=> '12500']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
