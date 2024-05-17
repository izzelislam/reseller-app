<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                            <i class="uim uim-briefcase"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden ms-4">
                        <p class="text-muted text-truncate font-size-15 mb-2"> Total Komisi</p>
                        <h3 class="fs-4 flex-grow-1 mb-3">Rp. {{ number_format($total_comision) }}<span class="text-muted font-size-16"></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                            <i class="uim uim-layer-group"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden ms-4">
                        <p class="text-muted text-truncate font-size-15 mb-2"> Komisi Bulan Ini ({{ $months[date('m')] }})</p>
                        <h3 class="fs-4 flex-grow-1 mb-3">Rp. {{ number_format($comision_current_month) }} <span class="text-muted font-size-16"></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                            <i class="uim uim-scenery"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden ms-4">
                        <p class="text-muted text-truncate font-size-15 mb-2"> Produk Terjual</p>
                        <h3 class="fs-4 flex-grow-1 mb-3">{{ $item_saled }} <span class="text-muted font-size-16">PCS</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                            <i class="uim uim-airplay"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden ms-4">
                        <p class="text-muted text-truncate font-size-15 mb-2"> Jumlah Produk</p>
                        <h3 class="fs-4 flex-grow-1 mb-3">{{ $products }}<span
                                class="text-muted font-size-16"> Produk</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->

<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header border-0 align-items-center d-flex pb-0">
              <h4 class="card-title mb-0 flex-grow-1">Audiences Metrics</h4>
              <div>
                  <button type="button" class="btn btn-soft-secondary btn-sm">
                      ALL
                  </button>
                  <button type="button" class="btn btn-soft-secondary btn-sm">
                      1M
                  </button>
                  <button type="button" class="btn btn-soft-secondary btn-sm">
                      6M
                  </button>
                  <button type="button" class="btn btn-soft-primary btn-sm">
                      1Y
                  </button>
              </div>
          </div>
          <div class="card-body">
              <div class="row align-items-center">
                  <div class="col-12 audiences-border">
                      <div id="column-chart" class="apex-charts"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- END ROW -->
