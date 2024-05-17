<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setLoadingPlaceholderEnabled()
        ->setFilterLayoutSlideDown()
        ->setLoadingPlaceHolderIconAttributes([
            'class' => 'lds-hourglass',
            'default' => false,
        ]);
    }
    
    public function filters(): array
    {
        
        return [
            DateRangeFilter::make('Tanggal Pembuatan')
            ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                $builder
                    ->where('products.created_at', '>=', $dateRange['minDate']) // minDate is the start date selected
                    ->where('products.created_at', '<=', $dateRange['maxDate']); // maxDate is the end date selected
            }),
            // SelectFilter::make('Status')
            // ->options([
            //     'all' => 'Semua',
            //     1 => 'Aktif',
            //     0 => 'Tidak Aktif',

            // ])->filter(function (Builder $builder, $val) {
            //     if($val != 'all'){
            //         $builder
            //             ->where('employs.status', $val); // minDate is the start date selected
            //     }
            // }),
            // SelectFilter::make('Jabatan')
            // ->options($jabatan)->filter(function (Builder $builder, $val) {
            //     if($val != 'all'){
            //         $builder
            //             ->where('employs.position_id', $val); // minDate is the start date selected
            //     }
            // }),
            // SelectFilter::make('Status')
            // ->options([
            //     'all' => 'Semua',
            //     "approve" => "Approve",
            //     "reject" => "Reject",
            //     "suspend" => "Suspend",
            // ])->filter(function (Builder $builder, $val) {
            //     if($val != 'all'){
            //         $builder
            //             ->where('afiliators.status', $val); // minDate is the start date selected
            //     }
            // }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true)
                ->sortable(),
            Column::make("Category id", "category_id")
                ->hideIf(true)
                ->sortable(),
            Column::make("Image", "image")
                ->hideIf(true)
                ->sortable(),
            Column::make("Image")
                ->label(function ($row) {
                    return '<div style="
                        height: 60px;
                        width: 60px;
                        border-radius: 10px;
                        background-size: cover;
                        background-position: center;
                        background-image: url('.asset("storage/".$row->image).');
                    ">
                </div>';
                })
                ->html()
                ->sortable(),
            Column::make("Category", "category.name")
                ->searchable()
                ->sortable(),
            Column::make("Nama Produk", "name")
                ->sortable(),
            Column::make("Describtion", "describtion")
                ->collapseAlways()
                ->sortable(),
            Column::make("Harga", "price")
                ->format(function ($value) {
                    return 'Rp. '.number_format($value, 0, ',', '.');
                })
                ->sortable(),
            Column::make("harga Reseller", "reseller_price")
                ->format(function ($value) {
                    return 'Rp. '.number_format($value, 0, ',', '.');
                })
                ->sortable(),
            Column::make("Komisi Reseller", "reseller_comission")
                ->format(function ($value) {
                    return 'Rp. '.number_format($value, 0, ',', '.');
                })
                ->sortable(),
            Column::make("Stock", "stock")
                ->format(function ($value) {
                    return $value.' pcs';
                })
                ->sortable(),
            Column::make("Terjual", "stock")
                ->format(function ($value) {
                    return $value.' pcs';
                })
                ->sortable(),
            Column::make("Status", "status")
                ->hideIf(true)
                ->sortable(),
            Column::make("Status")
                ->label(function ($row) {
                    if ($row->status == 'available') {
                        return '<span class="badge bg-success">Tersedia</span>';
                    }else{
                        return '<span class="badge bg-danger">Tidak Tersedia</span>';
                    }
                })
                ->html()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->collapseAlways()
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->hideIf(true)
                ->sortable(),
            Column::make('Aksi')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatable-action-column')->with(
                        [
                            'detail'   => route("products.show", $row->id),
                            'edit'   => route("products.edit", $row->id),
                            'delete' => route("products.destroy", $row->id),
                        ]
                    )
                )->html(),
        ];
    }
}
