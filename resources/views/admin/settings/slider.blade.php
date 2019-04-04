@extends('admin.layouts.app')
@section('title')
    رأس الصفحة
@stop
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__('نموذج تعديل خصائص الصفحة')}}</h3>
                </div>
                <div class="box-body">
                    <form action="{{url('/admin/settings/slider/update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @foreach($settings as $setting)
                            @if ($setting->name=='slide1')
                                @php
                                    $path2=storage_path().'/app/images/settings/'.$setting->value;
                                @endphp
                                @if (is_file($path2))
                                    <img src="{{asset('storage/app/images/settings/'.$setting->value)}}" width="200"
                                         height="100"/>
                                @endif
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="file" name="slide1" placeholder="{{__($setting->slug)}}"
                                           class="form-control">
                                    @if ($errors->has('slide1'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('slide1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                            @endif


                            @if ($setting->name=='slide2')
                            <!-- Start Input-->
                                @php
                                    $path2=storage_path().'/app/images/settings/'.$setting->value;
                                @endphp
                                @if (is_file($path2))
                                    <img src="{{asset('storage/app/images/settings/'.$setting->value)}}" width="200"
                                         height="100"/>
                                @endif
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="file" name="slide2" placeholder="{{__($setting->slug)}}"
                                           class="form-control">
                                    @if ($errors->has('slide2'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('slide2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                            @endif
                            @if ($setting->name=='slide3')
                            <!-- Start Input-->
                                @php
                                    $path2=storage_path().'/app/images/settings/'.$setting->value;
                                @endphp
                                @if (is_file($path2))
                                    <img src="{{asset('storage/app/images/settings/'.$setting->value)}}" width="200"
                                         height="100"/>
                                @endif
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="file" name="slide3" placeholder="{{__($setting->slug)}}"
                                           class="form-control">
                                    @if ($errors->has('slide3'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('slide3') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                            @endif




                        @endforeach
                        <div class="form-group">
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