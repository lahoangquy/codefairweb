<?php

use App\SpecificEvent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_on');
            $table->text('schedule');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        SpecificEvent::create([
            'name' => 'Happy Coding Event',
            'start_on' => '2021-11-24',
            'schedule' => [],
            'status' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specific_events');
    }
}
