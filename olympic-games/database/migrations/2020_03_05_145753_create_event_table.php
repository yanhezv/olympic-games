<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->dateTime('date');
            $table->string('duration', 45);
            $table->mediumInteger('number_of_participants');
            $table->mediumInteger('number_of_commissioners');
            $table->bigInteger('sport_complex_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event');
    }
}
