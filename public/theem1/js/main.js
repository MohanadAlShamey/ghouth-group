$(function(){




    $('main.index ul.navbar-nav>li').click(function(){
        $(this).addClass('active').siblings().removeClass('active')
    });
    var h=$('header.nav-top').height();
    // console.log(h)
    $('body').css('paddingTop',h)


    $('main.index ul.nav.navbar-nav > li> a.link ,.slider .overlay>a').click(function(e){
        e.preventDefault();
        var data=$(this).data('scroll');
        // console.log(data);

      $('html,body').animate({
         scrollTop:$(data).offset().top-h
      },1000)

        // console.log($(data).offset().top)
        // console.log($('#project').offset().top)
        // console.log(scrollY)
    })
    $('#modal').on('shown.bs.modal', function () {

    })
    $('.carousel').carousel({
        interval: 6000
    })
    //counter





});