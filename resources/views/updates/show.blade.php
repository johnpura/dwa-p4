@extends('layouts.master')

@section('title')
    Incident Updates
@endsection

@push('styles')
    {{-- Global styles --}}
    <link href="/css/global.css" rel="stylesheet">
@endpush

@section('content')
    {{-- Main page content --}}
    <div class="container-fluid">
        <div class="table-wrapper">
            @if(isset($updates))
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2></h2>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($updates as $update)
                                    <tr>
                                        <td><img src="/img/{{ $update->status_icon }}.png" width="15" height="15" class="img-circle" alt="Incident status icon"></div></td>
                                        <td>{{ \Carbon\Carbon::parse($update->created_at)->format('M d, Y')}}</td>
                                        <td>{{ $update->description }}</td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
