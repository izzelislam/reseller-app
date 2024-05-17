@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Category
@endsection

@section('content')
<x-bo.card title="Edit Category" :with_back="route('categories.index')">
    <form method="POST" action="{{ route('categories.update', $category->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
    
        @include('category.form')
    
    </form>
</x-bo.card>
@endsection
