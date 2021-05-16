<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->dateTime('starts');
            $table->dateTime('ends');
            $table->string('image');
            $table->string('description');
            $table->string('organiserName');
            $table->string('organiserDescription');
            $table->foreignId('eventCategoryId')->constrained('event_categories');
            $table->foreignId('eventTopicId')->constrained('event_topics');
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
        Schema::dropIfExists('events');
    }
}
