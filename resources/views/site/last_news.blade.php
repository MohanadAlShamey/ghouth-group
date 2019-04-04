@extends('site.layouts.app')
@section('php')
    @php
        $settings=\App\Setting::all();
        $setting=[];
        foreach ($settings as $s){
        $setting[$s->name]=$s->value;
        }
    @endphp

@stop
@section('css_main')
    <!-- Loaders CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/loaders.min.css')}}"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/bootstrap.min.css')}}"/>

    <!-- Headroom CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/headroom.min.css')}}"/>

    <!-- Ionicons Font Icons -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/ionicons.min.css')}}"/>

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/style.min.css')}}"/>

    <!-- Scheme CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/style-dark.min.css')}}"/>

    <!-- Color CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/color/yellow.min.css')}}"/>

    <!-- Sparky CSS Plugin -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/sparky.css')}}"/>

    <!-- Add Your Custom Styles Here -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/custom.min.css')}}"/>
    <style>
        .servicesr {
            padding: 0;
            margin: 0;

            margin-top: 3px;

            background: yellow;
        }
        .servicesr .content{
            width: 90%;
            padding: 24px;
            margin: auto;
        }
        .servicesr div img{
            min-height: 100% !important;
        }

    </style>
    @stop
@section('content')
    <!--[if lt IE 9]>
    <p class="alert alert-warning font-weight-bold text-center rounded-0 fixed-top">أنت تستخدم متصفحا
        <strong>قديم</strong>.
        يرجى <a href="http://outdatedbrowser.com/ar">ترقية المتصفح</a> لتصفح أفضل للموقع.</p>
    <![endif]-->


    <!-- Preloader -->
    <div id="preloader" class="preloader d-flex justify-content-center align-items-center">
        <div class="preloader-item ball-pulse-sync">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- //Preloader -->

    <!-- Header -->
    <header id="header" class="header fixed-top">
        <nav id="navbar" class="header-navbar navbar navbar-expand-lg  navbar-dark bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{url('/home')}}">
                    <img class="logo" src="{{asset('/storage/app/images/settings/'.$setting['logo'])}}" alt="{{$setting['name']}}" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation" aria-expanded="false" aria-label="قائمة التصفح">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navigation">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}#hero">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}#facts">مشاريعنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}#services">من نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}#contact">إتصل بنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/last_news')}}">آخر الأخبار</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- //Header -->

    <!-- Hero -->
    <section id="hero" class="hero d-flex justify-content-center align-items-center flex-column text-center bg-dark">

        <div class="hero-body">
            <div class="container">
                <h1 class="hero-title display-4">{{$setting['title_header']}}</h1>
                <p class="hero-subtitle lead">{{$setting['description_header']}}</p>
                {{--<a id="hero-cta" class="hero-btn btn btn-outline-primary btn-lg" href="{{url('/')}}#bank">للتبرع</a>--}}

        </div>
        </div>

        <div class="hero-footer">
            <div class="hero-scroll">
                <a class="mouse" href="#services">
                    <i class="mouse-finger"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- //Hero -->


    <!-- Services -->
    <section id="services" class="section services text-center bg-dark pt-5 pb-5">
        <div class="container">

            <div class="section-body mt-4 mb-4">
                <div class="row">
                    @if (!empty($posts))
                        @php
                           $i=1;
                        @endphp
                        @foreach($posts as $post)
                            @php
                                $background="#958771";
                                if ($i%2==0 &&$i%4!=0){
                                $background="#2c2f3b";


                                }elseif($i%3==0 || $i%7==0){
                                 $background="#0f303e";
                                }elseif($i%4==0){
                                 $background="#e3982d";
                                }
                            $i++;
                            @endphp
                            <!---Start news------>

                                <div class="col-sm-12 col-md-6 servicesr" style="background: {{$background}}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="content text-right">
                                                <h5>{{$post->title}}</h5>
                                                <p><small>{{$post->excerpt}}</small>
                                                    <br><span style="    line-height: 3.5;"><a href="{{url('/post/'.$post->id)}}">إقرأ المزيد...</a></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                           @php
                                           $path=storage_path().'/app/images/posts/'.$post->img1;
                                           if (is_file($path)){
                                           $path=asset('storage/app/images/posts/'.$post->img1);
                                           }else{
                                           $path=asset('public/img/image.png');
                                           }
                                           @endphp
                                            <img class="img-responsive w-100" src="{{$path}}" alt=""/>
                                        </div>
                                    </div>
                                </div>
                                <!--- end news -->

                            @endforeach
                    @endif






                </div>
            </div>


        </div>
    </section>
    <!-- //Services -->






    <!-- Portfolio -->
    <section id="portfolio" class="section portfolio text-center bg-light">
        <div class="container text-center">

            <header class="section-header pb-3 text-center">

                <p class="section-subtitle text-secondary text-center">
{{$posts->links()}}
                </p>
            </header>


        </div>
    </section>
    <!-- //Portfolio -->



@endsection
@section('js')
    <script>
        $(function(){
            $('.servicesr div img').innerHeight('248px');
        })
    </script>
@stop