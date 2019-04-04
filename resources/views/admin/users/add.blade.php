@extends('admin.layouts.app')
@section('title')
   إضافة عضو
@stop
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">{{__('نموذج إضافة عضو')}}</h3>
            </div>
            <div class="box-body">
                <form action="{{url('/admin/users/store')}}" method="post">
                    @csrf
                    @method('post')
                    <!-- Start Input-->
                    <div class="form-group">
                        <label for="" class="text-muted">{{__('اسم العضو')}}</label>
                        <input type="text" name="name" autocomplete="off" placeholder="{{__('اسم العضو')}}" class="form-control" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('البريد الإلكتروني')}}</label>
                            <input type="email" name="email" autocomplete="off" placeholder="{{__('البريد الإلكتروني')}}" class="form-control" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('كلمة المرور')}}</label>
                            <input type="password" autocomplete="off" name="password" placeholder="{{__('كلمة المرور')}}" class="form-control" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('رتبة العضو')}}</label>
                            <select name="role"  class="form-control" required>
                                <option value="admin">{{__('مدير')}}</option>
                                <option value="user">{{__('عضو عادي')}}</option>
                            </select>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-block">{{__('حفظ')}} <i class="fa fa-save"></i></button>
                        </div>
                        <!-- End Input -->

                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col (left) -->
</div><!-- /.row -->
    @endsection