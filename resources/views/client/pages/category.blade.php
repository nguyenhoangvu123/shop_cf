@extends('client.layouts.master')
@section('content')
    <div class="wrap-content main-content flex-main">
        <div class="main_left">
            <div class="title_sl">
                <h1 class="tieude_sl">
                    {{ $itemCategory->category_name }}
                </h1>
            </div>
            <div class="full_spmain">
                @if ($itemCategory->childrens->count() > 0)
                    @foreach ($itemCategory->childrens as $category)
                        <div class="box box-content">
                            <div class="box-title">
                                <h2>{{ $category->category_name }}</h2>
                            </div>
                            <div class="box-body">
                                <div class="designs design-horizontal">
                                    @if ($category->posts)
                                        @foreach ($category->posts as $key => $post)
                                            @if ($key <= 5)
                                                <div class="item">
                                                    <a href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                        title="{{ $post->post_title }}">
                                                        <img src="{{ $post->post_image }}" alt="{{ $post->post_title }}"
                                                            loading="eager">
                                                        <span>{{ $post->post_title }}</span>
                                                    </a>
                                                </div>
                                            @else
                                            @break
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                            <p class="designMore">
                                <a href="{{ route('client.category.childrent', ['slug_category' => $itemCategory->category_slug, 'slug_category_childrent' => "$category->category_slug"]) }}"
                                    title="Xem thêm">Xem thêm <i class="fa fa-angle-double-right"></i></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            @elseif($listPost)
            <div class="mg-15 flex-strech">
                @foreach ($listPost as $post)
                    <div class="item-duan mg-b col-3 pd-5 img_full">
                        <div class="img-da">
                            <a class="border-radius-50"
                                href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                title="{{ $post->post_title }}"><img class="lazy" src="{{ $post->post_image }}"
                                    alt="{{ $post->post_title }}"></a>
                            <div class="tieude-da"><a
                                    href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                    title="{{ $post->post_title }}">{{ $post->post_title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clear"></div>
            @include('client.components.paginate', ['paginator' => $listPost])
        @endif
    </div>
</div>
<div class="main_right">


    <style type="text/css" media="screen">
        .container-left {
            min-height: auto !important
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#secondpane p.menu_head").hover(function() {
                if ($('.menu_body').hasClass('active')) {
                    $('.menu_body').removeClass('active');
                    $(this).next().addClass('active');
                }
                if ($('.menu_head').hasClass('act_b')) {
                    $('.menu_head').removeClass('act_b');
                    $(this).addClass('act_b');
                }

                $(this).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                // css({backgroundImage:"url(down.png)"}).
                //  $(this).siblings().css({backgroundImage:"url(left.png)"});
            });
        });
    </script>
    <div id="container-left">
        <div class="addclass_fix">
            <div class="container-left drop cus_mnleft">
                <div class="mg_left">
                    <div class="nestedsidemenu">
                        <div class="tieude_left"> Dự toán chi phí xây dựng</div>
                        @include('client.components.accounting_page')

                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            @include('client.components.slick.review_customer')
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            var pathPublic = '{{ asset('client/assets/images') }}';
            $(".owl-ykien1").owlCarousel({
                slideSpeed: 300,
                paginationSpeed: 400,
                loop: true,
                singleItem: true,
                autoplay: true,
                dots: true,
                nav: true,
                navText: [`<img src="${pathPublic}/icon_prev.png">`,
                    `<img src="${pathPublic}/icon_next.png">`
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: true
                    }
                }
            });
        });
    </script>



    <script type="text/javascript">
        // if($(window).width()>768){
        // $(window).scroll(function(){
        // var curr_height=$('.fix_header').height()+$('.header').height()+$('.box_duannb').height()+($('.tieude_gt').height())
        //    var get_left_height=$('.main_left').height();
        //    var get_right_height=$('.main_right').height();
        //    var get_height=$('#container-left').offset().top;
        // 	// var get_heightstop=$('.box_qc3').offset().top ;
        // 	
        // var get_heightht= get_heightstop - $('.fix_mnleft').height() ;
        // if($(window).scrollTop() > get_height){
        // 	if($(window).scrollTop() > get_heightht){
        // 	  var top = get_heightht - $(window).scrollTop();
        // 	  $('.fix_mnleft').css({'top':top});
        // 	}else{
        // 	  $('.fix_mnleft').css({'top':'64px'});
        // 	}
        // 	if($(window).scrollTop() > get_height){
        // 	  $(".addclass_fix").addClass('fix_mnleft');
        // 	}else{
        // 	  $(".addclass_fix").removeClass('fix_mnleft');
        // 	}
        //    }else{
        //      $(".addclass_fix").removeClass('fix_mnleft');
        //    }

        //    var wr=$('.main_right').width();
        //    $('.fix_mnleft').css({'width' : wr});
        //  });
        //}
    </script>

    <style type="text/css" media="screen">
        .fix_mnleft {
            position: fixed;
            top: 0px;
        }
    </style>

</div>
</div>
@include('client.components.footer', ['contentSection' => 'content-section'])
@include('client.components.host_fix')
@endsection

@section('after_scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('body').append('<div id="top" ></div>');
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
<script type="text/javascript">
    const SLUG_CONFIG_LAYOUT = '{{ $slugConfigLayout ?? '' }}';
</script>
<script src="{{ asset('client/js/category/index.js') }}"></script>
<script src="{{ asset('client/js/advice/index.js') }}"></script>
@include('client/components/script_home')
@endsection
