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
            $table->string('headline');                 // A brief high-level description of the issue
            $table->string('affected_component');       // The configuration item that is affected
            $table->string('service_area');             // The service area this incident belongs to (i.e. Application, Business, Infrastructure)
            $table->string('priority');                 // The priority of the incident (i.e. priority 1 or priority 2)
            $table->string('severity');                 // The severity of this incident (i.e low, medium, high)
            $table->string('indicator');                // An status indicator for the incident (i.e. Normal operations, Service disruption, Service outage)
            $table->dateTime('began_at');               // Time when this incident started
            $table->dateTime('ended_at');               // Time when this incident ended
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
