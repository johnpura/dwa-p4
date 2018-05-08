<?php

use Illuminate\Database\Seeder;
use App\Update;
use App\Incident;

class UpdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $updates = [
            [16534, 'outage', 'We are investigating an issue with Foobooks.com. We will provide more information when available.' ],
            [16534, 'outage', 'Our Engineering Team believes they have identified the potential root cause of the issue. We will provide another status update once more onformation becomes available.' ],
            [16400, 'disruption', 'We are investigating an issue with slow API response times' ],
            [16400, 'disruption', 'The primary server could not boot due to a corrupted volume. We are in the process of failing over to the secondary server. ETA for recovery is 5 minutes' ],
            [16400, 'normal', 'The secondary web server has been successfully promoted, and all API request are back to normal. Our Engineering Team will continue to monitor the situation.' ],
        ];

        $count = count($updates);

        foreach ($updates as $key => $updateData) {

            $number = explode(' ', $updateData[0]);
            $incidentNumber = array_pop($number);

            $incident_id = Incident::where('incident_number', '=', $incidentNumber)->pluck('id')->first();

            $update = new Update();
    
            $update->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $update->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $update->incident_id = $incident_id;
            $update->incident_number = $updateData[0];
            $update->status_icon = $updateData[1];
            $update->description = $updateData[2];
            //$update->occured_at = $updateData[2];
    
            $update->save();
            $count--;
        }

    }
}
