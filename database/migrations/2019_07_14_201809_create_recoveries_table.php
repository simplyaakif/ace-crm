<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateRecoveriesTable extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('recoveries', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('registered_batch_id');
                $table->foreign('registered_batch_id')->references('id')->on('batch_admission')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('instAmount');
                $table->date('dueDate');
                $table->boolean('paid_status')->default(0);
                $table->string('slip_number')->nullable();
                $table->date('paidOn')->nullable();
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
            Schema::dropIfExists('recoveries');
        }
    }
