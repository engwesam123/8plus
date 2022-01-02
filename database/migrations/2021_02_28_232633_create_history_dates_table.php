<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id')->unsigned()->nullable();
            $table->year('history_date')->nullable();
            $table->text('content_ar')->nullable();
            $table->text('content_en')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('history_id')->references('id')->on('histories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_dates');
    }
}
