@extends('theem1.layouts')


@section('php')
    @php
        $settings=\App\Setting::all();
        $setting=[];
        foreach ($settings as $s){
        $setting[$s->name]=$s->value;
        }
        $imgpro=storage_path().'/app/images/settings/'.$setting['imgpro'];
       // echo $imgpro;
    if(is_file($imgpro)){
    $imgpro=asset('storage/app/images/settings/'.$setting['imgpro']);
    }else{
    $imgpro=asset('public/img/image.png');
    }
    @endphp

@endsection




@section('content')

    <main class="sub-projects">
        <header class="nav-top navbar-fixed-top">
            <div class="container">
                <nav class="navbar navbar-default  bg-transparent ">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#nav-top" aria-expanded="false">
                                <span class="sr-only">غوث</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{url('/')}}">
                                <img class="img-logo img-responsive"
                                     src="{{asset('/storage/app/images/settings/'.$setting['logo'])}}"
                                     alt="{{$setting['name']}}">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="nav-top">
                            <ul class="nav navbar-nav navbar-left font-gedinar">
                                <li class="active"><a href="{{url('/')}}" data-scroll="">الرئيسية</a></li>
                                <li><a href="{{url('/#services')}}" data-scroll="#services">نشاطاتنا الأخيرة</a></li>
                                {{--<li><a href="{{url('/#project')}}" data-scroll="#project">من نحن</a></li>--}}
                                <li><a href="{{url('/#bank')}}" data-scroll="#bank">للتبرع</a></li>
                                <li><a href="{{url('/#contact')}}" data-scroll="#contact">اتصل بنا</a></li>
                                <li><a href="{{url('about')}}" >من نحن</a></li>


                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </header>
        <section class="slider" id="main">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="overlay">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1 text-right">
                                    <h2 class="text-right font-butros">{{$cat->name}}</h2>
                                    <p class="text-right font-butros">
                                       {{$cat->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="background: url('{{asset('storage/app/images/cats/'.$cat->img)}}') no-repeat" class="item active p-t p-b text-right">


                    </div>

                </div>

                <!-- Controls -->
                <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>-->
            </div>
        </section>

        <!--content-->
        <div class="content-project">
            <div class="container">
                <div class="row">
                    @if (count($news)>0)
@foreach($news as $new)
                            <div class="col-md-3 ">
                                <div class="thumbnail">
                                    @php
                                    $path=storage_path().'/app/images/posts/'.$new->img1;
                                    @endphp
                                    @if (is_file($path))
                                  <img  src="{{asset('storage/app/images/posts/'.$new->img1)}}" class="img-responsive img-thumbnail" alt="">'
                                    @endif

                                    <h4 class="text-primary font-butros">{{$new->title}}</h4>
                                    <p class="text-muted font-butros">
                                       {!! $new->excerpt !!}
                                    </p>
                                    <a href="{{url('post/'.$new->id)}}" class="btn btn-block btn-custom font-butros">إقرأ المزيد</a>
                                </div>
                            </div>
    @endforeach

                        @else
                        <h2 class="text-center text-muted font-butros">لا يوجد أخبار في هذا القسم</h2>

                    @endif


                </div>
            </div>
        </div>

        <!--footer-->

    @endsection