@extends('admin.layouts.app')
@section('title')
    الإعدادات العامة
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__('نموذج تعديل خصائص الصفحة')}}</h3>
                </div>
                <div class="box-body">
                    <form action="{{url('/admin/settings/header/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @foreach($settings as $setting)
                        @if ($setting->name=='img')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}} أبعاد الصورة (1600  * 1065)</label>
                                    @php
                                    $path=storage_path().'/app/images/settings/'.$setting->value;
                                     $open_img1=asset('storage/app/images/settings/'.$setting->value);
                                    @endphp
                                    @if (file_exists($path)&& is_file($path))
                                        <img src="{{$open_img1}}" class="img-responsive" style="max-width: 200px;max-height: 200px" alt="">
                                    @endif
                                    <input type="file" name="img" class="form-control">
                                    @if ($errors->has('img'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif

                        @if ($setting->name=='title_header')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="text" name="title_header"
                                           value="{{(!empty(old('title_header')))?old('title_header'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           required>
                                    @if ($errors->has('title_header'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('title_header') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif

                        @if ($setting->name=='description_header')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <textarea name="description_header" autocomplete="off" placeholder="{{__($setting->slug)}}"
                                              class="form-control">{{(!empty(old('description_header')))?old('description_header'):$setting->value}}</textarea>
                                    @if ($errors->has('description_header'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('description_header') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- Start Input-->
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