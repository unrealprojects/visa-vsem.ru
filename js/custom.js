(function($){
    $(document).ready(function(){
/*        $('#main').parallax("0%", 0.3);
        $('#features').parallax("0%", -0.3);
        $('#steps').parallax("0%", -0.3);
        $('#order').parallax("0%", -0.5);
        $('#contacts').parallax("0%", -0.5);*/

        $("html").niceScroll({cursorcolor:"rgb(255,255,255)",cursorwidth:'6',cursorborderradius:'0',cursorborder:'none',zindex:"9999"});
        $('#main .stock input').mask('(999) 999-99-99');
        $('.inner_order input').mask('(999) 999-99-99');
        /* При скроле */

        $('.carousel').carousel({
            interval: 15000
        });

        if($(window).height()>$(window).width()){
            var prop = $(window).height()/$(window).width();
            $('.site-wrapper').css('background-size','150%');
        }


        if($(window).width()>950){
            startScroll=$(window).scrollTop();
            work=false;

            $(window).on('scroll',function(){
                currentScroll=$(window).scrollTop();
                console.log(currentScroll+" "+startScroll);
                if(currentScroll>(startScroll+1) && work==false){

                    work=true;
                    scroll=Math.ceil((currentScroll+100)/$(window).height())*$(window).height();

                    $.scrollTo(scroll,400,{onAfter:function(){
                        setTimeout(function(){
                            startScroll=$(window).scrollTop()-2;
                            currentScroll=$(window).scrollTop()-2;
                            work=false;
                            console.log(currentScroll+" "+startScroll);
                        },200);

                    }});

                }else{
                    if(currentScroll<(startScroll-1) && work==false){
                        work=true;
                        scroll=Math.floor((currentScroll-1)/$(window).height())*$(window).height();

                        $.scrollTo(scroll,400,{onAfter:function(){
                            setTimeout(function(){
                                startScroll=$(window).scrollTop();
                                currentScroll=$(window).scrollTop();
                                work=false;
                                console.log(currentScroll+" "+startScroll);
                            },200);
                        }});
                     }
                }
                return false;
            });
        }

//
        if($(window).width()>950 && work==false){
            $(window).on('scroll',function(){

                var scrollCurrent=$(window).scrollTop();

                if((scrollCurrent>=($(window).height()-20) && scrollCurrent<(2*$(window).height())-20)
                    || (scrollCurrent>=(3*$(window).height()-20) && scrollCurrent<(4*$(window).height())-20)
                    || (scrollCurrent>=(5*$(window).height()-20) && scrollCurrent<(6*$(window).height())-20)
                    ){
                    $('.logo').attr('src','img/logo_darkgray.png');
                    $('.phone').css({'background-image':'url("/img/phone_darkgray.png")'});
                    $('.navbar-default .navbar-nav>li>a,.navbar-right bold').css({'color':'#292929'});
                    //              $('.navbar-default .navbar-nav>li.active>a').css({'borderBottom':'2px solid gray'});
                    $('#menu li').removeClass('active_gray');
                    $('.active').addClass('active_gray');


                }else{
                    $('.logo').attr('src','img/logo_white.png');
                    $('.phone').css({'background-image':'url("/img/phone.png")'});
                    $('.navbar-default .navbar-nav>li>a,.navbar-right bold').css({'color':'#fff'});
                    $('#menu li').removeClass('active_gray');
                }
                $(window).height();
            });
        }


//      Инициализация карт
        function initialize() {
            var myLatlng = new google.maps.LatLng(55.7155762, 37.5497542);
            var myOptions = {
                zoom: 16,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_BOTTOM
                },
                mapTypeControl: false,
//                mapTypeControlOptions: {
//                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
//                    position: google.maps.ControlPosition.LEFT_BOTTOM
//                },
                scaleControl: false,
                panControl: false
            };

            var map = new google.maps.Map(document.getElementById("contacts_map"), myOptions);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title:"Hello World!"
            });
        }
        initialize();
        $('#contacts_map').width($(window).width());
        $('#contacts_map').height($(window).height());

        $('body').scrollspy({ target: '.navbar' });

        $('ul.nav li a, .bottom_button a, .navbar-right a, a.logo_wrap').click(function(){
            work=true;
            $.scrollTo($(this).attr('href'),400,{onAfter:function(){
                setTimeout(function(){
                    work=false;
                    startScroll=$(window).scrollTop();
                    currentScroll=$(window).scrollTop();
                },100);

            }});
            return false;
        });


        $(window).resize(function(){
            $('#contacts_map').width($(window).width());
            $('#contacts_map').height($(window).height());
        });



    });
})(jQuery);