<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisibleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visible_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visible_id')->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['visible_id', 'locale']);
            $table->foreign('visible_id')->references('id')->on('visibles')->onDelete('cascade');
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
        Schema::dropIfExists('visible_translations');
    }
}
