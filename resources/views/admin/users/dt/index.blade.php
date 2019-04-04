@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href='{{asset('public/plugins/datatables/dataTables.bootstrap.css')}}'>
    <link rel="stylesheet" hrf='{{asset('public/customs/datatables/datatables.css')}}'>
    <style>
        .dt-button{
            margin: 5px;
        }
        .dataTables_length{
            display: inline;
            margin-left: 20px;
            float: right;

        }
        .dataTableBuilder_filter{
            display: inline;

            /* float: left;*/
            clear: both;
        }
    </style>
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6"><h3 class="box-title">جميع الأعضاء</h3></div>
                        <div class="col-md-6 text-left"><a class="text-left btn btn-primary" href="{{url('admin/users/add')}}">إضافة عضو جديد <i class="fa fa-plus"></i></a></div>
                    </div>


                </div>
                <div class="box-body">
                    {!! $dataTable->table([
                    'class'=>'dataTable table table-bordered ',
                    ]) !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (left) -->
    </div><!-- /.row -->
@endsection
@section('js')
    <!-- $.fn.dataTable.ext.errMode = 'throw';-->
    <script src="{{asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('public/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script src='{{asset('public/customs/datatables/datatables.js')}}'></script>
    <script src='{{asset('public/vendor/datatables/buttons.server-side.js')}}'></script>
    {!! $dataTable->scripts() !!}
    @endsection