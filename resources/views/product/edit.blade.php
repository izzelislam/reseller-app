@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Product
@endsection

@section('content')
<x-bo.card title="Edit Produk" :with_back="route('products.index')">
    <form method="POST" action="{{ route('products.update', $product->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
    
        @include('product.form')
    
    </form>
</x-bo.card>

@endsection
