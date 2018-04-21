<?php

use Illuminate\Database\Seeder;
use App\Update;

class UpdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $updates = [
            [],
            [],
        ];

        $count = count($updates);

        foreach ($updates as $key => $updateData) {
            $update = new Update();
    
            $update->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $update->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $update->incident_id = $updateData[0];
            $update->status = $updateData[1];
            $update->occured_at = $updateData[2];
            $update->description = $updateData[3];
    
            $update->save();
            $count--;
        }

    }
}
