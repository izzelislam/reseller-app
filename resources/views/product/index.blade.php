@extends('layouts.app')

@section('template_title')
    Products
@endsection

@section('content')
    @if (auth()->user()->role == 'admin')
        @include('product.part.admin-index')
    @endif
    @if (auth()->user()->role == 'customer')
        @include('product.part.reseller-index')
    @endif
@endsection
