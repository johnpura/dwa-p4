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
        //
        $incidents = [
            [16534, 'Website', 'Foobooks.com is experiencing an outage',  'critical', 'outage'],
            [16533, 'Mobile', 'Mobile app performance issue',  'major', 'normal'],
            [16532, 'API', 'Slow API Response Times', 'minor', 'normal'],
            [16531, 'Email', 'Some users are unable to receive Foobooks emails', 'minor', 'normal'],
        ];

        $count = count($incidents);

        foreach ($incidents as $key => $incidentData) {
            $incident = new Incident();
    
            $incident->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $incident->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $incident->incident_id = $incidentData[0];
            $incident->affected_component = $incidentData[1];
            $incident->headline = $incidentData[2];
            $incident->severity = $incidentData[3];
            $incident->indicator = $incidentData[4];
    
            $incident->save();
            $count--;
        }
    }
}
