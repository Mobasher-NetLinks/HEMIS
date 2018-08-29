<?php

namespace App\DataTables;

use App\Models\Department;
use Yajra\DataTables\Services\DataTable;

class DepartmentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function ($department) {
                $html = '';
                $html .= '<a href="'.route('departments.edit', [request()->segment(2), $department]).'" class="btn btn-success btn-xs"><i class="icon-pencil"></i></a>';
                $html .= '<form action="'. route('departments.destroy', [request()->segment(2), $department]) .'" method="post" style="display:inline">
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" name="_token" value="'.csrf_token().'" />
                            <button type="submit" class="btn btn-xs btn-danger" onClick="doConfirm()"><i class="icon-trash"></i></button>
                        </form>';

                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\University $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Department $model)
    {
        return $model->where('university_id', request()->segment(2))->select('name');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['title' => trans('general.action'), 'width' => '60px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name'     => ['title' => trans('general.name')]                    
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Departments_' . date('YmdHis');
    }
}
