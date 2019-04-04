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
                    <form action="{{url('/admin/settings/about/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @foreach($settings as $setting)

                        @if ($setting->name=='about')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}} <span class="text-red">قياس 900*900 بيكسل</span></label>
                                    <input type="file" name="about"
                                           value="{{(!empty(old('about')))?old('about'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__('صفحة من نحن')}}" class="form-control"
                                           >
                                    @if ($errors->has('about'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('about') }}</strong>
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