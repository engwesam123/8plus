<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaderShipTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leader_ship_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leader_ship_id')->unsigned();
            $table->string('name');
            $table->string('job')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['leader_ship_id', 'locale']);
            $table->foreign('leader_ship_id')->references('id')->on('leader_ships')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leader_ship_translations');
    }
}
