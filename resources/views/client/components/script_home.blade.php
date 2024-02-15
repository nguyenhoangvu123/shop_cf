<script src="{{ asset('client/js/owl.carousel.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $('#top').fadeIn();
            } else {
                $('#top').fadeOut();
            }
        });
        $('#top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });
    });
</script>
<script src="{{ asset('client/js/toc.js') }}"></script>
<script>
    function goToByScroll(id) {
        var offsetMenu = 0;
        id = id.replace("#", "");
        $('html,body').animate({
            scrollTop: $("#" + id).offset().top - (offsetMenu * 2) - 100
        }, 'slow');
    }

    function goToByScrollbottom(id) {
        var offsetMenu = 0;
        id = id.replace("#", "");
        $('html,body').animate({
            scrollTop: $("#" + id).offset().top
        }, 'slow');
    }

    if ($(".toc-list").length) {
        $(".toc-list").toc({
            content: "div#toc-content",
            headings: "h2,h3,h4"
        });
        if (!$(".toc-list li").length) $(".meta-toc").hide();
        $('.toc-list').find('a').click(function() {
            var x = $(this).attr('data-rel');
            goToByScroll(x);
        });
    }
    jQuery(document).ready(function() {
        // show
        $('.menu_content_fix_icon').click(function() {
            $('.menu_content_fix').css({
                'right': '0px',
                'z-index': '999999'
            });
            $('.menu_content_fix_icon').css({
                'display': 'none'
            });
        });
        // close
        $(".menu_content_close").click(function() {
            $('.menu_content_fix').css({
                'right': '-320px',
                'z-index': '999999'
            });
            $('.menu_content_fix_icon').css({
                'display': 'block'
            });
        });
        // move and close
        $(".menu_content_fix_content a").click(function() {
            $(".menu_content_close").trigger("click");
        });
        // icon mobile
        if ($(window).width() < 992) {
            $('.menu_content_fix_icon').css({
                'width': '25px',
                'height': '25px',
                'right': '-25px'
            });
            $('.menu_content_fix_icon .fa').css({
                'font-size': '16px'
            });
        }
        $(".click_show_menu").click(function() {
            if ($('.meta-toc').hasClass('hidden')) {
                $(".meta-toc").removeClass('hidden');
                $(".click_show_menu .fa").removeClass('fa-caret-down');
                $(".click_show_menu .fa").addClass('fa-caret-up');
            } else {
                $(".meta-toc").addClass('hidden');
                $(".click_show_menu .fa").removeClass('fa-caret-up');
                $(".click_show_menu .fa").addClass('fa-caret-down');
            }
        });
    });
</script>

<link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/jquery.simplyscroll.css') }}">
<script type="text/javascript" src="{{ asset('client/js/jquery.simplyscroll.js') }}"></script>
<script type="text/javascript">
    (function($) {
        $(function() {
            $(".scroller6").simplyScroll({
                orientation: 'vertical',
                customClass: 'vert'
            });
            $(".scrollerdt").simplyScroll({
                orientation: 'vertical',
                customClass: 'vert1'
            });
        });
    })(jQuery);
</script>

<script type="text/javascript" src="{{ asset('client/js/jquery.mmenu.min.all.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('nav#menu').mmenu();
    });
