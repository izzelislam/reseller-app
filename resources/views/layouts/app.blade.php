@extends('layouts.master')

@section('body')
<body data-sidebar="light">
@endsection

@section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
