<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlympicHeadquarterTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_olympic_headquarter', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('location', 45);
            $table->mediumInteger('number_of_complexes');
            $table->decimal('budget', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_olympic_headquarter');
    }
}
