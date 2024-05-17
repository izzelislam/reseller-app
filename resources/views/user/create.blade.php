@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content')
<x-bo.card title="Buat User Reseller" :with_back="route('admins.index')">
    <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
    
        @include('user.form')
    
    </form>
</x-bo.card>
@endsection
