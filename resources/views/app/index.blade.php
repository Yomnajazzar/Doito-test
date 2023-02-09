@extends('layout.master')
@section('parentPageTitle', 'Home')
@section('title', 'Home')


@section('content')
<h1 class="text-center w-100 pt-1">Statistics</h1>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
@stop

