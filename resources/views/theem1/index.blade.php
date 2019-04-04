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
        main.index .projects {
            background: #000 url("{{$imgpro}}") no-repeat;
            background-size: cover;
        }
    </style>
@endsection


@section('content')
    <main class="index">
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
                                <li class="active"><a class="link" href="#" data-scroll="#main">الرئيسية</a></li>
                                <li><a href="#" class="link" data-scroll="#services">نشاطاتنا الأخيرة</a></li>
                                {{--<li><a href="#" class="link" data-scroll="#project">من نحن</a></li>--}}
                                <li><a href="#" class="link" data-scroll="#bank">للتبرع</a></li>
                                <li><a href="#" class="link" data-scroll="#contact">اتصل بنا</a></li>
                                <li><a href="{{url('about')}}">من نحن</a></li>


                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </header>
        <section class="slider block" id="main">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!--<ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>-->

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="overlay">
                        <a href="" class="buton" data-toggle="modal" data-target="#modal"> <img
                                    src="{{asset('public/theem1/images/icon-vedio.png')}}" alt=""></a>
                        <h2 class="font-butros">{{$setting['title_header']}}</h2>
                        <p class="font-butros">{{$setting['description_header']}}</p>
                        <a href="#bank" data-scroll="#bank" class="btn">للتبرع</a>
                        <ul>
                            @if(!empty($main_cats))
                                @foreach($main_cats as $main_cat)
                                    <li>
                                        <a href="{{url('project/'.$main_cat->id)}}">
                                            <div class="text-center">
                                                <div class="circle text-center">
                                                    @php
                                                        $path=storage_path().'/app/images/cats/'.$main_cat->icon;
                                                    @endphp
                                                    @if(is_file($path))
                                                        <img style="max-width:100px; max-height: 100px; margin-bottom: 5px"
                                                             class=""
                                                             src="{{asset('storage//app/images/cats/'.$main_cat->icon)}}"
                                                             alt="{{$main_cat->name}}">

                                                    @endif

                                                </div>
                                                <h4 class="font-butros text-center">{{$main_cat->name}}</h4>
                                            </div>

                                        </a>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <div style="background: url('{{asset('storage/app/images/settings/'.$setting['slide1'])}}') no-repeat"
                         class="item active">


                    </div>
                    <!--#######################-->
                    <div style="background: url('{{asset('storage/app/images/settings/'.$setting['slide2'])}}') no-repeat"
                         class="item">


                    </div>
                    <!--#######################-->
                    <div style="background: url('{{asset('storage/app/images/settings/'.$setting['slide3'])}}') no-repeat"
                         class="item">


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
        <!--end slider-->
        <!--futures-->

        <div class="container fetures block" id="services">
            <div class="row">
                <div class="col-md-12 bg-white p-b">
                    <h2 class="text-center color-green font-butros">نشاطاتنا الأخيرة</h2>
                    <div class="col-md-12">
                        <div class="row">
                            @if(count($posts)>0)
                                @foreach ($posts as $post)
                                    <div class="col-md-4 item-feture">

                                            <div class="image text-center">
                                                <a href="{{url('post/'.$post->id)}}">
                                                <div class="overlay text-center">
                                                    <a class="font-butros" href="{{url('post/'.$post->id)}}"">{{$post->title}}</a>
                                                </div>
                                        </a>
                                                @php
                                                    $path=storage_path().'/app/images/posts/'.$post->img1;
                                                @endphp
                                                @if (is_file($path))
                                            <a href="{{url('post/'.$post->id)}}">
                                                <img src="{{asset('storage/app/images/posts/'.$post->img1)}}"
                                                         class=" p-t p-b" alt="" style="width: 350px; height: 275px">
                                            </a>
                                                @endif
                                            </div>

                                    </div>
                                @endforeach

                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- projects-->
        <div class="projects block" id="project">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="content">
                            <h3 id="num1" class="title num font-butros">{{explode(';',$setting['project1'])[1]}}</h3>
                            <h3 class="font-butros">{{explode(';',$setting['project1'])[0]}}</h3>

                        </div>

                    </div>
                    <div class="col-md-3 text-center">
                        <div class="content">
                            <h3 id="num2" class="title num font-butros">{{explode(';',$setting['project2'])[1]}}</h3>
                            <h3 class="font-butros">{{explode(';',$setting['project2'])[0]}}</h3>

                        </div>

                    </div>
                    <div class="col-md-3 text-center">
                        <div class="content fact">
                            <h3 id="num3"
                                class="title num font-butros fact-amount">{{explode(';',$setting['project3'])[1]}}</h3>
                            <h3 class="font-butros">{{explode(';',$setting['project3'])[0]}}</h3>

                        </div>

                    </div>
                    <div class="col-md-3 text-center">
                        <div class="content">
                            <h3 id="target"
                                class="title timer num font-butros">{{explode(';',$setting['project4'])[1]}}</h3>
                            <h3 class="font-butros">{{explode(';',$setting['project4'])[0]}}</h3>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--pay-->
        <div class="pay block" id="bank">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center color-green">
                        <h2 class="">للتبرع بالدولار</h2>
                        <p style="letter-spacing: 2px">{{$setting['bank']}}</p>

                    </div>
                    <div class="col-md-4 text-center color-green">
                        <h2 class="">للتبرع بالليرة التركية</h2>
                        <p style="letter-spacing: 2px">{{$setting['bank1']}}</p>
                    </div>
                    <div class="col-md-4 text-center color-green">
                        <h2 class="">للتبرع باليورو</h2>
                        <p style="letter-spacing: 2px">{{$setting['bank2']}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--contact us-->
        <div class="contact-us block" id="contact">
            <div class="container bg-white">
                <div class="row">
                    <div class="col-md-12 text-center color-green font-butros">
                        <h2 style="margin: 25px 0">إتصل بنا</h2>
                    </div>
                    <div class="col-md-4 text-center color-green">
                        <i style="font-size: 22px;" class="glyphicon glyphicon-map-marker"></i>
                        <span class="font-butros" style="font-size: 22px">{{$setting['address']}}</span>
                    </div>
                    <div class="col-md-4 text-center color-green">
                        <i style="font-size: 22px;" class="glyphicon glyphicon-phone-alt"></i>
                        <span class="font-butros" style="font-size: 22px">{{$setting['phone']}}</span>
                    </div>
                    <div class="col-md-4 text-center color-green">
                        <i style="font-size: 22px;" class="glyphicon glyphicon-envelope"></i>
                        <span class="font-butros" style="font-size: 22px">{{$setting['email']}}</span>
                    </div>
                    <div class="col-md-12 p-t">
                        <div class="col-md-6 text-center">
                            <form action="{{url('send')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control font-butros" placeholder="الاسم">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control font-butros" placeholder="البريد الإلكتروني">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control font-butros" placeholder="الوصف">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control font-butros"
                                              placeholder="الرسالة"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-green font-butros" value="إرسال">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-center">
                            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12877.564994905415!2d36.7711766!3d36.20568414999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2str!4v1553595905401" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                            {!! $setting['map'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection
        @section('js')
            {{-- <script>

                   /*
                   * counting
                   * */
                   function count(id, num) {
                       var num1 = parseInt($(id).text());
                       $(id).text(0)

                       setInterval(function () {
                           if (parseInt($(id).text()) < num) {
                               $(id).text(parseInt($(id).text()) + 1)
                           }

                       }, 10)
                   }

                   var num1 = parseInt($('#num1').text());
                   $('#num1').text(0);
                   var num2 = parseInt($('#num2').text());
                   $('#num2').text(0);
                   var num3 = parseInt($('#num3').text());
                   $('#num3').text(0);
                   var num4 = parseInt($('#target').text());
                   $('#target').text(0);
                   var i = 0;
                   $(window).scroll(function () {
                       $('.block').each(function () {
                           if ($(window).scrollTop() >= $(this).offset().top) {
                               var BlockId = $(this).attr('id');
                               console.log(BlockId)
                               if (BlockId == "services") {
                                   console.log('ok')
                                   if (i == 0) {
                                       count('#num1', num1)
                                       count('#num2', num2)
                                       count('#num3', num3)
                                       count('#target', num4)
                                       i++;
                                   }
                               }
                           }
                       });
                   });

                   /*
                   * end counting
                   * */


               </script>--}}
            <script src="{{asset('public/theem1/js/jquery.numscroll.js')}}"></script>
            <script>

                /*#####################*/
                var i = 0;
                $(window).scroll(function () {
                    $('.block').each(function () {
                        if ($(window).scrollTop() > $(this).offset().top - 96) {
                            var BlockId = $(this).attr('id');
                            var b = '#' + BlockId;
                            console.log(b)
                            $('ul.nav.navbar-nav > li> a.link[data-scroll="' + b + '"]').parent().addClass('active').siblings().removeClass('active');
                            if (BlockId == "services") {
                                // console.log('ok')
                                if (i == 0) {
                                    /* count('#num1', num1)
                                     count('#num2', num2)
                                     count('#num3', num3)
                                     count('#target', num4)*/
                                    $(".num").numScroll();
                                    var _gaq = _gaq || [];
                                    _gaq.push(['_setAccount', 'UA-36251023-1']);
                                    _gaq.push(['_setDomainName', 'jqueryscript.net']);
                                    _gaq.push(['_trackPageview']);

                                    (function () {
                                        var ga = document.createElement('script');
                                        ga.type = 'text/javascript';
                                        ga.async = true;
                                        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                                        var s = document.getElementsByTagName('script')[0];
                                        s.parentNode.insertBefore(ga, s);
                                    })();
                                    i++;
                                }
                            }
                        }
                    });
                });

                /*3333333333333333333*/

            </script>
@endsection