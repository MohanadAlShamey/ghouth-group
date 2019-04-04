@extends('admin.layouts.app')
@section('title')
     معلومات القسم |  &npsb;{{$cat->name}}
@stop
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__(' معلومات القسم '.$cat->name)}}</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                      <tr>
                          <td>الرقم</td>
                          <td>{{$cat->id}}</td>
                      </tr>
                      <tr>
                          <td>اسم القسم</td>
                          <td>{{$cat->name}}</td>
                      </tr>
                      <tr>
                          <td>وصف القسم</td>
                          <td>{{$cat->description}}</td>
                      </tr>
                      <tr>
                          <td>صورة القسم</td>
                          <td>
                              @php
                                  $path=storage_path().'/app/images/cats/'.$cat->img;
                              @endphp
                              @if(is_file($path))
                                  <img class="img-thumbnail img-responsive" src="{{asset('storage//app/images/cats/'.$cat->img)}}" alt="{{$cat->name}}">

                              @endif
                          </td>
                      </tr>
                      <tr>
                          <td >
                              <a href="{{url('admin/cats/'.$cat->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> تعديل</a>
                          </td>
                          <td >
                              <a href="{{url('admin/cats/'.$cat->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-remove"></i> حذف</a>
                          </td>
                      </tr>
                  </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (left) -->
    </div><!-- /.row -->



@endsection