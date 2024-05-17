@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Category
@endsection

@section('content')
<x-bo.card title="Buat Category" :with_back="route('categories.index')">
    <form method="POST" action="{{ route('categories.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
        @include('category.form')
    </form>
</x-bo.card>
@endsection
