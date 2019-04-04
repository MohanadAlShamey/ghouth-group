<?php

namespace App\DataTables;

use App\Category;

use Yajra\DataTables\Services\DataTable;

class CategoryDataTables extends DataTable
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
            ->addColumn('edit', 'admin.cats.dt.btn.edit')
            ->addColumn('show', 'admin.cats.dt.btn.show')
            ->addColumn('delete', 'admin.cats.dt.btn.delete')
            ->addColumn('name2',function($query){
                if($query->id_cat==0){
                    return "قسم رئيسي";
                }else{
                    return Category::findOrFail($query->id_cat)->name;
                }
            })
            ->rawColumns([
                'edit',
                'show',
                'delete',
                'name2'
            ])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
          return Category::query()->get();
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
            // ->addAction(['width' => '80px'])
            //->parameters($this->getBuilderParameters())
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All Record']
                ],
                'buttons' => [
                    ['extend'=>'print','className'=>'btn btn-sm btn-primary','text'=>'طباعة <i class="fa fa-print"></i>'],
                    ['extend'=>'excel','className'=>'btn btn-sm btn-primary','text'=>'تصديرEXCEL <i class="fa fa-upload"></i>'],
                    ['extend'=>'pdf','className'=>'btn btn-sm btn-info','text'=>'تصديرPDF <i class="fa fa-info"></i>']
                    //['text'=>'<a href="'. request()->url('admin/cat/add').'">إضافة قسم<i class="fa fa-plus"></i></a>','className'=>'btn btn-sm btn-primary']
                ],
                'language' => [
                    'url' =>asset('public/customs/js/arabic.json'),
                ],


            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
            return [
                [
                    'name' => 'id',
                    'data' => 'id',
                    'title' => 'Id',
                ],[
                    'name' => 'name',
                    'data' => 'name',
                    'title' => 'الاسم',
                ],[
                    'name' => 'description',
                    'data' => 'description',
                    'title' => 'وصف القسم',
                ],[
                    'name' => 'name2',
                    'data' => 'name2',
                    'title' => 'القسم الرئيسي',
                ],
                [
                    'name' => 'created_at',
                    'data' => 'created_at',
                    'title' => 'أضيف بتاريخ',
                ],[
                    'name' => 'show',
                    'data' => 'show',
                    'title' => trans('en.show'),
                    'searchable' => false,
                    'orderable' => false,
                    'exportable' => false,
                    'printable' => false,
                ],
                [
                    'name' => 'edit',
                    'data' => 'edit',
                    'title' => trans('en.edit'),
                    'searchable' => false,
                    'orderable' => false,
                    //'render' => 'function(){}',
                    // 'footer' => 'Id',
                    'exportable' => false,
                    'printable' => false,
                ],
                [
                    'name' => 'delete',
                    'data' => 'delete',
                    'title' => trans('en.delete'),
                    'searchable' => false,
                    'orderable' => false,
                    //'render' => 'function(){}',
                    // 'footer' => 'Id',
                    'exportable' => false,
                    'printable' => false,
                ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CategoryDataTables_' . date('YmdHis');
    }
}
