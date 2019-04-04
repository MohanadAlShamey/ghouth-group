@extends('admin.layouts.app')
@section('title')
   تعديل القسم | {{$cat->name}}
@stop
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__('نموذج تعديل القسم | '.$cat->name)}}</h3>
                </div>
                <div class="box-body">
                    <form action="{{url('/admin/cats/'.$cat->id.'/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('اسم القسم')}}</label>
                            <input type="text" name="name" value="{{(!empty(old('name')))?old('name'):$cat->name}}" autocomplete="off" placeholder="{{__('اسم القسم')}}" class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('نوع القسم')}}</label>
                            <select name="type" id="type" class="form-control" >
                                <option {{$cat->id_cat==0?'selected':''}} value="0">رئيسي</option>
                                <option {{$cat->id_cat!=0?'selected':''}} value="1">فرعي</option>
                            </select>

                        </div>
                        <!-- Start Input-->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('يتبع للقسم')}}</label>
                            <select name="id_cat"  id="id_cat"  class="form-control" >
                                <option value="0"></option>
                                @if (!empty($cats))
                                    @foreach($cats as $cat1)
                                        <option {{($cat->id_cat==$cat1->id)?'selected':''}} value="{{$cat1->id}}">{{$cat1->name}}</option>
                                    @endforeach
                                @endif

                            </select>

                        </div>
                        <!-- Start Input-->

                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('وصف القسم')}}</label>
                            <textarea name="description" autocomplete="off" placeholder="{{__('وصف القسم')}}" class="form-control" >{{(!empty(old('description')))?old('description'):$cat->description}}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- Start Input-->


                        <!-- Start Input-->
                        <div class="form-group">{{__('صورة القسم')}} <span class="text-danger">400*1024 بيكسل</span></label>
                            @php
                            $path=storage_path().'/app/images/cats/'.$cat->img;
                            @endphp
                           @if(is_file($path))
                                <img style="width: 100px; height: 100px; margin-bottom: 5px" class="img-thumbnail" src="{{asset('storage//app/images/cats/'.$cat->img)}}" alt="{{$cat->name}}">

                            @endif
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
                            @php
                                $path=storage_path().'/app/images/cats/'.$cat->icon;
                            @endphp
                            @if(is_file($path))
                                <img style="max-width: 100px; max-height: 100px; margin-bottom: 5px" class="img-thumbnail" src="{{asset('storage//app/images/cats/'.$cat->icon)}}" alt="{{$cat->name}}">

                            @endif
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
                            <input type="number" name="num_personal" value="{{(!empty(old('num_personal')))?old('num_personal'):$cat->num_personal}}" autocomplete="off" placeholder="{{__('عدد المستفيدين من القسم')}}" class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('num_personal') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
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