<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 200);
            $table->string('username', 50);
            $table->string('email', 150);
            $table->string('password', 200);
            $table->string('confirm_password', 200);
            $table->string('phone_number', 20);
            $table->enum('gender', ['male', 'female']);
            $table->string('avartar', 250);
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
        Schema::dropIfExists('account');
    }
}
