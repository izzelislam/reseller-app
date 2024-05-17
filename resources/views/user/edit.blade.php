@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} User
@endsection

@section('content')
<x-bo.card title="Edit User Reseller" :with_back="route('users.index')">
    <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
    
        @include('user.form')
    
    </form>
</x-bo.card>
@endsection
