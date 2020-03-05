<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissarTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_commissar', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_commissar');
    }
}
