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
                    <form action="{{url('/admin/settings/general/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @foreach($settings as $setting)
                        @if ($setting->name=='name')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="text" name="name"
                                           value="{{(!empty(old('name')))?old('name'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__('اسم الموقع')}}" class="form-control"
                                           required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif
                        @if ($setting->name=='logo')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}} <span class="text-red">قياس 123*123 بيكسل</span></label>
                                    <input type="file" name="logo"
                                           value="{{(!empty(old('logo')))?old('logo'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__('شعار الموقع')}}" class="form-control"
                                           >
                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif

                        @if ($setting->name=='discription')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <textarea name="discription" autocomplete="off" placeholder="{{__($setting->slug)}}"
                                              class="form-control">{{(!empty(old('discription')))?old('discription'):$setting->value}}</textarea>
                                    @if ($errors->has('discription'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('discription') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- Start Input-->
                        @endif

                        @if ($setting->name=='keywords')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <textarea name="keywords" autocomplete="off" placeholder="{{__($setting->slug)}}"
                                              class="form-control">{{(!empty(old('keywords')))?old('keywords'):$setting->value}}</textarea>
                                    @if ($errors->has('keywords'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('keywords') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- Start Input-->
                        @endif

                        @if ($setting->name=='email')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="email" name="email"
                                           value="{{(!empty(old('email')))?old('email'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif
                        @if ($setting->name=='bank')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="text" name="bank"
                                           value="{{(!empty(old('bank')))?old('bank'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           required>
                                    @if ($errors->has('bank'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('bank') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif
                        @if ($setting->name=='bank1')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="text" name="bank1"
                                           value="{{(!empty(old('bank1')))?old('bank'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           required>
                                    @if ($errors->has('bank1'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('bank1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif
                        @if ($setting->name=='bank2')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="text" name="bank2"
                                           value="{{(!empty(old('bank2')))?old('bank2'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           required>
                                    @if ($errors->has('bank2'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('bank2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif

                        @if ($setting->name=='phone')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="text" name="phone"
                                           value="{{(!empty(old('phone')))?old('phone'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif

                        @if ($setting->name=='address')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="text" name="address"
                                           value="{{(!empty(old('address')))?old('address'):$setting->value}}"
                                           autocomplete="off" placeholder="{{__($setting->slug)}}" class="form-control"
                                           required>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- End Input -->
                        @endif

                        @if ($setting->name=='contact')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <input type="url" name="contact" autocomplete="off" placeholder="{{__($setting->slug)}}"
                                              class="form-control" value="{{(!empty(old('keywords')))?old('keywords'):$setting->value}}">
                                    @if ($errors->has('contact'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('contact') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- Start Input-->
                        @endif

                        @if ($setting->name=='map')
                            <!-- Start Input-->
                                <div class="form-group">
                                    <label for="" class="text-muted">{{__($setting->slug)}}</label>
                                    <textarea name="map" autocomplete="off" placeholder="{{__($setting->slug)}}"
                                              class="form-control">{{(!empty(old('keywords')))?old('keywords'):$setting->value}}</textarea>
                                    @if ($errors->has('map'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('map') }}</strong>
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