@extends('layouts.app')

@section('template_title')
    Categories
@endsection

@section('title')
    Category
@endsection

@section('page-title')
    Category
@endsection

@section('content')
<x-bo.card title="Daftar User Admin" :with_route="route('categories.create')">
    <livewire:category-table />
</x-bo.card >
    {{-- <div class="container-fluid">
    </div> --}}
@endsection
