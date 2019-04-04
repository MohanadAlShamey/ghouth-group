@yield('php')
<!DOCTYPE html>

<html dir="rtl" lang="ar">


<!-- Mirrored from picalica.trillim.co/pixel/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 12:09:47 GMT -->
<head>
    <!-- Set encoding to UTF-8 -->
    <meta charset="utf-8" />

    <!-- Mobile friendly -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>{{$setting['name']}}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{$setting['discription']}}" />
    <meta name="keywords" content="{{$setting['keywords']}}" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
@yield('css_main')

    <style>
        .hero {
            background-color: #161722;
            background-image: url('{{asset('storage/app/images/settings/'.$setting['img'])}}');
        }
        @font-face {
            font-family: 'jannah';
            src: url("{{asset('public/JannaLT-Regular.ttf')}}");

        }
        *{
            font-family: jannah !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">

@yield('css')
</head>

<body>
@yield('content')
<!-- Footer -->
<footer id="footer" class="footer text-center pt-5 pb-3 bg-dark">
    <div class="container">

        <div class="row align-items-center">




            <div class="col-lg-12 text-center">
                <ul class="footer-social list-inline">
                    @if(!empty($setting['face']))
                        <li class="list-inline-item">
                            <a class="footer-social-link bg-facebook-hover" target="_blank" href="{{$setting['face']}}"><i
                                        class="ion-social-facebook"></i></a>
                        </li>
                    @endif
                    @if(!empty($setting['twit']))
                        <li class="list-inline-item">
                            <a class="footer-social-link bg-twitter-hover" target="_blank"
                               href="{{$setting['twit']}}"><i class="ion-social-twitter"></i></a>
                        </li>
                    @endif
                    @if(!empty($setting['google']))
                        <li class="list-inline-item">
                            <a class="footer-social-link bg-youtube-hover" target="_blank"
                               href="{{$setting['google']}}"><i class="ion-social-google"></i></a>
                        </li>
                    @endif
                    @if(!empty($setting['lenk']))
                        <li class="list-inline-item">
                            <a class="footer-social-link bg-facebook-hover" target="_blank" href="{{$setting['lenk']}}"><i
                                        class="ion-social-linkedin"></i></a>
                        </li>
                    @endif
                    @if(!empty($setting['youtube']))
                        <li class="list-inline-item">
                            <a class="footer-social-link bg-youtube-hover" target="_blank"
                               href="{{$setting['youtube']}}"><i class="ion-social-youtube"></i></a>
                        </li>
                    @endif
                        @if(!empty($setting['telegram']))
                            <li class="list-inline-item">
                                <a class="footer-social-link bg-twitter-hover" target="_blank"
                                   href="{{$setting['telegram']}}"><i class="ion-paper-airplane"></i></a>
                            </li>
                        @endif
                        @if(!empty($setting['whats']))
                            <li class="list-inline-item">
                                <a class="footer-social-link bg-facebook-hover" target="_blank"
                                   href="{{$setting['whats']}}"><i class="ion-social-whatsapp"></i></a>
                            </li>
                        @endif

                </ul>
            </div>

        </div>

        <hr>
        <div class="text-center">
            <small class="footer-copyright">&copy; جميع الحقوق محفوظة. منتج ابداعي طوره <a href="https://t.me/smartsolutions1">شركة
                    Smart Solutions</a></small>
        </div>

    </div>
</footer>
<!-- //Footer -->
<!-- jQuery -->
<script src="{{asset('public/site/assets/js/jquery.min.js')}}"></script>

<!-- Popper.js -->
<script src="{{asset('public/site/assets/js/popper.min.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{asset('public/site/assets/js/bootstrap.min.js')}}"></script>

<!-- Headroom JS -->
<script src="{{asset('public/site/assets/js/headroom.min.js')}}"></script>

<!-- Main JavaScript -->
<script src="{{asset('public/site/assets/js/main.min.js')}}"></script>

<!-- Add Your Custom JS Code Here -->
<script src="{{asset('public/site/assets/js/custom.js')}}"></script>

<script>
    // Initialize Headroom
    new Headroom($('#header')[0]).init();
</script>


<!-- Sparky -->
<!-- <div class="sparky">
    <div class="sparky__icon"></div>
    <div class="sparky__section">
        <p class="sparky__title">لون الأزرار</p>
        <ul class="sparky__colors">
            <li class="sparky__color" data-sparky-color="#2979FF" data-sparky-url="assets/css/color/blue.min.css"></li>
            <li class="sparky__color" data-sparky-color="#4CAF50" data-sparky-url="assets/css/color/green.min.css"></li>
            <li class="sparky__color" data-sparky-color="#FF9100" data-sparky-url="assets/css/color/orange.min.css"></li>
            <li class="sparky__color" data-sparky-color="#F06292" data-sparky-url="assets/css/color/pink.min.css"></li>
            <li class="sparky__color" data-sparky-color="#EF5350" data-sparky-url="assets/css/color/red.min.css"></li>
        </ul>
    </div>
</div> -->
<!-- //Sparky -->

<!-- Sparky jQuery Plugin -->
<script src="{{asset('public/site/assets/js/jquery.sparky.js')}}"></script>
@yield('js')
</body>

<!-- Mirrored from picalica.trillim.co/pixel/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 12:10:18 GMT -->
</html>
