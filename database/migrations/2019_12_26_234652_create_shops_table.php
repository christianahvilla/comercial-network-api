<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('name');
            $table->text('image');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('web_page');
            $table->string('kind');
            $table->boolean('enabled')->default(1);
            $table->string('street');
            $table->string('zip_code');
            $table->string('neighborhood');
            $table->string('city');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->integer('products_limit');
            $table->integer('images_limit');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
