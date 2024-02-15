const category = {
    init: () => {
        $(document).ready(function () {
            $(".slick-doitac").slick({
                dots: true,
                autoplay: true,
                infinite: true,
                arrows: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 350,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                ]
            });
            $(`.slick-${SLUG_CONFIG_LAYOUT}`).slick({
                dots: false,
                autoplay: true,
                infinite: true,
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 350,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        slidesToScroll: 1
                    }
                }
                ]
            });
        });
    },

}
category.init();