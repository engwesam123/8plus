<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerWordTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_word_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manager_word_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('job')->nullable();
            $table->string('locale')->index();
            $table->unique(['manager_word_id', 'locale']);
            $table->foreign('manager_word_id')->references('id')->on('manager_words')->onDelete('cascade');
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
        Schema::dropIfExists('manager_word_translations');
    }
}
