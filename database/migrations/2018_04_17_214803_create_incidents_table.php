<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('incident_id');             // The incident id for the issue
            $table->string('affected_component');       // The configuration item that is affected
            $table->string('headline');                 // A brief high-level description of the issue
            $table->string('severity');                 // The severity of this incident (i.e. minor, major or critical)
            $table->string('indicator');                // An indicator for the incident (i.e. Normal operations is green, Service disruption is orange, Service outage is red)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
