<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('firstName');
            $table->string('MiddleName')->nullable();
            $table->string('endName')->nullable();
            $table->string('email')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('contact');
    }
}
