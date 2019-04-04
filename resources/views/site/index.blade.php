@extends('site.layouts.app')
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

@stop
@section('css_main')
    <!-- Loaders CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/loaders.min.css')}}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/bootstrap.min.css')}}" />

    <!-- Headroom CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/headroom.min.css')}}" />

    <!-- Ionicons Font Icons -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/ionicons.min.css')}}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/style.min.css')}}" />

    <!-- Scheme CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/style-dark.min.css')}}" />

    <!-- Color CSS -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/color/yellow.min.css')}}" />

    <!-- Sparky CSS Plugin -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/sparky.css')}}" />

    <!-- Add Your Custom Styles Here -->
    <link rel="stylesheet" href="{{asset('public/site/assets/css/custom.min.css')}}" />
    <style>

        .facts {
            background-color: #161722;
            background-image: url('{{$imgpro}}');
        }
    </style>
@stop
@section('content')
    <!--[if lt IE 9]>
<p class="alert alert-warning font-weight-bold text-center rounded-0 fixed-top">أنت تستخدم متصفحا <strong>قديم</strong>.
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
                        <a class="nav-link" href="#hero">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#facts">مشاريعنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">من نحن</a>
                   </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">إتصل بنا</a>
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
            <a id="hero-cta" class="hero-btn btn btn-outline-primary btn-lg" href="#bank">للتبرع</a>
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

                        <div class="col-sm-12 col-md-12">
                            <div class="service">

                                <h3 class="service-title text-white">من نحن</h3>
                                <p class="service-description text-secondary">
                                  {{$setting['discription']}}
                                </p>
                            </div>
                        </div>




            </div>
        </div>

        <footer class="section-footer mt-5 mb-4 mr-auto">

            <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">

                <p class="h5">تود المساهمة ودعم مشاريعنا</p>
                <a id="services-cta" href="home#contact" class="btn btn-outline-primary btn-lg">إتصل بنا</a>
            </div>
        </footer>

    </div>
</section>
<!-- //Services -->




<!-- Facts -->
<section id="facts" class="section facts text-center pt-5 pb-5 bg-dark">
    <div class="container">

        <div class="section-body">
            <div class="row">
@php
$num=0;
@endphp
                @if(!empty($proj))
@foreach($proj as $pro)
                <div class="col-6 col-md-3">
                    <a class="text-white" href="{{url('/categories/'.$pro->id)}}">
                    <div class="fact">
                       <small class="fact-label h4">{{$pro->name}}</small>
                        <p class="fact-amount h1 display-3">{{$pro->num_personal}}</p>
                        <small class="fact-label h4">مستفيد</small>
                    </div>
                    </a>
                </div>
                        @php
                            $num++;
                        @endphp
    @if($num==4)
            </div>
            <hr style="border:1px solid rgba(255,255,255,.4);"/>
            <div class="row">
        @endif
@endforeach
@endif



            </div>


        </div>

    </div>
</section>
<!-- //Facts -->


    <!-- Bank -->
    <section id="bank" class="section contact text-center bg-light">
        <div class="container">

            <header class="section-header pb-3">
                <h3 class="section-title text-dark">حسابنا البنكي</h3>

                <p class="section-subtitle  text-secondary" style="font-size:3rem;">
                   <span class="ion-cash " ></span> <small>{{$setting['bank']}}</small>
                </p>
            </header>

            <hr>
        </div>
    </section>
    <!-- //Bank -->

<!-- Contact -->
<section id="contact" class="section contact text-center bg-light">
    <div class="container">

        <header class="section-header pb-3">
            <h3 class="section-title text-dark">إتصل بنا</h3>
            <p class="section-subtitle text-secondary">
                {{$setting['contact']}}
            </p>
        </header>

        <div class="section-body pt-3">
            <div class="row">

                <div class="col-md-12">
                    <div class="contact-info mb-3 pb-3">
                        <div class="row">


                            <div class="col-sm-6 col-md-4">
                                <div class="contact-item contact-location d-flex justify-content-center align-items-center">
                                    <div class="contact-icon text-dark"><i class="ion-ios-location"></i></div>
                                    <p class="contact-content text-right text-secondary">{!! str_replace('-','<br>',$setting['address']) !!}</p>
                                </div>
                            </div>


                            <div class="col-sm-6 col-md-4">
                                <div class="contact-item contact-phone d-flex justify-content-center align-items-center">
                                    <div class="contact-icon text-dark"><i class="ion-ios-telephone"></i></div>
                                    <p class="contact-content text-secondary ltr">{{$setting['phone']}}</p>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="contact-item contact-email d-flex justify-content-center align-items-center">
                                    <div class="contact-icon text-dark"><i class="ion-ios-email"></i></div>
                                    <p class="contact-content text-secondary">{{$setting['email']}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form  class="contact-form"
                          action="{{url('send')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="contact-field form-control form-control-lg rounded-0" type="text"
                                       required="" name="name" placeholder="الإسم">
                            </div>
                            <div class="form-group col-md-6">
                                <input class="contact-field form-control form-control-lg rounded-0" type="email"
                                       required="" name="email" placeholder="بريدك إلكتروني">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="contact-field form-control form-control-lg rounded-0" type="text" required=""
                                   name="subject" placeholder="الموضوع">
                        </div>
                        <div class="form-group">
                            <textarea class="contact-field form-control form-control-lg rounded-0" required=""
                                      name="message" placeholder="رسالة" rows="4"></textarea>
                        </div>
                        <button type="submit" class="contact-submit btn btn-primary btn-block btn-lg rounded-0">أرسل
                        </button>
                    </form>
                </div>

                <div class="col-lg-6">
                    {!! $setting['map'] !!}
                </div>

            </div>
        </div>
    </div>
</section>
<!-- //Contact -->







@endsection