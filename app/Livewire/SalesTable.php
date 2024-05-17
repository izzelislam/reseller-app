<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;

class SalesTable extends DataTableComponent
{
    protected $model = Sale::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setLoadingPlaceholderEnabled()
        ->setFilterLayoutSlideDown()
        ->setDefaultSort('created_at', 'desc')
        ->setLoadingPlaceHolderIconAttributes([
            'class' => 'lds-hourglass',
            'default' => false,
        ]);
    }

    public function builder(): Builder
    {
        $model = new $this->model();
        $query = $model->query();
        
        if (Auth::user()->role == 'admin') {
            return $query;
        }
        
        if (Auth::user()->role == 'customer') {
            return $query->where('user_id', Auth::user()->id);
        }

    }

    public function filters(): array
    {
        
        return [
            DateRangeFilter::make('Tanggal Transaksi')
            ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                $builder
                    ->where('sales.created_at', '>=', $dateRange['minDate']) // minDate is the start date selected
                    ->where('sales.created_at', '<=', $dateRange['maxDate']); // maxDate is the end date selected
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
            Column::make("User id", "user_id")
                ->hideIf(true)
                ->sortable(),
            Column::make("Product id", "product_id")
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
                        background-image: url('.asset("storage/".$row->product->image).');
                    ">
                </div>';
                })
                ->html()
                ->sortable(),
            Column::make("Product", "product.name")
                ->searchable()
                ->sortable(),
            Column::make("Harga Product", "product.price")
                ->format(fn ($value, $column, $row) => 'Rp. '.number_format($value, 2))
                ->searchable()
                ->sortable(),
            Column::make("Harga Reseller", "product.reseller_price")
                ->format(fn ($value, $column, $row) => 'Rp. '.number_format($value, 2))
                ->searchable()
                ->sortable(),
            Column::make("Komisi Reseller @", "product.reseller_comission")
                ->format(fn ($value, $column, $row) => 'Rp. '.number_format($value, 2))
                ->searchable()
                ->sortable(),
            Column::make("Jumlah", "qty")
                ->sortable(),
            Column::make("Total Komisi", "comision")
                ->format(fn ($value, $column, $row) => 'Rp. '.number_format($value, 2))
                ->searchable()
                ->sortable(),
            Column::make("Terjual Pada", "created_at")
                ->format(fn ($value, $column, $row) => $value->format('d-m-Y H:i'))
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->hideIf(true)
                ->sortable(),
        ];
    }
}
