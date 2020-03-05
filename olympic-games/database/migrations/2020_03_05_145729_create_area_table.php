<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaTable extends Migration
{
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->id();
            $table->string('area_name', 45);
            $table->string('location', 45);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('area');
    }
}
