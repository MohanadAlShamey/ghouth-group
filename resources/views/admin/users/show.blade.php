@extends('admin.layouts.app')
@section('title')
    معلومات العضو | {{$user->name}}
@stop
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__('معلومات العضو'.$user->name)}}</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                      <tr>
                          <td>الرقم</td>
                          <td>{{$user->id}}</td>
                      </tr>
                      <tr>
                          <td>الاسم</td>
                          <td>{{$user->name}}</td>
                      </tr>
                      <tr>
                          <td>البريد الإلكتروني</td>
                          <td>{{$user->email}}</td>
                      </tr>
                      <tr>
                          <td>الرتبة</td>
                          <td>{{($user->role=='admin')?'مدير':'عضو عادي'}}</td>
                      </tr>
                      <tr>
                          <td >
                              <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> تعديل</a>
                          </td>
                          <td >
                              <a href="{{url('admin/users/'.$user->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-remove"></i> حذف</a>
                          </td>
                      </tr>
                  </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (left) -->
    </div><!-- /.row -->



@endsection