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

    <main class="projects">
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
                        <!--<a href=""> <img src="images/icon-vedio.png" alt=""></a>-->
                        <h2 class="font-butros">{{$setting['title_header']}}</h2>
                        <p class="font-butros">{{$setting['description_header']}}</p>
                        <!--<a href="#bank" data-scroll="#bank" class="btn">للتبرع</a>-->
                        <ul>
                            @if(!empty($main_cats))
                                @foreach($main_cats as $main_cat)
                                    <li>
                                        <a href="{{url('project/'.$main_cat->id)}}">

                                            <div class="circle">
                                                @php
                                                    $path=storage_path().'/app/images/cats/'.$main_cat->icon;
                                                @endphp
                                                @if(is_file($path))
                                                    <img style="max-width: 100px; max-height: 100px; margin-bottom: 5px; filter:grayScale(0%)!important;"
                                                         class="img-responsive"
                                                         src="{{asset('storage//app/images/cats/'.$main_cat->icon)}}"
                                                         alt="{{$main_cat->name}}">

                                                @endif

                                            </div>
                                            <h4 class="font-butros">{{$main_cat->name}}</h4>
                                        </a>
                                    </li>
                                @endforeach
                            @endif


                        </ul>
                    </div>
                    <div style="background: url('{{asset('storage/app/images/cats/'.$this_cat->img)}}') no-repeat" class="item active">


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
        <!-- description-->
        <div class="description">
            <div class="container bg-white">
                <div class="row p-t shadow">
                    <div class="col-md-3 p-t text-left">
                        @php
                            $path_img1=storage_path().'/app/images/cats/'.$this_cat->icon;
                        @endphp
                        @if(is_file($path_img1))
                            <img
                                    class="img-responsive text-left"
                                    src="{{asset('storage//app/images/cats/'.$this_cat->icon)}}"
                                    alt="{{$this_cat->name}}">

                        @endif

                    </div>
                    <div class="col-md-9 font-butros color-green text-right">
                        <h2>{{$this_cat->name}}</h2>
                        <p class="lead font-butros">
                            {{$this_cat->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--projects item-->
        <div class="project">
            <div class="container bg-white">
                <div class="row">
                    @if (count($cats)>0)
                        @foreach($cats as $cat)
                            <a href="{{url('news/'.$cat->id)}}">
                                <div class="col-md-6 item-project">
                                    <div class="row">

                                        <div class="col-md-4 col-sm-4 p-t text-center">
                                            <div class="circle ">
                                                @php
                                                    $path_img=storage_path().'/app/images/cats/'.$cat->img;
                                                @endphp
                                                @if(is_file($path_img))
                                                    <img
                                                            class="img-responsive"
                                                            src="{{asset('storage//app/images/cats/'.$cat->img)}}"
                                                            alt="{{$cat->name}}">

                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 text-right">
                                            <a class="project-title" href="{{url('news/'.$cat->id)}}"><h2
                                                        class="color-green font-butros  ">{{$cat->name}}</h2></a>
                                            <p class="font-butros color-green">{{$cat->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <h2 class="text-center text-muted font-butros">لم يتم إضافة مشاريع في هذا القسم</h2>
                    @endif


                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    {{$cats->links()}}
                </div>
            </div>
        </div>
        <!--footer-->


@endsection