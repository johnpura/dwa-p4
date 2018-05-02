@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('styles')
    {{-- Custom styles --}}
    <link href="/css/dashboard.css" rel="stylesheet">
@endpush

@section('content')
    <h1>{{ $title }}</h1>
    
    <p>
        Details about this book will go here...
    </p>
@endsection

@push('scripts')
    {{-- Custom JavaScript --}}
    <script src="/js/dashboard.js"></script>
@endpush