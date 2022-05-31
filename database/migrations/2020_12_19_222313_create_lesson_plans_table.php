<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateLessonPlansTable extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('lesson_plans', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('date');
                $table->text('level');
                $table->text('batch_time');
                $table->text('duration');
                $table->text('lesson_code');
                $table->text('week_no');
                $table->text('module');
                $table->text('book');
                $table->text('page');
                $table->text('topic');
                $table->text('aids');
                $table->text('objectives');
                $table->text('reading');
                $table->text('writing');
                $table->text('listening');
                $table->text('speaking');
                $table->text('activity_presentation_discussion');
                $table->text('wrap_up');
                $table->text('home_task');
                $table->longText('additional_content');
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
            Schema::dropIfExists('lesson_plans');
        }
    }
