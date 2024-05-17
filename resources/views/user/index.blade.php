@extends('layouts.app')

@section('template_title')
    Users
@endsection

@section('content')
<x-bo.card title="Daftar Reseller" :with_route="route('users.create')">
    <livewire:customer-table />
</x-bo.card>
@endsection
