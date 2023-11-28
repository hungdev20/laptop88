<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('menu_title', 100);
            $table->string('slug', 100);
            $table->integer('order');
            $table->enum('status', ['active', 'passive']);
            $table->unsignedBigInteger('productcat_id');
            $table->foreign('productcat_id')->references('id')->on('product_cats')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('postcat_id');
            $table->foreign('postcat_id')->references('id')->on('post_cats')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('menu');
    }
}
