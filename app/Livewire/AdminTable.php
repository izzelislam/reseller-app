<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;

class AdminTable extends DataTableComponent
{
    protected $model = User::class;

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

    public function builder(): Builder
    {
        $model = new $this->model();
        $query = $model->query();
        return $query->where('role', 'admin');
    }

    public function filters(): array
    {
        
        return [
            DateRangeFilter::make('Tanggal Bergabung')
            ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                $builder
                    ->where('users.created_at', '>=', $dateRange['minDate']) // minDate is the start date selected
                    ->where('users.created_at', '<=', $dateRange['maxDate']); // maxDate is the end date selected
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
            Column::make("Nama", "name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->searchable()
                ->sortable(),
            Column::make("Tgl Bergabung", "created_at")
                ->format(fn ($value) => $value->format('d/m/Y H:i:s'))
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->hideIf(true)
                ->sortable(),
            Column::make('Aksi')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatable-action-column')->with(
                        [
                            'detail'   => route("admins.show", $row->id),
                            'edit'   => route("admins.edit", $row->id),
                            'delete' => route("admins.destroy", $row->id),
                        ]
                    )
                )->html(),
        ];
    }
}
