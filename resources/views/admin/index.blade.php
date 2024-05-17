@extends('layouts.app')

@section('template_title')
    User Admin
@endsection

@section('content')
<x-bo.card title="Daftar User Admin" :with_route="route('admins.create')">
    <livewire:admin-table />
</x-bo.card>
@endsection
