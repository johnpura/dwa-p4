@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('styles')
    {{-- Global styles --}}
    <link href="/css/global.css" rel="stylesheet">
@endpush

@section('content')
    {{-- Main page content --}}
    <div class="container-fluid">
        <div class="page-wrapper">
            
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Custom JavaScript --}}
    <script src="/js/custom.js"></script>
@endpush