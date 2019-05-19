<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefrenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refrence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->unique();
            $table->string('ref_name');
            $table->string('relationship');
            $table->string('ref_phone');
            $table->string('company');
            $table->string('ref_email');
            $table->string('ref_address');
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
        Schema::dropIfExists('refrence');
    }
}
