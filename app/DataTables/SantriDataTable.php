<?php

namespace App\DataTables;

use App\Models\Santri;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SantriDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = datatables()->eloquent($query)->addIndexColumn();

        if (!request()->search['value']) {
            $dataTable->filter(function ($query) {
                if (request()->nama) {
                    $query->where('nama', 'like', '%' . request()->nama . '%');
                }
            });
        }

        return $dataTable->editColumn('action', function ($query) {
            return view('components.button.edit', ['action' => route('santri.edit', $query->id)]) .
                view('components.button.destroy', ['action' => route('santri.destroy', $query->id), 'label' => $query->nama, 'target' => 'santri-table']);
        })
            ->rawColumns(['banned_at', 'action']);
    }

    public function query(Santri $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('santri-table')
            ->columns($this->getColumns())
            ->orderBy(2, 'desc')
            ->ajax([
                'data' => 'function(d) { 
                    d.nama = $("#nama").val();
                }',
            ])
            ->drawCallback("function( settings ) { $(document).find('[data-toggle=\"tooltip\"]').tooltip(); }")
            ->buttons('create')
            ->dom('<"d-flex justify-content-between p-2 pt-3" row <"col-lg-6 d-flex"f> <"col-lg-6 d-flex justify-content-end px-2"B> >t <"d-flex justify-content-between m-2 row" <"col-md-6 d-flex justify-content-center justify-content-md-start"li> <"col-md-6 px-0"p> >');
    }

    protected function getColumns()
    {
        return [
            Column::computed('id')->title('no')->data('DT_RowIndex'),
            Column::make('nik'),
            Column::make('nama'),
            Column::make('alamat'),
            Column::computed('action')->addClass('text-center'),
        ];
    }
}
