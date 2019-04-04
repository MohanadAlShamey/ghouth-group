@extends('admin.layouts.app')
@section('title')
   إضافة قسم
@stop
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">{{__('نموذج إضافة قسم')}}</h3>
            </div>
            <div class="box-body">
                <form action="{{url('/admin/cats/store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <!-- Start Input-->
                    <div class="form-group">
                        <label for="" class="text-muted">{{__('اسم القسم')}}</label>
                        <input type="text" name="name" value="{{old('name')}}" autocomplete="off" placeholder="{{__('اسم القسم')}}" class="form-control" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('وصف القسم')}}</label>
                            <textarea name="description" autocomplete="off" placeholder="{{__('وصف القسم')}}" class="form-control" >{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- Start Input-->

                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('نوع القسم')}}</label>
                            <select name="type" id="type" class="form-control" >
                                <option value="0">رئيسي</option>
                                <option value="1">فرعي</option>
                            </select>

                        </div>
                        <!-- Start Input-->

                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('يتبع للقسم')}}</label>
                            <select name="id_cat"  id="id_cat"  class="form-control" >
                                <option value="0"></option>
                                @if (!empty($cats))
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                @endif

                            </select>

                        </div>
                        <!-- Start Input-->

                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('صورة القسم')}} <span class="text-danger">400*1024 بيكسل</span></label>
                            <input type="file" name="img"  class="form-control">
                            @if ($errors->has('img'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('أيقونة القسم')}} <span class="text-danger">65*65 بيكسل</span></label>
                            <input type="file" name="icon"  class="form-control">
                            @if ($errors->has('icon'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('icon') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->

                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('عدد المستفيدين من القسم')}}</label>
                            <input type="number" name="num_personal" value="{{old('num_personal')}}" autocomplete="off" placeholder="{{__('عدد المستفيدين من القسم')}}" class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('num_personal') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <div class="form-group" >
                           <button type="submit"  class="btn btn-primary btn-block">{{__('حفظ')}} <i class="fa fa-save"></i></button>
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
        $(function(){
            if($('#type').val()==0){
                $('#id_cat').attr('disabled','disabled')
            }
            $('#type').change(function(){
                if($(this).val()==0){
                    $('#id_cat').attr('disabled','disabled');
                } else{
                    $('#id_cat').removeAttr('disabled');
                }
            });
        });
    </script>

    @endsection