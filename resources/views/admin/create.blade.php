@extends('layouts.app')

@section('template_title')
    {{ __('Buat') }} User Admin
@endsection

@section('content')
<x-bo.card title="Buat User A" dmin:with_back="route('users.index')">
    <form method="POST" action="{{ route('admins.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
    
        @include('admin.form')
    
    </form>
</x-bo.card>
@endsection
