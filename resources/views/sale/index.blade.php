@php
    $months = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];
@endphp

@extends('layouts.app')

@section('template_title')
    Products
@endsection

@section('content')
    @if (auth()->user()->role == 'admin')
    <x-bo.card title="Data Penjualan">
        <livewire:sales-table/>
    </x-bo.card>
    @endif
    @if (auth()->user()->role == 'customer')
        <form>
            @csrf
            <div class="row">
                <div class="col p-3">
                    <select name="year" onchange="this.form.submit()" class="form-select" aria-label="Default select example">
                        <option value="" selected>Pilih tahun</option>
                        @for ($i = 2020; $i <= date('Y'); $i++)
                            <option @if(request('year') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col p-3">
                    <select name="month" onchange="this.form.submit()" class="form-select" aria-label="Default select example">
                        <option value="" selected>Pilih bulan</option>
                        @foreach ($months as $key => $value)
                            <option @if(request('month') == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col p-3 d-grid">
                    <a href="{{ route('sales.index') }}" class="btn btn-info"> <i class="fa fa-filter me-3"></i> Reset Filter</a>
                </div>
            </div>
        </form>

        <div class="alert alert-info alert-solid mb-3" role="alert">
            <div class="fs-4 fw-bold text-center">
                <div class="fs-5 fw-bold text-center">Jumlah Komisi
                    @if (request('month') != "")
                        Bulan  {{ $months[request('month')] }}
                    @else
                        Bulan {{ $months[date('m')] }}
                    @endif
                    @if (!request('year') != "")
                        Tahun {{ date('Y') }}
                    @else
                        Tahun {{ request('year') }}
                    @endif
                </div>
                <div >
                    Rp. {{ number_format($totalComision) }}
                </div>
            </div>
        </div>
        {{-- <div>
            <div class="card col-2">
                <div class="card-body p-3">
                    
                </div>
            </div>
        </div> --}}

        <x-bo.card title="Data Penjualan">
            <livewire:sales-table/>
        </x-bo.card>
    @endif
@endsection
