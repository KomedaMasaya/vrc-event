<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_datetimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('Start_Date', $precision = 0);
            $table->dateTime('End_Date', $precision = 0);
            $table->foreignId('event_id')->constrained('events');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_datetime');
    }
};
