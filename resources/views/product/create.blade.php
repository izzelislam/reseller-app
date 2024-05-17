@extends('layouts.app')

@section('template_title')
    {{ __('Buat') }} Product
@endsection

@section('content')
<x-bo.card title="Buat Produk" :with_back="route('products.index')">
    <form method="POST" action="{{ route('products.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
        @include('product.form')
    </form>
</x-bo.card>
@endsection
