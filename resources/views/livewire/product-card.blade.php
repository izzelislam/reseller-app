<div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-top-border alert-dismissible fade show" role="alert">
            <i class="ri-error-warning-line me-3 align-middle fs-16 text-success "></i><span class="fw-medium">Berhasil</span>
            <div class="text-success mt-2"> {{ session('success') }}</div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @error('qty')
        <div class="alert alert-danger alert-top-border alert-dismissible fade show" role="alert">
            <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger "></i><span class="fw-medium">Kesalahan</span>
            <div class="text-danger mt-2"> {{ $message }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    <div class="card rounded">
        <div class="card-body row">
            <div class="col-12 col-md-3 col-xl-3">
                <label for="validationCustom01" class="form-label">Cari Produk</label>
                <input wire:model="key" wire:change="Search()" type="text" class="form-control" id="validationCustom01" placeholder="" required="">
                {{-- <div class="valid-feedback">
                    Looks good!
                </div> --}}
            </div>
            <div class="col-12 col-md-3 col-xl-3">
                <label for="validationCustom01" class="form-label">Urutkan Berdasarkan Kategori</label>
                <select wire:model="category" wire:change="Search()" class="form-select" aria-label="Default select example">
                    <option value="semua" selected>Semua</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{-- <div class="valid-feedback">
                    Looks good!
                </div> --}}
            </div>
        </div>
    </div>


    <div class="d-flex flex-wrap mt-3">
        
        @forelse ($products as $product)
            <div class="col-md-6 col-lg-3 col-xxl-2 px-2">
                <!-- Simple card -->
                <div class="card">
                    <div 
                        class="card-img-top rounded"
                        style="
                            background-image: url('{{ asset('storage/'. $product->image) }}');
                            width: 100%;
                            height: 200px;
                            background-size: cover;
                            fit: cover;
                        "
                    >
                    </div>
                    {{-- <img class="card-img-top" src="https://source.unsplash.com/random/900×700/?fruit" alt="Card image cap"> --}}
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">{{ Str::limit($product->name, 16, '...') }}</h4>
                            <span class="badge bg-primary mt-2">{{ Str::limit($product->category->name, 7, '...') }}</span>
                        </div>
                        <div>
                            <div class="badge bg-info">Harga : Rp. {{ number_format($product->price) }}</div>
                            <div class="badge bg-primary">Harga reseller : Rp. {{ number_format($product->reseller_price) }}</div>
                            <div class="badge text-dark">Komisi reseller : Rp. {{ number_format($product->reseller_comission) }}</div>
                        </div>
                        <p class="card-text mt-2 mb-3" style="text-align: left;">
                            {{ Str::limit($product->describtion, 50, '...') }}
                        </p>
                        <div class="d-grid">
                            {{-- <a href="#" class="btn btn-sm btn-primary btn-lg waves-effect waves-light">Jual</a> --}}
                            <button type="button" class="btn btn-primary waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $product->id }}">Jual</button>
                        </div>
                        {{ $product_id }}{{ $qty }}
                    </div>
                </div>

                <div class="modal fade" id="staticBackdrop{{ $product->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdrop{{ $product->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdrop{{ $product->id }}Label">Jual Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img class="w-50" src="{{ asset('storage/'. $product->image) }}" alt="">
                                </div>
                                <h4 class="card-title my-3">{{ Str::limit($product->name, 16, '...') }} <span class="badge bg-primary mt-2">{{ Str::limit($product->category->name, 7, '...') }}</span></h4> 
                                <p class="mb-2">{{ Str::limit($product->describtion, 50, '...') }}</p>
                                <h5>
                                    <div class="badge bg-info">Harga : Rp. {{ number_format($product->price) }}</div>
                                    <div class="badge bg-primary">Harga reseller : Rp. {{ number_format($product->reseller_price) }}</div>
                                    <div class="badge text-dark">Komisi reseller : Rp. {{ number_format($product->reseller_comission) }}</div>
                                </h5>
                                
                                <div style="border: 1px solid rgb(201, 200, 200); border-radius: 12px;" class="p-3">
                                    <div class="col-12">
                                        <label for="validationCustom01" class="form-label">Masukkan Jumlah Produk</label>
                                        <input wire:model="qty" type="number" min="0" class="form-control" id="validationCustom01" placeholder="" required="">
                                        {{-- <div class="valid-feedback">
                                            Looks good!
                                        </div> --}}
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button wire:click="DeleteProduct()" type="button" class="btn btn-light waves-effect"
                                    data-bs-dismiss="modal"><i class="fa fa-times me-2"></i> Batal</button>
                                
                                <button wire:click="OrderProduct('{{ $product->id }}')" data-bs-dismiss="modal" type="button"  class="btn btn-primary waves-effect waves-light" 
                                ><i class="fa fa-check me-2"></i> Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="m-auto mt-4">
                <h5><i>Tidak ada Produk...</i></h5>
            </div>
        @endforelse 
    </div>
</div>
