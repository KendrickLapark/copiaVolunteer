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
        Schema::create('activity_entities', function (Blueprint $table) {
            $table->increments('act_entity_id');
            $table->integer('activity_id')->unsigned();
            $table->integer('entity_id')->unsigned();
            $table->foreign('activity_id')->references('activity_id')->on('activities')
                ->onDelete('cascade');
            $table->foreign('entity_id')->references('entity_id')->on('entities')
                 ->onDelete('cascade');
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
        Schema::dropIfExists('activity_entities');
    }
};
