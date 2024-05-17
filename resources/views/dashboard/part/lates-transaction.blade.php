<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex pb-0">
                <h4 class="card-title mb-0 flex-grow-1">Transaksi Terakhir</h4>
            </div>
            <div class="card-body pt-2">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Produk</th>
                                <th>Reseller</th>
                                <th>qty</th>
                                <th>Komisi</th>
                                <th>Tnggal Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $latest_transactions as $trx)
                                <tr>
                                    <td>
                                        <p class="mb-0">{{ $trx->id }}</p>
                                    </td>

                                    <td>
                                        <div class="row">
                                            <div style="
                                                    height: 60px;
                                                    width: 60px;
                                                    border-radius: 10px;
                                                    background-size: cover;
                                                    background-position: center;
                                                    background-image: url({{ asset("storage/".$trx->product->image) }});
                                                ">
                                            </div>
                                            <div class="col">
                                                <small>
                                                    <div>Harga : Rp. {{ number_format($trx->product->price) }}</div>
                                                    <div>Harga Reseller : Rp. {{ number_format($trx->product->reseller_price) }}</div>
                                                    <div>Komisi Reseller@ : Rp. {{ number_format($trx->product->reseller_comission) }}</div>
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="fw-bold mb-1">{{ $trx->user->name }}</div>
                                        <div>{{ $trx->user->email }}</div>
                                    </td>

                                    

                                    <td>
                                        {{ $trx->qty }} PCS
                                    </td>
                                    
                                    <td class="fw-bold">
                                        Rp. {{ number_format($trx->comision) }}
                                    </td>
                                    
                                    <td>
                                        {{ $trx->created_at->format('d, M Y H:i') }}
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->