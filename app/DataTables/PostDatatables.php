<?php

namespace App\DataTables;

use App\Post;
use App\User;
use Yajra\DataTables\Services\DataTable;

class PostDatatables extends DataTable
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
            ->addColumn('edit', 'admin.posts.dt.btn.edit')
            ->addColumn('show', 'admin.posts.dt.btn.show')
            ->addColumn('delete', 'admin.posts.dt.btn.delete')
            ->rawColumns([
                'edit',
                'show',
                'delete',

            ])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
        return $model->join('categories','posts.id_cat','=','categories.id')
            ->select('posts.*','categories.name')->get();
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
                'name' => 'title',
                'data' => 'title',
                'title' => 'العنوان',
            ],[
                'name' => 'excerpt',
                'data' => 'excerpt',
                'title' => 'مقتطف',
            ],[
                'name' => 'name',
                'data' => 'name',
                'title' => 'القسم',
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
        return 'PostDatatables_' . date('YmdHis');
    }
}
