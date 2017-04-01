<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->text('specs')->nullable();
            $table->timestamps();
        });

        Schema::create('section_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->text('properties');
            $table->string('locale')->index();

            $table->unique(['section_id', 'locale']);
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('section_translations');
        Schema::drop('sections');
    }
}
