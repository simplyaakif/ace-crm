<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateBatchesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('batches', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('b_name')            ->nullable();
                $table->string('b_timings')         ->nullable();
                $table->date('b_startDate')       ->nullable();
                $table->date('b_endDate')         ->nullable();
                $table->unsignedBigInteger('course_id')         ->nullable();
                $table->string('b_strength')        ->nullable();
                $table->json('b_class_days')      ->nullable();
                $table->string('b_session_type')    ->nullable();
                $table->string('b_learning_type')   ->nullable();
                $table->string('b_description')     ->nullable();
                $table->string('instructor_id')     ->nullable();
                $table->foreign('course_id')->references('id')->on('courses');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('batches');
        }
    }
