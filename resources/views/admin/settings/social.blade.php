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
                    <form action="{{url('/admin/settings/social/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @foreach($settings as $setting)
                        @if ($setting->name=='face')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="url" name="face"
                                           value="{{(!empty(old('face')))?old('face'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           >
                                    @if ($errors->has('face'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('face') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif
                        @if ($setting->name=='whats')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="url" name="whats"
                                           value="{{(!empty(old('whats')))?old('whats'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                    >
                                    @if ($errors->has('whats'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('whats') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif
                        @if ($setting->name=='twit')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="url" name="twit"
                                           value="{{(!empty(old('twit')))?old('twit'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           >
                                    @if ($errors->has('twit'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('twit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                            @endif
                        @if ($setting->name=='google')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="url" name="google"
                                           value="{{(!empty(old('google')))?old('google'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           >
                                    @if ($errors->has('google'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('google') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                            @endif
                        @if ($setting->name=='lenk')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="url" name="lenk"
                                           value="{{(!empty(old('lenk')))?old('lenk'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           >
                                    @if ($errors->has('lenk'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('lenk') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                            @endif
                        @if ($setting->name=='youtube')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="url" name="youtube"
                                           value="{{(!empty(old('youtube')))?old('youtube'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           >
                                    @if ($errors->has('youtube'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('youtube') }}</strong>
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