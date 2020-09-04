<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateBatchAdmissionTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('batch_admission', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('batch_id');
                $table->unsignedBigInteger('admission_id');
                $table->date('session_start_date')->nullable();
                $table->date('session_end_date')->nullable();
                $table->boolean('completion_status')->default(0);
                $table->foreign('batch_id')->references('id')->on('batches');
                $table->foreign('admission_id')->references('id')->on('admissions')->onDelete('cascade');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('batch_admission');
        }
    }
