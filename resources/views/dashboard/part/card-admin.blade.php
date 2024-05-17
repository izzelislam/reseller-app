<div class="row">
  <div class="col-xl-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="avatar-md flex-shrink-0">
                      <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                          <i class="uim uim-graph-bar "></i>
                      </span>
                  </div>
                  <div class="flex-grow-1 overflow-hidden ms-4">
                      <p class="text-muted text-truncate font-size-15 mb-2"> Total Pendapatan <small class="ms-2">(harga normal)</small> </p>
                      <h3 class="fs-4 flex-grow-1 mb-3">Rp. {{ number_format($sales_model_card['price']) }}
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
                          <i class="uim uim-analysis"></i>
                      </span>
                  </div>
                  <div class="flex-grow-1 overflow-hidden ms-4">
                      <p class="text-muted text-truncate font-size-15 mb-2"> Total Pendapatan <small class="ms-2">(harga reseller)</small></p>
                      <h3 class="fs-4 flex-grow-1 mb-3">Rp. {{ number_format($sales_model_card['reseller_price']) }}
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
                          <i class="uim uim-analytics"></i>
                      </span>
                  </div>
                  <div class="flex-grow-1 overflow-hidden ms-4">
                      <p class="text-muted text-truncate font-size-15 mb-2">Total Komisi Reseller</p>
                      <h3 class="fs-4 flex-grow-1 mb-3">Rp. {{ number_format($sales_model_card['comision']) }}
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
                          <i class="uim uim-chart"></i>
                      </span>
                  </div>
                  <div class="flex-grow-1 overflow-hidden ms-4">
                      <p class="text-muted text-truncate font-size-15 mb-2"> Pendapatan <small class="ms-2">(Harga reseller - Komisi)</small></p>
                      <h3 class="fs-4 flex-grow-1 mb-3">Rp. {{ number_format($sales_model_card['revenue']) }}</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="avatar-md flex-shrink-0">
                      <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                          <i class="uim uim-box"></i>
                      </span>
                  </div>
                  <div class="flex-grow-1 overflow-hidden ms-4">
                      <p class="text-muted text-truncate font-size-15 mb-2"> Total Produk </p>
                      <h3 class="fs-4 flex-grow-1 mb-3">{{ $total_products }} <span class="text-muted font-size-16">Produk</span>
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
                          <i class="uim uim-bag"></i>
                      </span>
                  </div>
                  <div class="flex-grow-1 overflow-hidden ms-4">
                      <p class="text-muted text-truncate font-size-15 mb-2"> Total Item Terjual</p>
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
                          <i class="uim uim-scenery"></i>
                      </span>
                  </div>
                  <div class="flex-grow-1 overflow-hidden ms-4">
                      <p class="text-muted text-truncate font-size-15 mb-2">Reseller Aktif</p>
                      <h3 class="fs-4 flex-grow-1 mb-3">{{ $user_reseller }} <span class="text-muted font-size-16">Reseller</span>
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
                      <p class="text-muted text-truncate font-size-15 mb-2"> Total Kategori </p>
                      <h3 class="fs-4 flex-grow-1 mb-3">{{ $total_category }} <span
                              class="text-muted font-size-16">Category</span></h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- END ROW -->