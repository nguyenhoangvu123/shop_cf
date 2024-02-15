const home = {
    init: () => {
        var myFullpage = new fullpage('#fullpage', {
            anchors: ['trangchu', ...LIST_SLUG_CONFIG_LAYOUT, 'dutoan',
                'khachhang', 'doitac', 'footer'
            ],
            navigation: true,
            navigationPosition: 'right',
            navigationTooltips: ['Trang chủ', ...LIST_NAME_CONFIG_LAYOUT, 'Dự toán', 'Khách hàng', 'Đối tác',
                'Cuối trang'
            ],
            responsiveWidth: 900,
            afterResponsive: function (isResponsive) {

            },
            onLeave: function (origin, destination, direction) {
                var params = {
                    origin: origin,
                    destination: destination,
                    direction: direction
                };
                if (destination.anchor == 'trangchu') {
                    $(".menu").removeClass("show-menu");
                } else {
                    $(".menu").addClass("show-menu");
                }

            }
        });
        $(document).ready(function () {
           
            LIST_TYPE_AND_SLUG_CONFIG_LAYOUT.forEach(element => {
                if (element.type == 0) {
                    $('.slider-for').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        autoplay: true,
                        infinite: true,
                        fade: true,
                        asNavFor: '.slider-nav'
                    });
                    $('.slider-nav').slick({
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: true,
                        speed: 1000,
                        infinite: true,
                        asNavFor: '.slider-for',
                        dots: false,
                        vertical: true,
                        focusOnSelect: true
                    });
                } else if (element.type == 1) {
                    $(`.slick-${element.config_slug}`).slick({
                        dots: false,
                        autoplay: true,
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        responsive: [{
                            breakpoint: 1170,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 950,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 720,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 500,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 350,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                        ]
                    });
                } else if (element.type == 2) {
                    $(`.slick-${element.config_slug}`).slick({
                        dots: true,
                        autoplay: true,
                        infinite: true,
                        slidesToShow: 4,
                        arrows: false,
                        slidesToScroll: 1,
                        responsive: [{
                            breakpoint: 1170,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 4
                            }
                        },
                        {
                            breakpoint: 950,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 720,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 500,
                            settings: {
                                slidesToShow: 2,
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
                } else if (element.type == 3) {
                    $(`.slick-${element.config_slug}`).slick({
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
                }
            });
            $(".slick-khachhang").slick({
                dots: false,
                autoplay: true,
                infinite: true,
                slidesToShow: 1,
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
            $(".slick-news").slick({
                dots: false,
                autoplay: true,
                infinite: true,
                arrows: false,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
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
            $(".slick-tieuchi").slick({
                dots: false,
                autoplay: true,
                infinite: true,
                arrows: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 350,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
                ]
            });
            // $(".slick-thicong").slick({
            //     dots: true,
            //     autoplay: true,
            //     infinite: true,
            //     slidesToShow: 4,
            //     arrows: false,
            //     slidesToScroll: 1,
            //     responsive: [{
            //         breakpoint: 1170,
            //         settings: {
            //             slidesToShow: 2,
            //             slidesToScroll: 4
            //         }
            //     },
            //     {
            //         breakpoint: 950,
            //         settings: {
            //             slidesToShow: 3,
            //             slidesToScroll: 3
            //         }
            //     },
            //     {
            //         breakpoint: 720,
            //         settings: {
            //             slidesToShow: 2,
            //             slidesToScroll: 2
            //         }
            //     },
            //     {
            //         breakpoint: 500,
            //         settings: {
            //             slidesToShow: 2,
            //             slidesToScroll: 1
            //         }
            //     },
            //     {
            //         breakpoint: 350,
            //         settings: {
            //             slidesToShow: 1,
            //             slidesToScroll: 1
            //         }
            //     }
            //     ]
            // });

            $(".slick-content").slick({
                dots: true,
                autoplay: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            });

        });
    },
    tab: (o) => {
        var id_list = $(o).data('id');
        var type = $(o).data('type');
        var number = $(o).data('number');
        var typeSlick = $(o).data('type-slick');
        var itemSlick = $(o).data('item-slick');
        var el = $(o);
        function destroyCarousel() {

            if ($(`.slick-${itemSlick}`).hasClass('slick-initialized')) {
                $(`.slick-${itemSlick}`).slick('unslick');
            }
        }
        function slickCarouselCircle() {
            $(`.slick-${itemSlick}`).slick({
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: false,
                slidesToShow: 3,
                infinite: false,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 350,
                    settings: {
                        slidesToShow: 1
                    }
                }
                ]
            });
        }
        function slickCarouselSquare() {
            $(`.slick-${itemSlick}`).slick({
                dots: true,
                autoplay: true,
                infinite: true,
                slidesToShow: 4,
                arrows: false,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
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
        }
        $.ajax({
            url: route('client.list.post.category'),
            type: "POST",
            data: {
                id_list: id_list,
                type: type,
                number: number,
                itemSlick,
                typeSlick
            },

            success: function (data) {

                destroyCarousel();
                el.parents(`#${type}`).find('.content-list').html(data);
                $('.loaddingthis').html('');
                if (typeSlick == 1) {
                    slickCarouselCircle();

                } else if (typeSlick == 2) {
                    slickCarouselSquare();
                }

            }
        });
        if ($(o).parents(`#${type}`).find('li').hasClass('active')) {
            $(o).parents(`#${type}`).find('li').removeClass('active');
            $(o).parent().addClass('active');
        }
    }
}
home.init();