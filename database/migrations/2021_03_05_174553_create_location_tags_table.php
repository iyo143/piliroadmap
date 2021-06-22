<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_tags', function (Blueprint $table) {
            $table->id();
            $table->string('brgy');
            $table->string('municipality');
            $table->bigInteger('farmers');
            $table->bigInteger('retailers');
            $table->bigInteger('processors');
            $table->bigInteger('trees');
            $table->string('brgy_value');
            $table->string('municipality_value');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('pili_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_tags');
    }
}
