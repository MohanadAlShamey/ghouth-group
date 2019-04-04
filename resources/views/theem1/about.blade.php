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
@section('css')
    <style>
       .ab{
         
           background-color: #D2CCDE;

       }
        .about-me{
position: relative;
            top: 20px;
            margin-bottom: 40px;
            padding: 10px;
        }
       .about-me img{
           max-width: 100%;
           margin: 20px  auto;
           /*margin-top: 20px;*/
       }
    </style>

@endsection

@section('content')
<main class="ab">
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
    <!--content-->
<div class="about-me">
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                @php
                $path=storage_path().'/app/images/settings/'.$setting['about'];
                @endphp
                @if (is_file($path))
                    <img class="img-responsive" src="{{asset('storage/app/images/settings/'.$setting['about'])}}" alt="">
                    @else
                    <img src="{{asset('storage/app/images/settings/'.$setting['logo'])}}" alt="">
                @endif

            </div>
        </div>
    </div>
</div>
    @endsection