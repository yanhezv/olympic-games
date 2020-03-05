<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportComplexTable extends Migration
{
    public function up()
    {
        Schema::create('sport_complex', function (Blueprint $table) {
            $table->id();
            $table->string('location', 45);
            $table->string('head_of_organization', 45);
            $table->decimal('total_area', 8, 2);
            $table->char('complex_type', 1);
            $table->bigInteger('olympic_headquarter_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sport_complex');
    }
}
