<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectIncidentsAndUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('updates', function (Blueprint $table) {

            $table->integer('incident_id')->unsigned();

            $table->foreign('incident_id')->references('id')->on('incidents');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('updates', function (Blueprint $table) {

            $table->dropForeign('updates_incident_id_foreign');

            $table->dropColumn('incident_id');

        });
    }
}
