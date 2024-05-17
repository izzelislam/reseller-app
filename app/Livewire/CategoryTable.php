<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

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

    public function bulkActions(): array
    {
        return [
            'deleteSelected' => 'Delete',
            // 'ExportSelected' => 'Export Excell',
        ];
    }

    public function deleteSelected()
    {
        $datas      = $this->getSelected();
        $model      = new $this->model();
        $this->clearSelected();
        $model->destroy($datas);    
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true)
                ->sortable(),
            Column::make("Nama", "name")
                ->sortable(),
            Column::make("Dibuat Pada", "created_at")
                ->format(fn ($value) => date('d/m/Y H:i:s', strtotime($value)))
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->hideIf(true)
                ->sortable(),
            Column::make('Aksi')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatable-action-column')->with(
                        [
                            'detail'   => route("categories.show", $row->id),
                            'edit'   => route("categories.edit", $row->id),
                            'delete' => route("categories.destroy", $row->id),
                        ]
                    )
                )->html(),
        ];
    }
}
