<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniqueSportComplexTable extends Migration
{
    public function up()
    {
        Schema::create('unique_sport_complex', function (Blueprint $table) {
            $table->id();
            $table->string('area_name', 45);
            $table->string('location', 45);
            $table->string('sport', 45);
            $table->bigInteger('sport_complex_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unique_sport_complex');
    }
}
