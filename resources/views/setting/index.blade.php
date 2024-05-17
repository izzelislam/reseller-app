@extends('layouts.app')

@section('template_title')
    Settings
@endsection

@section('content')
<x-bo.card title="Settings" >
    <form method="POST" action="{{ route('settings.store') }}"  role="form" enctype="multipart/form-data">
        @csrf

        @include('setting.form')

    </form>
</x-bo.card>
@endsection
