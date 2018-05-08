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
        {{-- Set placeholder indicators --}}
        @foreach($activeIncidents as $incident)
            @if($incident->affected_component == "Website")
                <?php $webIndicator = $incident->indicator; ?>
                @else
                <?php $webIndicator = $initialIndicator; ?>
            @endif
            @if($incident->affected_component == "Mobile")
                <?php $mobileIndicator = $incident->indicator; ?>
                @else
                <?php $mobileIndicator = $initialIndicator; ?>
            @endif
            @if($incident->affected_component == "API")
                <?php $apiIndicator = $incident->indicator; ?>
                @else
                <?php $apiIndicator = $initialIndicator; ?>
            @endif
            @if($incident->affected_component == "Messaging")
                <?php $messagingIndicator = $incident->indicator; ?>
                @else
                <?php $messagingIndicator = $initialIndicator; ?>
            @endif
        @endforeach 
        {{-- Placeholder indicators --}}
        <h1 class="page-header">{{ $title }}</h1>
        <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="/img/{{ $webIndicator }}.png" width="200" height="200" class="img-responsive" alt="Website Placeholder">
                <h4>Website</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="/img/{{ $mobileIndicator }}.png" width="200" height="200" class="img-responsive" alt="Mobile Placeholder">
                <h4>Mobile</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="/img/{{ $apiIndicator }}.png" width="200" height="200" class="img-responsive" alt="API Placeholder">
                <h4>API</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="/img/{{ $messagingIndicator }}.png" width="200" height="200" class="img-responsive" alt="Messaging Placeholder">
                <h4>Messaging</h4>
            </div>
        </div>
        {{-- A list of active incidents --}}
        <h2 class="sub-header">Active Incidents</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Incident #</th>
                        <th>Affected Component</th>
                        <th>Headline</th>
                        <th>Severity</th>
                        <th>Edit / Delete</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($activeIncidents) > 0)
                        @foreach($activeIncidents as $incident)
                        <tr>
                            <td><div class="placeholder"><img src="/img/{{ $incident->indicator }}.png" width="15" height="15" class="img-responsive" alt="Incident status icon"></div></td>
                            <td>{{ $incident->created_at }}</td>
                            <td>{{ $incident->incident_number }}</td>
                            <td>{{ $incident->affected_component }}</td>
                            <td>{{ $incident->headline }}</td>
                            <td>{{ $incident->severity }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="/books/{{ $incident->incident_number }}/edit" role="button"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a class="btn btn-danger btn-sm" href="/books/{{ $incident->incident_number }}/delete" role="button"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </td>
                            <td><a class="btn btn-primary btn-sm text-uppercase" href="/updates/show/{{ $incident->incident_number }}" role="button">View Updates</a></td>
                        </tr>
                        @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- Custom JavaScript --}}
    <script src="/js/dashboard.js"></script>
@endpush