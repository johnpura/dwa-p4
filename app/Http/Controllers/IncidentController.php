<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Update;

class IncidentController extends Controller
{
    /**
    * Method: GET
    * Route: /
    */
    public function index() 
    {
        $activeIncidents = Incident::where('indicator', '<>', 'normal')
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('incidents.index')->with([
            'title' => config('app.name'),
            'initialIndicator' => 'normal',
            'activeIncidents' => $activeIncidents
        ]);
    }

    /**
    * Method: GET
    * Route: /search
    */
    public function search(Request $request) 
    {
        // Validate form data
        $this->validate($request, [
            'incidentNumber' => 'required|numeric'
        ]);

        // Look up incident
        $incidentNumber = $request->input('incidentNumber', null);
        $incidentData = Incident::where('incident_number', $incidentNumber)->get();
        
        if(isset($incidentData)) {
            return view('incidents.search')->with([
                'incidentNumber' => $incidentNumber,
                'incidentData' => $incidentData
            ]);
        } 

        elseif(!$incidentData) {
            return redirect('/')->with([
                'alert' => 'Incident #' . $id . ' was not found.'
            ]);
        }
    }

    /**
    * Method: GET
    * Route: /create
    */
    public function create()
    {
        // View for the create incident form
        return view('incidents.create');
    }

    /**
    * Method: POST
    * Route: /store
    */
    public function store(Request $request) 
    {
        // Validate form data
        $this->validate($request, [
            'incidentNumber' => 'required | numeric',
            'severity' => 'required',
            'indicator' => 'required',
            'affectedComponent' => 'required',
            'headline' => 'required'
        ]);

        // Add new record
        $incident = new Incident();
        $incident->incident_number = $request->incidentNumber;
        $incident->severity = $request->severity;
        $incident->indicator = $request->indicator;
        $incident->affected_component = $request->affectedComponent;
        $incident->headline = $request->headline;
        $incident->save();

        return redirect('/')->with([
            'success-alert' => 'Incident #' . $incident->incident_number . ' has been created successfully.'
        ]);
    }

    /**
    * Method: GET
    * Route: /{id}/edit
    */
    public function edit($id) 
    {
        $incident = Incident::find($id);

        return view('incidents.edit')->with(['incident' => $incident]);
    }

    /**
    * Method: PUT
    * Route: /incidents/{id}
    */
    public function update(Request $request, $id) 
    {
        // Validate form data
        $this->validate($request, [
            'incidentNumber' => 'required | numeric',
            'severity' => 'required',
            'indicator' => 'required',
            'affectedComponent' => 'required',
            'headline' => 'required'
        ]);

        $incident = Incident::find($id);

        // Update the data
        $incident->incident_number = $request->incidentNumber;
        $incident->severity = $request->severity;
        $incident->indicator = $request->indicator;
        $incident->affected_component = $request->affectedComponent;
        $incident->headline = $request->headline;
        $incident->save();

        return redirect('/')->with([
            'success-alert' => 'Incident #' . $incident->incident_number . ' has been updated successfully.',
            'incident' => $incident,
        ]);
    }

    /*
    * Method: GET 
    * Route: /incidents/{id}/delete
    */
    public function delete($id)
    {
        $incident = Incident::find($id);

        if (!$incident) {
            return redirect('/')->with('alert', 'Incident not found');
        }

        return view('incidents.delete')->with([
            'incidentData' => $incident
        ]);
    }

    /*
    * Method: DELETE 
    * Route: /books/{id}/delete
    */
    public function destroy($id)
    {
        $incident = Incident::find($id);
        //$incident->updates()->detach();
        $incident->delete();
        return redirect('/')->with([
            'success-alert' => 'Incident #' . $incident->incident_number . ' has been successfully removed.'
        ]);
    }
}
