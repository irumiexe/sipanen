<?php

namespace App\DataTables;

use App\Models\HasilPanen;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HasilPanenDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($data) {
                $get = route('hasil-panen.getHasilPanen', $data->id);
                $show = route('admin.hasil-panen.show', $data->id);
                $edit = route('admin.hasil-panen.edit', $data->id);
                $delete = route('admin.hasil-panen.destroy', $data->id);

                if(url()->current() == route('hasil-panen')) {
                    return "<button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-urlajax='$get' onclick='detailHasilPanen(this)' data-bs-target='#detailModal'>Detail</button>";
                }

                return "<a href='$show' class='btn btn-sm btn-primary'>Detail</a>
                        <a href='$edit' class='btn btn-sm btn-warning'>Edit</a>
                        <button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-url='$delete' onclick='formDelete(this)' data-target='#hapusModal'>Hapus</button>";
            })
            ->editColumn('gkp', function($data) {
                return "$data->gkp Kg";
            })
            ->editColumn('gkg', function($data) {
                return "$data->gkg Kg";
            })
            ->editColumn('hasil_produksi', function($data) {
                return "$data->hasil_produksi Ton";
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HasilPanen $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HasilPanen $model): QueryBuilder
    {
        if($this->kecamatan_id) {
            return $model->newQuery()->where('kecamatan_id', $this->kecamatan_id)->orderBy('id', 'asc');
        }
        return $model->newQuery()->with(['kecamatan', 'kelurahan'])->orderBy('hasil_produksi', 'desc')->take(10);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('datatableserverside')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        if($this->guest == 'guest') {
            return [
                Column::make('luas_lahan'),
                Column::make('kelompok_tani'),
                Column::make('alamat_ubinan'),
                Column::make('gkp')->title('GKP'),
                Column::make('gkg')->title('GKG'),
                Column::make('hasil_produksi'),
                Column::make('kecamatan.nama')->title("Daerah"),
                Column::computed('action')
                        ->exportable(false)
                        ->printable(false)
                        ->width(100)
                        ->addClass('text-center'),
            ];
        }
        return [
            Column::make('luas_lahan'),
            Column::make('kelompok_tani'),
            Column::make('alamat_ubinan'),
            Column::make('gkp')->title('GKP'),
            Column::make('gkg')->title('GKG'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    // protected function filename(): string
    // {
    //     return 'HasilPanen_' . date('YmdHis');
    // }
}
