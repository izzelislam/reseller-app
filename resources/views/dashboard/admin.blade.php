<div class="alert alert-success" role="alert">
    Data yg ditampilkan berdasarkan tanggal dan tahun yang sedang berjalan
</div>

<form >
    <div class="row mb-3">
        @csrf
        <div class="col-5">
            <select onchange="this.form.submit()" name="year" id="year" class="form-select">
                <option value="">Pilih Tahun</option>
                @for ($year = 2022; $year <= date('Y'); $year++)
                    <option value="{{ $year }}" {{ $year == request('year') ? 'selected' : '' }} >{{ $year }}</option>
                @endfor
            </select>
        </div>
        <div class="col-5">
            <select onchange="this.form.submit()" name="month" id="month" class="form-select">
                <option value="">Pilih Bulan</option>
                @foreach ($months as $index => $month)
                    <option value="{{ $index }}" {{ $index == request('month') ? 'selected' : '' }} >{{ $month }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2">
            <a href="/home" class="btn btn-primary"><i class="fas fa-redo me-2"></i>Reset Filter</a>
        </div>
    </div>
</form>

@include('dashboard.part.card-admin')

@include('dashboard.part.card-revenue')

{{-- @include('dashboard.part.sales-card') --}}

@include('dashboard.part.lates-transaction')
