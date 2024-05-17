@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? __('Detail') . " " . __('Product') }}
@endsection

@section('content')
<x-bo.card title="Detail Produk" :with_back="route('products.index')">
    <div class="form-group mb-2 mb20">
        <strong>Gambar:</strong><br>
        <img style="width: 200px; border-radius: 12px" src="{{ asset('storage/'.$product->image) }}" alt="">
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Category :</strong>
        {{ $product->category->name }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>nama Produk:</strong>
        {{ $product->name }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Describtion:</strong>
        {{ $product->describtion }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>harga:</strong>
        Rp. {{ number_format($product->price) }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>harga Reseller:</strong>
        Rp. {{ number_format($product->reseller_price) }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Komisi Reseller:</strong>
       Rp.  {{ number_format($product->reseller_comission) }}
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Stock:</strong>
        {{ $product->stock }} Pcs
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Status:</strong>
        {{ $product->status }}
    </div>
</x-bo.card>
@endsection
