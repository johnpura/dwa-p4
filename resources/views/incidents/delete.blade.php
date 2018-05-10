@extends('layouts.master')

@section('title')
    {{ $incidentData->incident_number }}
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
                <div class="panel panel-danger">
                    <div class="panel-heading">
                    <h4 class="panel-title">Incident #{{ $incidentData->incident_number }}</h4>
                    <h2>{{ $incidentData->headline }}</h2>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Incident created at:</strong> {{ \Carbon\Carbon::parse($incidentData->created_at)->format('l, M d, Y g:i A')}}</li>
                            <li class="list-group-item"><strong>Affected Component:</strong> {{ $incidentData->affected_component }}</li>
                            <li class="list-group-item"><strong>Severity:</strong> {{ $incidentData->severity }}</li>
                            <li class="list-group-item"><strong>Status:</strong> {{ $incidentData->indicator }}</li>
                        </ul>
                    </div> 
                </div>
            @endif
            <form action="/incidents/{{ $incidentData->id }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <button class="btn btn-danger text-uppercase" type="submit">Delete Incident</button>
            </form>
        </div>
    </div>
@endsection
