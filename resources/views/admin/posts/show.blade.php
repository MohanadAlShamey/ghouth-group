@extends('admin.layouts.app')
@section('title')
      معلومات المقالة |{{$post->title}}&nbsp;
@stop
@section('css')
    <style>
        td{
            max-height: 200px !important;
        }
        video,iframe{
            width: 100%;
            height:200px;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{{__('عنوان المقالة'.$post->title)}}</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                      <tr>
                          <td>الرقم</td>
                          <td>{{$post->id}}</td>
                      </tr>
                      <tr>
                          <td>عنوان المقالة</td>
                          <td>{{$post->title}}</td>
                      </tr>
                      <tr>
                          <td>القسم</td>
                          <td>{{$post->name}}</td>
                      </tr>
                      <tr>
                          <td>الإقتباس</td>
                          <td>{{$post->excerpt}}</td>
                      </tr>
                      <tr>
                          <td>المقالة كاملة</td>
                          <td>{!! $post->post !!}</td>
                      </tr>

                      <!-- show video --->
                      @php
                          $path=storage_path().'/app/images/posts/'.$post->img1;
                      @endphp
                      @if(is_file($path))
                      <tr>
                          <td>صورة الخبر</td>

                          <td>
                                  <img class="img-thumbnail img-responsive" style="max-width:100%;height: 100px" src="{{asset('storage//app/images/posts/'.$post->img1)}}" alt="{{$post->title}}">
                          </td>
                      </tr>
                      @endif
                      <!-- end show video -->

                      <!-- show video --->
                      @php
                          $path=storage_path().'/app/images/posts/'.$post->img2;
                      @endphp
                      @if(is_file($path))
                          <tr>
                              <td>صورة الخبر</td>

                              <td>
                                  <img class="img-thumbnail img-responsive" style="max-width:100%;height: 100px" src="{{asset('storage//app/images/posts/'.$post->img2)}}" alt="{{$post->title}}">
                              </td>
                          </tr>
                  @endif
                  <!-- end show video -->
                      <!-- show video --->
                      @php
                          $path=storage_path().'/app/images/posts/'.$post->img3;
                      @endphp
                      @if(is_file($path))
                          <tr>
                              <td>صورة الخبر</td>

                              <td>
                                  <img class="img-thumbnail img-responsive" style="max-width:100%;height: 100px" src="{{asset('storage//app/images/posts/'.$post->img3)}}" alt="{{$post->title}}">
                              </td>
                          </tr>
                  @endif
                  <!-- end show video -->
                      <!-- show video --->
                      @php
                          $path=storage_path().'/app/images/posts/'.$post->img4;
                      @endphp
                      @if(is_file($path))
                          <tr>
                              <td>فيديو الخبر</td>

                              <td>
                                  <video class="" controls style="max-width:100%;" src="{{asset('storage//app/images/posts/'.$post->img4)}}"></video>
                              </td>
                          </tr>
                  @endif
                  <!-- end show video -->
                      <!-- show video --->

                      @if(!empty($post->url))
                          <tr>
                              <td>فيديو الخبر</td>

                              <td>
                                  <iframe  style="max-width:100%;" src="{{$post->url}}"></iframe>
                              </td>
                          </tr>
                  @endif
                  <!-- end show video -->
                      <tr>
                          <td >
                              <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> تعديل</a>
                          </td>
                          <td >
                              <a href="{{url('admin/posts/'.$post->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-remove"></i> حذف</a>
                          </td>
                      </tr>
                  </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (left) -->
    </div><!-- /.row -->



@endsection