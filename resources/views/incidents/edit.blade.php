@extends('layouts.master')

@section('title')
    Edit Incident
@endsection

@push('styles')
    {{-- Global styles --}}
    <link href="/css/global.css" rel="stylesheet">
@endpush

@section('content')
    {{-- Main page content --}}
    <div class="container-fluid">
        <div class="page-wrapper">
            <form class="form-styles" id="createIncidentForm" action="/incidents/store" method="post">
                <h2 class="text-center">Edit an Incident</h2>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="incidentNumber" class="control-label">Incident Number:</label>
                <input type="text" class="form-control" id="incidentNumber" name="incidentNumber" value={{  }}>
                    @if($errors->get('incidentNumber'))
                        <ul class="list-unstyled">
                            @foreach($errors->get('incidentNumber') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    <label for="severity">Incident Severity:</label>
                    <select class="form-control" id="severity" name="severity">
                        <option value="">Select...</option>
                        <option value="Minor">Minor</option>
                        <option value="Major">Major</option>
                        <option value="Critical">Critical</option>
                    </select>
                    @if($errors->get('severity'))
                        <ul class="list-unstyled">
                            @foreach($errors->get('severity') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    <label for="indicator">Status Indicator:</label>
                    <select class="form-control" id="indicator" name="indicator">
                        <option value="">Select...</option>
                        <option value="outage">Service Outage</option>
                        <option value="disruption">Service Disruption</option>
                        <option value="normal">Normal Operations</option>
                    </select>
                    @if($errors->get('indicator'))
                        <ul class="list-unstyled">
                            @foreach($errors->get('indicator') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    <label for="affectedComponent">Affected Component:</label>
                    <select class="form-control" id="affectedComponent" name="affectedComponent">
                        <option value="">Select...</option>
                        <option value="Website">Website</option>
                        <option value="Mobile">Mobile</option>
                        <option value="API">API</option>
                        <option value="Messaging">Messaging</option>
                    </select>
                    @if($errors->get('affectedComponent'))
                        <ul class="list-unstyled">
                            @foreach($errors->get('affectedComponent') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    <label for="headline" class="control-label">A brief description of the Incident:</label>
                    <textarea class="form-control" id="headline" name="headline"></textarea>
                </div>
                @if($errors->get('headline'))
                    <ul class="list-unstyled">
                        @foreach($errors->get('headline') as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </ul>
                @endif
                <button type="submit" class="btn btn-primary text-uppercase">Save</button>
            </form>
        </div>
    </div>
@endsection
