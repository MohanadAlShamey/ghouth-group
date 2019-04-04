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
        .social {
            display: inline-block;
        }

        .social img {
            display: inline-block;
        }
    </style>

@endsection




@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.2"></script>
    <main class="new">
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
        <div class="content-new">
            <div class="container ">
                <div class="row content-once">
                    <div class="col-md-8 ">
                        <div class=" thumbnail">
                            <h4 class="text-right font-butros color-green"
                                style="display: inline-block;padding: 0px 10px; border-bottom:2px solid #c3c3c3">{{$post->title}}
                            </h4>
                            @php
                                $path=storage_path().'/app/images/posts/'.$post->img1;
                            @endphp
                            @if (is_file($path))
                                <img src="{{asset('storage/app/images/posts/'.$post->img1)}}"
                                     class="img-responsive p-t p-b" alt="">
                            @endif
                            <div style="padding: 0px 10px">
                                <p class="text-justify font-butros text-muted">
                                    {!! $post->post !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row p-t p-b">
                                        <div class="col-md-12 text-center">
                                            <div>
                                                @if(!empty($setting['youtube']))
                                                    <a title="Youtube" href="{{$setting['youtube']}}" class="social">
                                                        <img class="icon img-responsive"
                                                             src="{{asset('public/theem1/images/youtube-icon.png')}}"
                                                             alt="">
                                                    </a>
                                                @endif
                                                @if(!empty($setting['telegram']))
                                                    <a title="Telegram" href="{{$setting['telegram']}}" class="social">
                                                        <img class="icon img-responsive"
                                                             src="{{asset('public/theem1/images/telegram-icon.png')}}"
                                                             alt="">
                                                    </a>
                                                @endif
                                                @if(!empty($setting['whats']))
                                                    <a title="WhatsApp" href="{{$setting['whats']}}" class="social">
                                                        <img class="icon img-responsive"
                                                             src="{{asset('public/theem1/images/whatsapp-icon.png')}}"
                                                             alt="">
                                                    </a>
                                                @endif
                                                @if(!empty($setting['twit']))
                                                    <a title="Twitter" href="{{$setting['twit']}}" class="social">
                                                        <img class="icon img-responsive"
                                                             src="{{asset('public/theem1/images/twitter-icon.png')}}"
                                                             alt="">
                                                    </a>
                                                @endif
                                                @if(!empty($setting['face']))
                                                    <a title="FaceBook" href="{{$setting['face']}}" class="social">
                                                        <img class="icon img-responsive"
                                                             src="{{asset('public/theem1/images/facebook-icon.png')}}"
                                                             alt="">
                                                    </a>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="twitt">
                                       {{-- <a class="twitter-timeline" href="{{$setting['twit']}}"></a>
                                        <script async src="https://platform.twitter.com/widgets.js"
                                                charset="utf-8"></script>
--}}

                                        <div class="fb-page" data-href="{{$setting['face']}}" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.comm/Gauth.Voluntary.Complex" class="fb-xfbml-parse-ignore"><a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.facebook.comm%2FGauth.Voluntary.Complex%3Ffbclid%3DIwAR3eHdDwKDohPpPct6LZHegnosvEX0sGa3G7CxXXv0FfXEFcIAN63O4cM2c&amp;h=AT1QnwLK-Fdtyb6myecE8SWl0u9KPaJ2KVvDVgcWjro-A6SsbXF_X_3iJvXKBwojQJ90gKLvaq0kozt2yP2i4-WScWclvGLhFlDzmaH0OH0aOFbCCMAVmWLnrxgpXM4h9tkCDw" target="_blank" rel="noopener nofollow" data-lynx-mode="asynclazy">‏تجمع غوث التطوعي G.V.C‏</a></blockquote></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="rwo">
                                        @if(!empty($main_cats))
                                            @foreach($main_cats as $main_cat)
                                                <div class="col-xs-3 cat text-center">
                                                    <a href="{{url('project/'.$main_cat->id)}}">

                                                        <div class="circle">
                                                            @php
                                                                $path=storage_path().'/app/images/cats/'.$main_cat->icon;
                                                            @endphp
                                                            @if(is_file($path))
                                                                <img style="max-width: 100px; max-height: 100px; margin-bottom: 5px"
                                                                     class="img-responsive"
                                                                     src="{{asset('storage//app/images/cats/'.$main_cat->icon)}}"
                                                                     alt="{{$main_cat->name}}">

                                                            @endif
                                                        </div>
                                                        <h5 class="font-butros">{{$main_cat->name}}</h5>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bank text-center p-t p-b">
                            <h5 class="font-butros">للتبرع بالدولار</h5>
                            <p class="font-butros">{{$setting['bank']}}</p>
                            <h5 class="font-butros">للتبرع بالليرة التركية</h5>
                            <p class="font-butros">{{$setting['bank1']}}</p>
                            <h5 class="font-butros">للتبرع باليورو</h5>
                            <p class="font-butros">{{$setting['bank2']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--images-->
        <div class="img-new">
            <div class="container">
                <div class="row bg-white p-t p-b">
                    @if(trim($post->url)!="")
                        <div class="col-md-6">
                            <div class="thumbnail embed-responsive embed-responsive-4by3">
                                <iframe src="{{$post->url}}" frameborder="0"></iframe>
                            </div>
                        </div>
                    @endif
                    @php
                        $img1=storage_path().'/app/images/posts/'.$post->img2;
                    @endphp
                    @if (is_file($img1))
                        <div class="col-md-6">
                            <div class="thumbnail">

                                <img src="{{asset('storage/app/images/posts/'.$post->img2)}}" alt="">
                            </div>
                        </div>
                    @endif

                </div>

                <div class="row bg-white p-t p-b">
                    @php
                        $img2=storage_path().'/app/images/posts/'.$post->img3;
                    @endphp
                    @if (is_file($img2))
                        <div class="col-md-6">
                            <div class="thumbnail">
                                <img class="img-responsive" src="{{asset('storage/app/images/posts/'.$post->img3)}}"
                                     alt="">
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="row">
                            @php
                                $img3=storage_path().'/app/images/posts/'.$post->img4;
                            @endphp
                            @if (is_file($img3))
                                <div class="col-md-6">
                                    <div class="thumbnail">
                                        <img class="img-responsive"
                                             src="{{asset('storage/app/images/posts/'.$post->img4)}}" alt="">
                                    </div>
                                </div>
                            @endif

                            @php
                                $img4=storage_path().'/app/images/posts/'.$post->img5;
                            @endphp
                            @if (is_file($img4))
                                <div class="col-md-6">
                                    <div class="thumbnail">
                                        <img class="img-responsive"
                                             src="{{asset('storage/app/images/posts/'.$post->img5)}}" alt="">
                                    </div>
                                </div>
                            @endif


                        </div>
                        <div class="row">
                            @php
                                $img5=storage_path().'/app/images/posts/'.$post->img6;
                            @endphp


                            @if (is_file($img5))
                                <div class="col-md-6">
                                    <div class="thumbnail">
                                        <img class="img-responsive"
                                             src="{{asset('storage/app/images/posts/'.$post->img6)}}" alt="">
                                    </div>
                                </div>
                            @endif

                            @php
                                $img6=storage_path().'/app/images/posts/'.$post->img7;
                            @endphp
                            @if (is_file($img6))
                                <div class="col-md-6">
                                    <div class="thumbnail">
                                        <img class="img-responsive"
                                             src="{{asset('storage/app/images/posts/'.$post->img7)}}" alt="">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->

@endsection