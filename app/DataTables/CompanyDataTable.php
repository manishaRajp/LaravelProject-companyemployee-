<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('show',function ($data) {
            return '<td><a href="' . route('company.show', $data->id) . '" class="btn btn-sm btn btn-outline-info" >Show</a></td>'; 
             })
            ->addColumn('Edit', function ($data) {
                return '<td><a href="' . route('company.edit', $data->id) . '"  class="btn btn-sm btn btn-outline-primary" >Edit</a></td>';
            })
            ->addColumn('Delete', function ($data) {
             return ' 
             <form  class="form-group" action="'.route('company.destroy', $data->id). '" method="POST">
             <input type="hidden" name="_token" value="' . csrf_token() .'" >
             <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-sm btn btn-outline-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>
             </form>';
            })
            ->editColumn('logo', function ($data) {
             return ' 
              <img src="upload/logo/'.$data->logo.'" width="72px" height="50px" alt="no..image">';
            })
    
        ->rawColumns(['show', 'Edit','Delete','logo'])
        ->addIndexColumn();
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Company $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Company $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('company-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy([1, 'desc']);
                    
                
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('website'),
            Column::make('logo'),
            Column::computed('show'),
            Column::computed('Edit'),
            Column::computed('Delete')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CompanyDataTable' . date('YmdHis');
    }
}
