@yield('php')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Mobile friendly -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{$setting['name']}}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{$setting['discription']}}" />
    <meta name="keywords" content="{{$setting['keywords']}}" />
    <link rel="stylesheet" href="{{asset('public/theem1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/theem1/css/bs-rtl.css')}}">
    <link rel="stylesheet" href="{{asset('public/theem1/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/theem1/css/font-awesome.min.css')}}">

@yield('css')

</head>
<body>
@yield('content')
<!--footer-->
<div class="footer block">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="nav nav-pills text-center p-t " >
                    @if(!empty($setting['face']))
                        <li><a  href="{{$setting['face']}}"><i   class=" fa fa-facebook fa-1x"></i></a></li>
                    @endif
                    @if(!empty($setting['twit']))
                        <li><a  href="{{$setting['twit']}}"><i  class=" fa fa-twitter fa-1x"></i></a></li>
                    @endif
                    @if(!empty($setting['google']))
                        <li><a  href="{{$setting['google']}}"><i  class=" fa fa-google-plus fa-1x"></i></a></li>
                    @endif
                    @if(!empty($setting['lenk']))
                        <li><a  href="{{$setting['lenk']}}"><i  class=" fa fa-fa-linkedin fa-1x"></i></a></li>
                    @endif
                    @if(!empty($setting['youtube']))
                        <li><a  href="{{$setting['youtube']}}"><i  class=" fa fa-youtube fa-1x"></i></a></li>
                    @endif
                    @if(!empty($setting['telegram']))
                        <li><a  href="{{$setting['telegram']}}"><i  class=" fa fa-send fa-1x"></i></a></li>
                    @endif
                    @if(!empty($setting['whats']))
                        <li><a  href="{{$setting['whats']}}"><i  class=" fa fa-whatsapp fa-1x"></i></a></li>
                    @endif
                </ul>
                {{--<hr style="padding: 0; margin: 0">--}}
            </div>
            {{-- <p class="text-center color-green font-butros">جميع الحقوق محفوظة &copy; 2019
                 --}}{{--<mark><a class="font-butros color-green" href="">شركة SmartSolution</a></mark>--}}{{--
             </p>--}}
        </div>
    </div>
</div>
</main>
<div class="modal fade " id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">فيديو تعريفي</h4>
            </div>
            <div class="modal-body">
                <!-- 4:3 aspect ratio -->
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="{{$setting['contact']}}"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script src="{{asset('public/theem1/js/jquery.js')}}"></script>
<script src="{{asset('public/theem1/js/bootstrap.min.js')}}"></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>--}}
<script src="{{asset('public/theem1/js/waypoints.min.js')}}"></script>
<script src="{{asset('public/theem1/js/jquery.counterup.min.js')}}"></script>
<script>
    /*Counter*/

    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });


    /*Counter*/
</script>
<script src="{{asset('public/theem1/js/main.js')}}"></script>

@yield('js')
</body>