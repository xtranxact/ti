<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compamy extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->integer('user_id');
            $table->integer('phone_number');
            $table->integer('staff_strength_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }
   
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
