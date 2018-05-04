@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('styles')
    {{-- Custom styles --}}
    <link href="/css/dashboard.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
        <div class="page-wrapper">
            {{-- Status indicators --}}
            <h1 class="page-header">{{ $title }}</h1>
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/outage.png" width="200" height="200" class="img-responsive" alt="Website Placeholder">
                    <h4>Website</h4>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/normal.png" width="200" height="200" class="img-responsive" alt="Mobile Placeholder">
                    <h4>Mobile App</h4>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/normal.png" width="200" height="200" class="img-responsive" alt="API Placeholder">
                    <h4>API</h4>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/normal.png" width="200" height="200" class="img-responsive" alt="Messaging Placeholder">
                    <h4>Messaging</h4>
                </div>
            </div>
            {{-- A list of current/ongoing incidents --}}
            <h2 class="sub-header">Current Incidents</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Incident ID</th>
                        <th>Affected Component</th>
                        <th>Brief Description</th>
                        <th>Severity</th>
                        <th>Incident Details</th>
                        <th>Edit / Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="/img/outage.png" width="5" height="5" class="img-responsive" alt="Incident Status icon"></td>
                        <td>April 22, 2018</td>
                        <td>123456</td>
                        <td>Foobooks.com</td>
                        <td>Foobooks.com is experiencing an outage</td>
                        <td>Critical</td>
                        <td><button type="button" class="btn btn-primary btn-sm .text-uppercase">View Details</button></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editIncidentModal">
                                <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" id="deleteIncident">
                                <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Edit incident modal -->
    <div class="modal fade" id="editIncidentModal" tabindex="-1" role="dialog" aria-labelledby="editIncidentLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editModalTitle">Edit Incident</h4>
                </div>
                <div class="modal-body">
                    <form id="editIncidentForm" action="" method="post">
                        <div class="form-group">
                            <label for="incident-id" class="control-label">Incident ID:</label>
                            <input type="text" class="form-control" id="incident-id" readonly>
                        </div>
                        <div class="form-group">
                                <label for="severity">Edit Severity:</label>
                                <select class="form-control" id="severity">
                                    <option>Select...</option>
                                    <option value="Minor">Minor</option>
                                    <option value="Major">Major</option>
                                    <option value="Critical">Critical</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="indicator">Edit Indicator:</label>
                            <select class="form-control" id="indicator">
                                <option>Select...</option>
                                <option value="outage">Service Outage</option>
                                <option value="disruption">Service Disruption</option>
                                <option value="normal">Normal Operations</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="affected-component">Edit Affected Component:</label>
                            <select class="form-control" id="affected-component">
                                <option>Select...</option>
                                <option value="Website">Website</option>
                                <option value="Mobile">Mobile</option>
                                <option value="API">API</option>
                                <option value="Messaging">Messaging</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="headline" class="control-label">Edit Incident Headline:</label>
                            <textarea class="form-control" id="headline"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm incident edits modal -->
    <div class="modal fade" id="confirmEdit" tabindex="-1" role="dialog" aria-labelledby="confirmEditLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="confirmModalTitle">Confirm Your Changes</h4>
                </div>
                <div class="modal-body">
                    <form id="confirmEditsForm" action="/update" method="post">
                        <div class="form-group">
                            <label for="incident-id" class="control-label">Incident ID:</label>
                            <input type="text" class="form-control" id="incident-id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="severity">Edit Severity:</label>
                            <!-- Edited severity data goes here -->
                        </div>
                        <div class="form-group">
                            <label for="indicator">Edit Indicator:</label>
                            <!-- Edited indicator data goes here -->
                        </div>
                        <div class="form-group">
                            <label for="affected-component">Edit Affected Component:</label>
                            <!-- Edited affected component data goes here -->
                        </div>
                        <div class="form-group">
                            <label for="headline" class="control-label">Edit Incident Headline:</label>
                            <!-- Edited headline data goes here -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Custom JavaScript --}}
    <script src="/js/dashboard.js"></script>
@endpush