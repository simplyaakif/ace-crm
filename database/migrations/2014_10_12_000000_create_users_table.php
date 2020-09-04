<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateUsersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
            DB::table('users')->insert(['name' => 'Aakif Raza', 'email' => 'simply.aakif@gmail.com', 'password'
            => bcrypt('A123456a*'),]);
            DB::table('users')->insert(['name' => 'Ace Institute', 'email' => 'americancenterofenglish@gmail.com', 'password'=> bcrypt('worldwar3'),]);
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('users');
        }
    }
