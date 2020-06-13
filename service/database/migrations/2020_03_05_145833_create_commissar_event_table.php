<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissarEventTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_commissar_event', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('commissar_id');
            $table->bigInteger('event_id');
            $table->char('commisar_task', 1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_commissar_event');
    }
}
