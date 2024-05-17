@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} User Admin
@endsection

@section('content')
<x-bo.card title="Edit User Admin" :with_back="route('admins.index')">
    <form method="POST" action="{{ route('admins.update', $user->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
    
        @include('admin.form')
    
    </form>
</x-bo.card>
@endsection
