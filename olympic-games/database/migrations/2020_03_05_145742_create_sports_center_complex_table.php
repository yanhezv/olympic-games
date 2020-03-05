<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsCenterComplexTable extends Migration
{
    public function up()
    {
        Schema::create('sports_center_complex', function (Blueprint $table) {
            $table->id();
            $table->string('sport', 45);
            $table->string('zone', 45);
            $table->bigInteger('sport_complex_id');
            $table->bigInteger('area_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sports_center_complex');
    }
}
