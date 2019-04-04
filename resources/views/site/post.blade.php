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
    @section('css')
        <style>
            @if($path)
            .hero {
                background-color: #161722;
                background-image: url('{{$path}}');
            }
            @endif
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
                <h1 class="hero-title display-4">{{$cat->name}}</h1>
                <p class="hero-subtitle lead">{{$cat->description}}</p>
                <p class="hero-subtitle lead">عدد المستفيدين من المشروع <br>{{$cat->num_personal}}<br>مستفيد</p>
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
        <!-- Portfolio -->
        <section id="portfolio" class="section portfolio text-center bg-light">
            <div class="container text-center">

                <header class="section-header pb-1 text-center">

                    <p class="section-subtitle text-secondary text-center">

                    </p>
                </header>


            </div>
        </section>
        <!-- //Portfolio -->
<!--- Carosule----->
        <section class="car">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @php
                                $i=0;
                                    $img=[];
                                    $path1=storage_path().'/app/images/posts/'.$post->img1;
                                    $path2=storage_path().'/app/images/posts/'.$post->img2;
                                    $path3=storage_path().'/app/images/posts/'.$post->img3;
                                if(is_file($path1)){$img[]=asset('storage/app/images/posts/'.$post->img1);}
                                if(is_file($path2)){$img[]=asset('storage/app/images/posts/'.$post->img2);}
                                if(is_file($path3)){$img[]=asset('storage/app/images/posts/'.$post->img3);}
                                @endphp
                                @foreach($img as $im)
                                <div class="carousel-item {{($i==0)?'active':''}}">
                                    <img  src="{{$im}}" class="d-block w-100 " style=" height:400px; max-height: 400px " alt="...">
                                </div>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!--- //Carosule----->
    <!-- Services -->
    <section id="services" class="section services text-center bg-dark pt-5 pb-5">
        <div class="container">

            <div class="section-body mt-4 mb-4">
                <div class="row">


                                <div class="col-sm-12 col-md-12 servicesr bg-transparent" >

                                            <div class="content text-right">
                                                <h1>{{$post->title}}</h1>
                                                <hr>
                                                <p class="lead">{!! $post->post !!}

                                                </p>
                                            </div>

                                </div>
                                <!--- end news -->








                </div>
            </div>


        </div>
    </section>
    <!-- //Services -->






    <!-- Portfolio -->
    <section id="portfolio" class="section portfolio text-center bg-light">
        <div class="container text-center">

            <header class="section-header pb-3 text-center">
@if(!empty($post->url))
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{$post->url}}" allowfullscreen></iframe>
                </div>
                    <hr>
    @endif
    @php
        $path4=storage_path().'/app/images/posts/'.$post->img4;

    @endphp
                @if (is_file($path4))
        <div class="mt-1">
            <iframe class="embed-responsive-item" src="{{asset('storage/app/images/posts/'.$post->img4)}}" allowfullscreen></iframe>
        </div>
                @endif

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