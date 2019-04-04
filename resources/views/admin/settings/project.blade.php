@extends('admin.layouts.app')
@section('title')
    الإعدادات المشاريع
@stop
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__('نموذج تعديل خصائص الصفحة')}}</h3>
                </div>
                <div class="box-body">
                    <form action="{{url('/admin/settings/project/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @foreach($settings as $setting)

                            @if ($setting->name=='imgpro')
                            <!-- Start Input-->


                                <div class="form-group">

                                    <label for="" class="text-muted">{{__($setting->slug)}} <span class="text-danger">1024*300 بيكسل</span></label><br>
                                    <img src="{{$path}}"style="width: 350px;height: 150px" alt="">
                                    <input type="file" name="imgpro"
                                           autocomplete="off" class="form-control"
                                           >
                                    @if ($errors->has('imgpro'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('imgpro') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                                <br>
                            @endif
                            @if ($setting->name=='project1')
                                <!-- Start Input-->


                                    <div class="form-group p-t  p-b">

                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العنوان
                                            </label>
                                            <input type="text" name="project1" value="{{explode(';',$setting->value)[0]}}"
                                                   autocomplete="off" class="form-control"
                                                   required>
                                            @if ($errors->has('project1'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('project1') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العدد
                                            </label>
                                            <input type="number" name="num1" value="{{explode(';',$setting->value)[1]}}"
                                                   autocomplete="off" class="form-control"
                                                   required>
                                            @if ($errors->has('num1'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('num1') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                @endif
                            @if ($setting->name=='project2')
                                <!-- Start Input-->


                                    <div class="form-group p-t  p-b">

                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العنوان
                                            </label>
                                            <input type="text" name="project2"
                                                   autocomplete="off" class="form-control" value="{{explode(';',$setting->value)[0]}}"
                                                   required>
                                            @if ($errors->has('project2'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('project2') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العدد
                                            </label>
                                            <input type="number" name="num2" value="{{explode(';',$setting->value)[1]}}"
                                                   autocomplete="off" class="form-control"
                                                   required>
                                            @if ($errors->has('num2'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('num2') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                @endif

                            @if ($setting->name=='project3')
                                <!-- Start Input-->


                                    <div class="form-group p-t  p-b">

                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العنوان
                                            </label>
                                            <input type="text" name="project3"
                                                   autocomplete="off" class="form-control" value="{{explode(';',$setting->value)[0]}}"
                                                   required>
                                            @if ($errors->has('project3'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('project3') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العدد
                                            </label>
                                            <input type="number" name="num3" value="{{explode(';',$setting->value)[1]}}"
                                                   autocomplete="off" class="form-control"
                                                   required>
                                            @if ($errors->has('num3'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('num3') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                @endif
                            @if ($setting->name=='project4')
                                <!-- Start Input-->


                                    <div class="form-group p-t  p-b">

                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العنوان
                                            </label>
                                            <input type="text" name="project4" value="{{explode(';',$setting->value)[0]}}"
                                                   autocomplete="off" class="form-control"
                                                   required>
                                            @if ($errors->has('project4'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('project4') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="text-muted">
                                                العدد
                                            </label>
                                            <input type="number" name="num4" value="{{explode(';',$setting->value)[1]}}"
                                                   autocomplete="off" class="form-control"
                                                   required>
                                            @if ($errors->has('num4'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('num4') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                @endif







                    @endforeach
                        <div class="form-group">
                            &nbsp;
                            <br>
                        </div>
                        <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">{{__('حفظ')}} <i
                                        class="fa fa-save"></i></button>
                        </div>
                        <!-- End Input -->

                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (left) -->
    </div><!-- /.row -->
@endsection
@section('js')
    <script>
        $(function () {
            if ($('#type').val() == 0) {
                $('#id_cat').attr('disabled', 'disabled')
            }
            $('#type').change(function () {
                if ($(this).val() == 0) {
                    $('#id_cat').attr('disabled', 'disabled');
                } else {
                    $('#id_cat').removeAttr('disabled');
                }
            });
        });
    </script>

@endsection