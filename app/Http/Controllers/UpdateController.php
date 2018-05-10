<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Update;

class UpdateController extends Controller
{
    /*
     * Method: GET 
     * Route /updates/{id}
     */
    public function show($id)
    {
        $updates = Update::where('incident_id', $id)->orderBy('created_at', 'desc')->get();

        if (!$updates) {
            return redirect('/')->with(
                ['alert' => 'There are no update for this incident.']
            );
        }
        return view('updates.show')->with([
            'updates' => $updates
        ]);
    }
}
