<?php

use Illuminate\Database\Seeder;
use App\Incident;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incidents = [
            [16534, 'Website', 'Foobooks.com is experiencing an outage',  'Critical', 'outage'],
            [16400, 'API', 'Slow API Response Times', 'Minor', 'normal'], 
        ];

        $count = count($incidents);

        foreach ($incidents as $key => $incidentData) {
            $incident = new Incident();
    
            $incident->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $incident->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $incident->incident_number = $incidentData[0];
            $incident->affected_component = $incidentData[1];
            $incident->headline = $incidentData[2];
            $incident->severity = $incidentData[3];
            $incident->indicator = $incidentData[4];
    
            $incident->save();

            $count--;
        }
    }
}
