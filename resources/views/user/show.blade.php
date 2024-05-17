@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('Detail') . " " . __('User') }}
@endsection

@section('content')
<x-bo.card title="Detail User Reseller" :with_back="route('users.index')">
    <div class="form-group mb-2 mb20">
        <strong>Name:</strong>
        {{ $user->name }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Email:</strong>
        {{ $user->email }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Role:</strong>
        {{ $user->role }}
    </div>
</x-bo.card>
@endsection
