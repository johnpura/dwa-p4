<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('incident_id');             // The incident id that the update belongs to
            $table->string('status');                   // The current status of the incident (i.e. investigating, identified, monitoring, resolved, postmortem)
            $table->dateTime('occured_at');             // Date & time when the update occured
            $table->text('description');                // A description for the update     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updates');
    }
}