</script>
<script type="text/javascript" src="{{ asset('client/js/jquery.easy-autocomplete.js') }}"></script>
<script type="text/javascript">
    $().ready(function() {
        var options = {
            url: function(phrase) {
                return "ajax/autocomplete.php?key=" + phrase;
            },
            getValue: "ten_vi",
            template: {
                type: "custom",
                method: function(value, item) {
                    let txt_gia = '';
                    if (parseInt(item.giaban) > 0) {
                        txt_gia = number_format(item.giaban, 0, ',', '.') + '  đ';
                    } else {
                        txt_gia = 'Liên hệ';
                    }
                    var temp = '<div class="item_auto"><div class="img"><a href="thiet-ke-kien-truc/' +
                        item.tenkhongdau + '-' + item.id +
                        '.html"><img src="thumb/70x52/2/upload/baiviet/' + item.thumb +
                        '" alt=""></a></div><div class="info"><div class="name"><a href="thiet-ke-kien-truc/' +
                        item.tenkhongdau + '-' + item.id + '.html">' + item.ten + '</a></div>';
                    temp += '</div></div><div class="clearfix"></div></div>';
                    return temp;
                }
            },
            list: {
                onKeyEnterEvent: function() {
                    var index = $("#keyword").getSelectedItemIndex();
                    var url_pro = $(".easy-autocomplete-container").find('ul li').eq(index).find(
                        '.item_auto .img a').attr('href');
                    location.href = url_pro;
                }
            }
        };
        $("#keyword").easyAutocomplete(options);
        $(document).click(function(event) {
            if (!$(event.target).is(".auto_search, #keyword")) {
                $(".auto_search").hide();
            }
        });
    })
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154715824-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-154715824-1');
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function(event) {
            $getheight = $('.header').height();
            if ($(window).scrollTop() > $getheight) {
                $('.header').addClass('fix_header');
            } else {
                $('.header').removeClass('fix_header');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.add_to_basket2', function() {
            var pid = $(this).attr('rel');
            $.ajax({
                type: "POST",
                url: "ajax/add_giohang.php",
                data: "pid=" + pid,
                dataType: 'json',
                success: function(data) {
                    window.location = "gio-hang.html";
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', 'a.add-to-cart', function() {
            var pid = $(this).attr('rel');
            $.ajax({
                type: "POST",
                url: "ajax/add_giohang.php",
                data: "pid=" + pid,
                dataType: 'json',
                success: function(data) {
                    $('.loading').css({
                        'display': 'block'
                    });
                    setTimeout(function() {
                        $('.loading').css({
                            'display': 'none'
                        });
                    }, 1000);
                    $('.count-cart').html(data.count);
                    $('.price_cart').html(data.tongtien);
                    setTimeout(function() {
                        $('#myModal').modal('show');
                    }, 1200);
                }
            });
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('html,body').on('click', '.showcart', function() {
            $.ajax({
                url: "ajax/showcart.php",
                type: "POST",
                success: function(data) {
                    $('.addfromcart').html(data);
                },
            });
        });

    });
</script>


<script type="text/javascript">
    var pathPublic = '{{ asset("client/assets/images") }}';
    $(document).ready(function() {
        $("#owl-video").owlCarousel({
            slideSpeed: 300,
            paginationSpeed: 400,
            loop: true,
            singleItem: true,
            autoplay: true,
            dots: false,
            lazyLoad: true,
            nav: true,
            navText: [`<img src="${pathPublic}/icon_prev.png">`, `<img src="${pathPublic}/icon_next.png">`],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: true
                }
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('.click_video').click(function() {
            id = $(this).attr('data-id');
            $.ajax({
                url: 'ajax/video1.php',
                data: 'id=' + id,
                type: 'get',
                async: true,
                success: function(res) {
                    $('#video11').html(res)

                }
            });
            return false;
        });
    });
</script>

<script type="text/javascript">
    $('.click_submit').click(function() {
        $('.success_submit').trigger('click');
    });
</script>

<script type="text/javascript">
    $('html,body').on('click', '.submit_comment a', function() {
        var checked_us = $(this).attr('user_comment');
        if (checked_us == '') {
            $('#mycomment').modal('show');
        }
    });

    $('.btn_cm').click(function() {
        var gettext = $(this).parents('#myModal').next().find('.txt_comment').val();
        var frm = document.forms['form_user'];
        var ten = frm['txtten'].value;
        var dienthoai = frm['txtdienthoai'].value;
        var email = frm['txtemail'].value;
        if (ten == '') {
            alert('Vui lòng nhập tên!');
            return false;
        } else if (dienthoai == '') {
            alert('Vui lòng nhập điện thoại!');
            return false;
        } else if (email == '') {
            alert('Vui lòng nhập Email!');
            return false;
        } else {
            $.ajax({
                url: 'ajax/user_comment.php',
                type: 'POST',
                data: {
                    ten: ten,
                    dienthoai: dienthoai,
                    email: email,
                    act: "dangky"
                },
                success: function(data) {
                    if (data == 0) {
                        alert('Tên này đã tồn tại!');
                        return false;
                    } else if (data == 1) {
                        alert('Đăng ký thành công!');
                        return true;
                    } else if (data == 2) {
                        alert('Lỗi đăng ký!');
                        return false;
                    }

                }

            });
        }
    });

    $(document).ready(function() {
        $('.submit_comment a').click(function() {
            var gettext = $(this).parents('.load_form').find('.txt_comment').val();
            var id_baiviet = $(this).attr('id_baiviet');
            var curr_page = $(this).attr('curr_page');
            var ip_add = $(this).attr('ip_add');

            var el = $(this);
            $.ajax({
                url: 'ajax/user_comment.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    text: gettext,
                    id_baiviet: id_baiviet,
                    act: "post_comment",
                    curr_page: curr_page,
                    ip_add: ip_add
                },
                success: function(data) {
                    if (data != '') {
                        $('#show_comment').append(
                            "<div class='item_comment'><div class='bd_text'><span class='name_cm'>" +
                            data.tenuser + ":</span><div class='text_cm'>" + data
                            .text_cm +
                            "</div></div><div class='traloi_cm'><span class='time_cm'>" +
                            data.time +
                            "</span><!-- <span><a href='javascript:void(0)' >Trả lời</a></span> --></div></div><div class='clear'></div>"
                        );
                    } else {
                        alert('load lỗi !');
                    }
                }

            });
        });

        $('.delete_show').click(function() {
            if ($('.show_box_cart').hasClass('hide_box')) {
                $('.show_box_cart').removeClass('hide_box');
            } else {
                $('.show_box_cart').addClass('hide_box');
            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.sltloaihinh').change(function() {
            if ($(this).val() == 84) {
                $('.hide-frm').css({
                    'display': 'none'
                });
            } else {
                $('.hide-frm').css({
                    'display': 'block'
                });
            }

            var id = $(this).val();
            $.ajax({
                url: 'ajax/loclist.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.slthinhthuc').html(data);
                }
            });

        });
    })
</script>

<script src="{{ asset('client/js/jquery.lettering.js') }}"></script>
<script src="{{ asset('client/js/jquery.textillate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.text_name').textillate({
            in: {
                effect: 'bounceIn'
            },
            out: {
                effect: 'bounceOut'
            },
            loop: true
        });
    });
</script>
<script type="text/javascript">
    function opentab2(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("showhere2");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink2");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" activetab", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " activetab";
    }
</script>

<script type="text/javascript" src="{{ asset('client/js/jRating.jquery.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.basic').jRating();
        step: true;
        length: 5;
        type: 'small';
    });
</script>
<div id="fb-root"></div>

<script>
    var fired = false;
    window.addEventListener("scroll", function() {
        if ((document.documentElement.scrollTop != 0 && fired === false) || (document.body.scrollTop != 0 &&
                fired === false)) {
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=976604885739311";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));


            fired = true;
        }
    }, true);
</script>
<script type="text/javascript" src="{{ asset('client/js/jquery.lazy.js') }}"></script>
<script type="text/javascript">
    window.addEventListener("load", function(event) {
        $(".lazy").lazy({
            effect: "fadeIn"
        });
    });
    $(document).ajaxStop(function() {
        $(".lazy").lazy({
            effect: "fadeIn"
        }).removeClass("lazy");
    });
</script>

</body>

</html>
