@extends('layouts.master')

@section('title')
    {{ $incidentNumber }}
@endsection

@push('styles')
    {{-- Global styles --}}
    <link href="/css/global.css" rel="stylesheet">
@endpush

@section('content')
    {{-- Main page content --}}
    <div class="container-fluid">
        <div class="page-wrapper">
            @if(isset($incidentData))
                @foreach($incidentData as $incident)
                    @if($incident->status == 'normal')
                        <?php  $incident->status = 'Resolved'; ?>
                    @else
                        <?php  $incident->status = 'Active'; ?>
                    @endif
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <h4 class="panel-title">Incident #{{ $incident->incident_number }}</h4>
                        <h2>{{ $incident->headline }}</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Incident created at:</strong> {{ \Carbon\Carbon::parse($incident->created_at)->format('l, M d, Y g:i A')}}</li>
                                <li class="list-group-item"><strong>Affected Component:</strong> {{ $incident->affected_component }}</li>
                                <li class="list-group-item"><strong>Severity:</strong> {{ $incident->severity }}</li>
                                <li class="list-group-item"><strong>Status:</strong> {{ $incident->status }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif
            @if(!$incidentData)
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Sorry!</strong> No matching incidents found.
                </div>
            @endif
        </div>
    </div>
@endsection
