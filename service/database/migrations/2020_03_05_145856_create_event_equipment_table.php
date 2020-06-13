<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventEquipmentTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_event_equipment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id');
            $table->bigInteger('equipment_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_event_equipment');
    }
}
