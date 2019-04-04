@extends('admin.layouts.app')
@section('title')
    إضافة مقالة
@stop
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__('نموذج إضافة مقالة')}}</h3>
                </div>
                <div class="box-body">
                    <form action="{{url('/admin/posts/'.$post->id.'/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('العنوان')}}</label>
                            <input type="text" name="title" value="{{(!empty(old('title')))?old('title'):$post->title}}" autocomplete="off"
                                   placeholder="{{__('العنوان')}}" class="form-control" required>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('المقالة')}}</label>
                            <textarea id="post" name="post" autocomplete="off" placeholder="{{__('المقالة')}}"
                                      class="form-control">{{(!empty(old('post')))?old('post'):$post->post}}</textarea>
                            @if ($errors->has('post'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('post') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- Start Input-->
                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('مقتطف من النص')}}</label>
                            <textarea  name="excerpt" autocomplete="off" placeholder="{{__('مقتطف من النص')}}"
                                       class="form-control">{{(!empty(old('excerpt')))?old('excerpt'):$post->excerpt}}</textarea>
                            @if ($errors->has('excerpt'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('excerpt') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- Start Input-->

                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('يتبع للقسم')}}</label>
                            <select name="id_cat" id="id_cat" class="form-control">
                                <option value="0"></option>
                                @if (!empty($cats))
                                    @foreach($cats as $cat)
                                        <option {{(!empty(old('id_cat')))?($cat->id==old('id_cat'))?'selected':'':($post->id_cat==$cat->id)?'selected':''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                @endif

                            </select>

                        </div>
                        <!-- Start Input-->

                        <!-- Start Input-->
                        <div class="form-group">
                            <label for="" class="text-muted">{{__('صورة مرفقة')}} <small class="text-red">300*1024  بيكسل</small> </label>

                            @php
                            $path1=storage_path().'/app/images/posts/'.$post->img1;
                            $path2=storage_path().'/app/images/posts/'.$post->img2;
                            $path3=storage_path().'/app/images/posts/'.$post->img3;
                            $path4=storage_path().'/app/images/posts/'.$post->img4;
                            $path5=storage_path().'/app/images/posts/'.$post->img5;
                            $path6=storage_path().'/app/images/posts/'.$post->img6;
                            $path7=storage_path().'/app/images/posts/'.$post->img7;
                            $open_img1=asset('storage/app/images/posts/'.$post->img1);
                            $open_img2=asset('storage/app/images/posts/'.$post->img2);
                            $open_img3=asset('storage/app/images/posts/'.$post->img3);
                            $open_img4=asset('storage/app/images/posts/'.$post->img4);
                            $open_img5=asset('storage/app/images/posts/'.$post->img5);
                            $open_img6=asset('storage/app/images/posts/'.$post->img6);
                            $open_img7=asset('storage/app/images/posts/'.$post->img7);

                            @endphp
                            @if (file_exists($path1)&& is_file($path1))
                                <img src="{{$open_img1}}" class="img-responsive" style="max-width: 200px" alt="">
                            @endif
                            <input type="file" name="img1" class="form-control" value="{{(!empty(old('img1'))?old('img1'):'')}}">
                            @if ($errors->has('img1'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img1') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            @if (file_exists($path2)&& is_file($path2))
                                <img src="{{$open_img2}}" class="img-responsive" style="max-width: 200px" alt="">
                            @endif
                                <label for="" class="text-muted">{{__('صورة مرفقة')}} <small class="text-red">400*400  بيكسل</small> </label>

                                <input type="file" name="img2" class="form-control" value="{{(!empty(old('img2'))?old('img2'):'')}}">
                            @if ($errors->has('img2'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img2') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            @if (file_exists($path3)&& is_file($path3))
                                <img src="{{$open_img3}}" class="img-responsive" style="max-width: 200px" alt="">
                            @endif
                                <label for="" class="text-muted">{{__('صورة مرفقة')}} <small class="text-red">400*400  بيكسل</small> </label>

                                <input type="file" name="img3" class="form-control" value="{{(!empty(old('img3'))?old('img3'):'')}}">
                            @if ($errors->has('img3'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img3') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            @if (file_exists($path4)&& is_file($path4))
                                <img src="{{$open_img4}}" class="img-responsive" style="max-width: 200px" alt="">
                            @endif
                                <label for="" class="text-muted">{{__('صورة مرفقة')}} <small class="text-red">400*400  بيكسل</small> </label>

                                <input type="file" name="img4" class="form-control" value="{{(!empty(old('img4'))?old('img4'):'')}}">
                            @if ($errors->has('img4'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img4') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            @if (file_exists($path5)&& is_file($path5))
                                <img src="{{$open_img5}}" class="img-responsive" style="max-width: 200px" alt="">
                            @endif
                                <label for="" class="text-muted">{{__('صورة مرفقة')}} <small class="text-red">400*400  بيكسل</small> </label>

                                <input type="file" name="img5" class="form-control" value="{{(!empty(old('img5'))?old('img5'):'')}}">
                            @if ($errors->has('img5'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img5') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            @if (file_exists($path6)&& is_file($path6))
                                <img src="{{$open_img6}}" class="img-responsive" style="max-width: 200px" alt="">
                            @endif
                                <label for="" class="text-muted">{{__('صورة مرفقة')}} <small class="text-red">400*400  بيكسل</small> </label>

                                <input type="file" name="img6" class="form-control" value="{{(!empty(old('img6'))?old('img6'):'')}}">
                            @if ($errors->has('img6'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img6') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            @if (file_exists($path7)&& is_file($path7))
                                <img src="{{$open_img7}}" class="img-responsive" style="max-width: 200px" alt="">
                            @endif
                                <label for="" class="text-muted">{{__('صورة مرفقة')}} <small class="text-red">400*400  بيكسل</small> </label>

                                <input type="file" name="img7" class="form-control" value="{{(!empty(old('img7'))?old('img7'):'')}}">
                            @if ($errors->has('img7'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('img7 ') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
                        <!-- Start Input-->
                        <div class="form-group">
                            @if (!empty($post->url))
                                <iframe  src="{{$post->url}}" style="max-width: 200px" frameborder="0"></iframe>
                            @endif
                            <label for="" class="text-muted">{{__('فيديو مرفق')}}</label>
                            <input type="url" name="url" value="{{(!empty(old('url')))?old('url'):$post->url}}" class="form-control">
                            @if ($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('url') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- End Input -->
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
    <script src="{{asset('public/customs/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#post',
            language:'fr',
            plugins:'wordcount table',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent'
        });
    </script>
@endsection
