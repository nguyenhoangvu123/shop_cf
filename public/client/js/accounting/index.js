function isEmail(emailAddress) {
    var regObj = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return regObj.test(emailAddress);
};

function isPhone(phone) {
    var regObj = /^(\+)?(\d+)$/;
    return regObj.test(phone);
};

function doEnter(evt) {
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        onSearch(evt);
    }
};

function onSearch(evt) {
    var keyword = document.getElementById("keyword").value;
    if (keyword == "Tá»« khĂ³a tĂ¬m kiáº¿m" || keyword == "") {
        alert("Vui lĂ²ng nháº­p tá»« khĂ³a tĂ¬m kiáº¿m");
        document.getElementById("keyword").focus();
    }
    else {
        location.href = "tim-kiem/" + keyword;
        loadPage(document.location);
    }
};

function setCookie(a, b, c, d, f, j) {
    var e = new Date;
    e.setTime(e.getTime());
    c && (c *= 864E5);
    e = new Date(e.getTime() + c);
    document.cookie = a + "=" + escape(b) + (c ? ";expires=" + e.toGMTString() : "") + (d ? ";path=" + d : "") + (f ? ";domain=" + f : "") + (j ? ";secure" : "")
};

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) c_end = document.cookie.length;
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
};

function browserDetect() {
    var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
    var isChrome = !!window.chrome && !isOpera;
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    if (isFirefox) var classDetect = 'isFirefox';
    else if (isChrome) var classDetect = 'isChrome';
    else if (isSafari) var classDetect = 'isSafari';
    else if (isOpera) var classDetect = 'isOpera';
    else var classDetect = 'isIE';
    $('body').addClass(classDetect);
}

function showLoading(status) {
    status = status || 'none';
    $('#wallper-loadding').css({ 'position': 'fixed', 'display': status });
}

$('body').append('<div id="wallper-loadding"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw margin-bottom"></i></div>');
$('body').append('<div id="back2top" title="Top"><i class="fa fa-chevron-up"></i></div>');
$(function () {
    if ($('#menu-pc').length > 0) {
        $('#menu-pc').smartmenus({
            subMenusMinWidth: '230px',
            subIndicatorsText: '',
            //collapsibleBehavior: 'toggle',
            hideDuration: null,
            showDuration: null,
            hideFunction: function ($ul, complete) { $ul.slideUp(250, complete); },
            showFunction: function ($ul, complete) { $ul.slideDown(250, complete); },
        });
    }
});
// $(document).ready(function () {
//     browserDetect();
//     $('.waitting a').click(function () {
//         showLoading('block');
//     });
//     if ($('header .col-search').length > 0) {
//         $('header .col-search').click(function () {
//             $(this).find('.fa').toggleClass('fa-search fa-times');
//             if ($('header .col-search .fa').hasClass('fa-times')) {
//                 $(this).attr('title', 'ÄĂ³ng');
//                 $('.area-search').slideDown();
//             } else {
//                 $(this).attr('title', 'TĂ¬m kiáº¿m bĂ i viáº¿t');
//                 $('.area-search').slideUp();
//             }
//         });
//     } if ($('#popupModal').length > 0) {
//         setTimeout(function () {
//             $('#popupModal').modal({ backdrop: 'static', keyboard: false });
//         }, 1000);
//     } if ($('.table-fmit').length > 0) {
//         $('.table-fmit').each(function () {
//             $(this).wrap('<div class="table-responsive">');
//         });
//     }
//     if ($('.contact .description .row').length > 0) {
//         var divHeight = $('.contact .description .row').height();
//         $('#map').css({ height: divHeight });
//     } if ($('#nav-tabs-course').length > 0) {
//         // Javascript to enable link to tab
//         var hash = window.location.hash;
//         if (hash) {
//             $('#nav-tabs-course a[href="' + hash + '"]').tab('show');
//             var scrollmem = $("#nav-tabs-course").offset().top;
//             $('html,body').animate({ scrollTop: scrollmem - 10 }, 500);
//         }

//         $('#nav-tabs-course a').click(function (e) {
//             $(this).tab('show');
//             var scrollmem = $('body').scrollTop() || $('html').scrollTop();
//             window.location.hash = this.hash;
//             $('html,body').scrollTop(scrollmem);
//         });
//     } if ($('.fancybox').length > 0) {
//         $('.fancybox').fancybox({
//             loop: true,
//             margin: [10, 10],
//             fullScreen: { autoStart: false },
//             slideShow: { autoStart: true },
//             thumbs: { autoStart: true }
//         });
//     } if ($('a.image-default').length > 0) {
//         $('a.image-default').removeClass('image-default');
//     } if ($('#slider .owl-carousel .item').length > 0) {
//         if ($("#slider .owl-carousel .item").length > 1) var loop = true;
//         else var loop = false;
//         $('#slider .owl-carousel').owlCarousel({
//             items: 1,
//             lazyLoad: true,
//             loop: loop,
//             dots: false,
//             autoplay: true,
//             mouseDrag: false,
//             nav: loop,
//             nav: false,
//             navText: ['<i class="fa fa-angle-left" title="Next"></i>', '<i class="fa fa-angle-right" title="Prev"></i>'],
//             autoplayTimeout: 2500,
//             autoplaySpeed: 2300,
//             autoplayHoverPause: true,
//             animateOut: 'fadeOut',
//             responsive: {
//                 0: {
//                     dots: false,
//                 },
//                 768: {
//                     dots: true,
//                 }
//             }
//         });
//     } if ($('#slider .slide-right .item').length > 0) {
//         if ($("#slider .slide-right .item").length > 1) var loop = true;
//         else var loop = false;
//         $('#slider .slide-right .owl-carousel').owlCarousel({
//             loop: loop,
//             items: 1,
//             dots: false,
//             autoplay: true,
//             mouseDrag: false,
//             nav: loop,
//             nav: false,
//             navText: ['<i class="fa fa-angle-left" title="Next"></i>', '<i class="fa fa-angle-right" title="Prev"></i>'],
//             autoplayTimeout: 3000,
//             autoplaySpeed: 2900,
//             autoplayHoverPause: true,
//             animateOut: 'fadeOut',
//         });
//     } if ($('.box-albums .owl-carousel').length > 0) {
//         if ($(".box-albums .owl-carousel").length > 3) var loop = true;
//         else var loop = false;
//         $('.box-albums .owl-carousel').owlCarousel({
//             loop: false,
//             items: 3,
//             margin: 20,
//             dots: false,
//             autoplay: true,
//             mouseDrag: false,
//             nav: true,
//             navText: ['<button class="btn btn-default"><i class="fa fa-caret-left" title="Next"></i></button>', '<button class="btn btn-default"><i class="fa fa-caret-right" title="Prev"></i></button>'],
//             autoplayTimeout: 3000,
//             autoplaySpeed: 2900,
//             autoplayHoverPause: true,
//             animateOut: 'fadeOut',
//             responsive: {
//                 0: {
//                     items: 1,
//                 },
//                 480: {
//                     items: 2,
//                 },
//                 640: {
//                     items: 3,
//                 }
//             }
//         });
//     } if ($('.box-customer .items').length > 0) {
//         if ($(".box-customer .items").length > 5) var loop = true;
//         else var loop = false;
//         $('.box-customer .owl-carousel').owlCarousel({
//             loop: false,
//             items: 2,
//             margin: 20,
//             dots: false,
//             autoplay: true,
//             mouseDrag: false,
//             nav: true,
//             navText: ['<button class="btn btn-default"><i class="fa fa-caret-left" title="Next"></i></button>', '<button class="btn btn-default"><i class="fa fa-caret-right" title="Prev"></i></button>'],
//             autoplayTimeout: 3000,
//             autoplaySpeed: 2900,
//             autoplayHoverPause: true,
//             animateOut: 'fadeOut',
//             responsive: {
//                 0: {
//                     items: 2,
//                 },
//                 480: {
//                     items: 3,
//                 },
//                 640: {
//                     items: 4,
//                 },
//                 768: {
//                     items: 5,
//                 }
//             }
//         });
//     } if ($('.btn-change-captha').length > 0) {
//         $('.btn-change-captha').click(function () {
//             var token = $("input[name='_token']").val();
//             var parent = $(this).closest('.captcha');
//             var route = parent.find('input[type=hidden]').val();
//             $.ajax({
//                 type: 'POST',
//                 url: route,
//                 data: { _token: token, action: 'change-image-captcha' },
//                 beforeSend: function () {
//                     parent.find('.fa').addClass('fa-spin');
//                 },
//                 success: function (result) {
//                     var data = jQuery.parseJSON(result);
//                     if (data.status) {
//                         parent.find('img').attr('src', data.captcha);
//                         parent.find('.fa').removeClass('fa-spin');
//                     } else {
//                         console.log('Lá»—i: ChÆ°a hiá»ƒu rĂµ cĂ´ng viá»‡c cáº§n lĂ m gĂ¬.');
//                     }
//                 }
//             });
//         });
//     }
//     $('#back2top').click(function () {
//         $('html,body').animate({ scrollTop: 0 }, 500);
//     });
//     $('.col-sidebar .box-dropdown .box-title .fa').click(function () {
//         var bodyBox = $(".col-sidebar .box-dropdown .box-body");
//         if ($(this).hasClass('active')) {
//             $(this).removeClass("active");
//             bodyBox.slideUp('slow');
//         } else {
//             $(this).addClass("active");
//             bodyBox.slideDown('slow');
//         }
//     });
//     $('form').bind('submit', function (e) {
//         var button = $(this).find('button[type=submit]');
//         button.prop('disabled', true).append('<i class="fa fa-spinner fa-spin"></i>');
//         var valid = true;

//         if (!valid) {
//             e.preventDefault();
//             button.prop('disabled', false);
//         }
//     });
//     $('#frmComment').bind('submit', function (e) {
//         var button = $(this).find('button[type=submit]');
//         var courseId = $(this).find('input[name=id_post]').val();
//         var txtName = $(this).find('#cm_fullname');
//         var txtPhone = $(this).find('#cm_telephone');
//         var txtEmail = $(this).find('#cm_email_address');
//         var txtPosition = $(this).find('#cm_position');
//         var textareaContent = $(this).find('#cm_messager');
//         var alert = $(this).find('.alert');
//         var messager = $(this).find('.messager');
//         var route_action = $(this).find("input[name=action]").val();
//         var route = $(this).find("input[name=_route]").val();
//         var token = $(this).find("input[name=_token]").val();

//         var messName = $(this).find("input[name=_name]").val();
//         var messPhone = $(this).find("input[name=_phone]").val();
//         var messEmail = $(this).find("input[name=_email]").val();
//         var messMessage = $(this).find("input[name=_message]").val();
//         var messSuccess = $(this).find("input[name=_success]").val();
//         var messError = $(this).find("input[name=_error]").val();
//         var messTimeout = $(this).find("input[name=_timeout]").val();

//         var cmCookie = getCookie('cmt_' + courseId);

//         alert.fadeOut().removeClass(function (index, className) {
//             return (className.match(/(^|\s)alert-\S+/g) || []).join('');
//         });
//         $(this).find('.error').removeClass("error");

//         if (txtName.val()) {
//             if (!txtPhone.val() || txtPhone.val() && !isPhone(txtPhone.val())) {
//                 txtPhone.focus().parent('div').addClass('error');
//                 alert.fadeIn().addClass('alert-fmit-error');
//                 messager.html(messPhone);
//                 button.prop('disabled', false).find('.fa').remove();
//                 return false;
//             }
//             if (txtEmail.val() && isEmail(txtEmail.val())) {
//                 if (textareaContent.val()) {
//                     $.ajax({
//                         url: route,
//                         type: 'post',
//                         data: {
//                             _token: token,
//                             action: route_action,
//                             cmCourse: courseId,
//                             cmFullname: txtName.val(),
//                             cmEmail: txtEmail.val(),
//                             cmPhone: txtPhone.val(),
//                             cmPosition: txtPosition.val(),
//                             cmContent: textareaContent.val()
//                         },
//                         success: function (resp) {
//                             var data = $.parseJSON(resp);
//                             if (data.status == 1) {
//                                 alert.fadeIn().addClass('alert-fmit-success');
//                                 messager.html(messSuccess);
//                                 setCookie('cmt_' + courseId, 1, 0.0006);
//                             } else {
//                                 alert.fadeIn().addClass('alert-fmit-error');
//                                 messager.html(messError);
//                             }
//                             button.prop('disabled', false).find('.fa').remove();
//                             $('#cm_fullname').val("");
//                             $('#cm_telephone').val("");
//                             $('#cm_email_address').val("");
//                             $('#cm_position').val("");
//                             $('#cm_messager').val("");
//                         },
//                         error: function (xhr, err) {
//                             location.reload();
//                             /*var w = window.open();
//                             jQuery(w.document.body).html(xhr.responseText);*/
//                         },
//                     });
//                 } else {
//                     textareaContent.focus().parent('div').addClass('error');
//                     alert.fadeIn().addClass('alert-fmit-error');
//                     messager.html(messMessage);
//                 }
//             } else {
//                 txtEmail.focus().parent('div').addClass('error');
//                 alert.fadeIn().addClass('alert-fmit-error');
//                 messager.html(messEmail);
//             }
//         } else {
//             txtName.focus().parent('div').addClass('error');
//             alert.fadeIn().addClass('alert-fmit-error');
//             messager.html(messName);
//         }
//         button.prop('disabled', false).find('.fa').remove();
//         return false;
//     });
//     $(".location").click(function () {
//         $("select.select-location option").removeAttr("selected");
//     });
//     $(".select-location").click(function () {
//         var selected = $("select.select-location option:selected").val();
//         if (selected != '') {
//             $("input.location").prop("checked", false);
//         }
//     });
//     if ($('table').length > 0) {
//         $('table').each(function () {
//             $(this).wrap('<div class="table-responsive">');
//         });
//     }
//     $(document).scroll(function () {
//         var scrollTop = $(window).scrollTop();
//         var headerHeight = $("header").height();
//         if (scrollTop > 220) {
//             $('#back2top').fadeIn();
//         } else {
//             $('#back2top').fadeOut();
//         }
//     });
//     var api = $('#menu').data('mmenu');
//     // api.bind('opened', function () {
//     //     $('header .col-right .hotline').css({ position: 'absolute', marginTop: $(window).scrollTop() });
//     //     $('.zopim').css({ position: 'fixed', display: 'none' })
//     // });
//     // api.bind('closed', function () {
//     //     $('header .col-right .hotline').css({ position: 'fixed', marginTop: 0 });
//     //     $('.zopim').css({ position: 'fixed', display: 'block' })
//     // });
// });

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function changeFloor() {
    // hidden 
    $('.img-floor').addClass('hidden');
    $('.tr-floor').addClass('hidden');
    $('.tr-design-coefficient').addClass('hidden');
    $('.tr-build-coefficient').addClass('hidden');
    $('.floor-coefficient').addClass('hidden');

    $('.cb-floor:checked').each(function () {
        var floorId = this.value;
        $('.img-floor-' + floorId).removeClass('hidden');
        $('.tr-floor-' + floorId).removeClass('hidden');
        $('.floor-coefficient-' + floorId).removeClass('hidden');
    });
    $(".tr-design-coefficient-structure").addClass('hidden');
    $(".floor-coefficient").each(function () {
        var isHidden = $(this).hasClass('hidden');
        if (!isHidden) {
            var itemStructureSelected = $(this).find('.list-structured').val();
            $(".tr-design-coefficient-structure-" + itemStructureSelected).removeClass('hidden');
        }

    });
    setTimeout(function () {
        changeArea();
    }, 100);
}

function checkAreaChange() {
    $('input#area_construction').parent('.form-group').removeClass('has-error').find('.help-block').remove();
    var areaVal = $('input#area').val();
    var areaConstructionVal = $('input#area_construction').val();
    if (parseFloat(areaVal) < parseFloat(areaConstructionVal)) {
        $('input#area_construction').parent('.form-group').addClass('has-error').append('<span class="help-block">Diện tích xây dựng không được lớn hơn diện tích đất</span>');
        changeAreaMaster('');
    } else {
        changeAreaMaster(areaConstructionVal);
    }
}

function changeAreaMaster(areaMasterVal) {
    $('.txt-design-coefficient').val(areaMasterVal);
    $('.txt-build-floor-child').val(areaMasterVal);
    setTimeout(function () {
        changeArea();
    }, 100);
}

function changeArea() {
    $.each(resultEstimateDesign, function (idx, val) {
        resultEstimateDesign[idx] = 0;
    });
    resultTotalDesign = 0;
    $('.tr-design-coefficient').each(function () {
        var thisElm = $(this);
        var areaValChild = thisElm.find('input.txt-design-coefficient').val();
        var coefficient = thisElm.find('.coefficient').data('value');
        var areaValue = parseFloat((areaValChild * coefficient) / 100);
        thisElm.find('.area').text(areaValue);
        var designCoefficientChecked = thisElm.find('.cb-design-coefficient:checkbox:checked').length > 0;
        var designCoefficientHidden = thisElm.hasClass('hidden');
        if (designCoefficientChecked && designCoefficientHidden == false) {
            resultTotalDesign += areaValue;
            $.each(resultEstimateDesign, function (idx, val) {
                resultEstimateDesign[idx] += areaValue;
                var designCoefficientWithout = thisElm.hasClass('without_' + idx);
                if (designCoefficientWithout == true) {
                    resultEstimateDesign[idx] -= areaValue;
                }
            });
        }
    });
    $('#resultEstimateDesign .resultEstimate').text(resultTotalDesign);
    $('#resultEstimateDesignHidden').val(resultTotalDesign);

    $.each(resultEstimateBuild, function (idx, val) {
        resultEstimateBuild[idx] = 0;
    });
    resultTotalBuild = 0;
    $('.tr-build-floor-child').each(function () {
        var thisElm = $(this);
        var areaValChild = thisElm.find('input.txt-build-floor-child').val();
        var coefficient = thisElm.find('.coefficient').data('value');
       
        var areaValue = parseFloat((areaValChild * coefficient) / 100);
        thisElm.find('.area').text(areaValue);
        var buildFloorChildChecked = thisElm.find('.cb-build-floor-child:checkbox:checked').length > 0;
        var buildFloorChildHidden = thisElm.hasClass('hidden');
        if (buildFloorChildChecked && buildFloorChildHidden == false) {
            resultTotalBuild += areaValue;
            $.each(resultEstimateBuild, function (idx, val) {
                resultEstimateBuild[idx] += areaValue;
            });
        }
    });
    $('#resultEstimateBuild .resultEstimate').text(resultTotalBuild);
    $('#resultEstimateBuildHidden').val(resultTotalBuild);

    setTimeout(function () {
        showHideQuoteType();
    }, 500);
}

function showHideQuoteType(force = true) {
    var constructionVal = $('#construction_id').val();
    var packageVal = $('#design_package').val();
    var areaSize = $('#area').val();
    var areaConstructionSize = $('#area_construction').val();
    if (constructionVal != '-' && packageVal != '-') {
        if ($('.cb-design-quote').length > 0 && force == false) {
            var designQuotePrices = [];
            $.each($('.cb-design-quote'), function (idx, val) {
                var designId = val.value;
                var designVal = $('#' + val.id).parents('.tr-design-quote-type').find('.txt-design-quote').val();
                if (val.checked == true) {
                    designQuotePrices.push([designId, designVal, 0]);
                } else {
                    designQuotePrices.push([designId, designVal, 1]);
                }
            });
        } else {
            var designQuotePrices = [];
        }

        if ($('.cb-build-quote').length > 0 && force == false) {
            var buildQuotePrices = [];
            $.each($('.cb-build-quote'), function (idx, val) {
                var buildId = val.value;
                var buildVal = $('#' + val.id).parents('.tr-build-quote-type').find('.txt-build-quote').val();
                var buildType = $('#' + val.id).parents('.tr-build-quote-type').find('.txt-build-quote').data('type');
                if (val.checked == true) {
                    buildQuotePrices.push([buildId, buildVal, 0, buildType]);
                } else {
                    buildQuotePrices.push([buildId, buildVal, 1, buildType]);
                }
            });
        } else {
            var buildQuotePrices = [];
        }
        var listIdAttrFloors = [];
        $.each($('.list-structured'), function (idx, val) {
            if (!$(val).parents('.floor-coefficient').hasClass('hidden')) {
                idFloor = $(val).data('id');
                idAttrFloor = $(val).val();
                listIdAttrFloors.push({
                    idFloor, idAttrFloor
                });
            }
        });
        if ($('.sb-build-quote-type').length > 0) {
            var buildQuoteTypes = [[0, 0]];
            $.each($('.sb-build-quote-type'), function (idx, val) {
                var buildQuoteId = val.dataset.id;
                var buildPackageId = val.value;
                buildQuoteTypes.push([buildQuoteId, buildPackageId]);
            });
        } else {
            var buildQuoteTypes = [['a']];
        }
        var isChangeInput = $("#isChangeInput").val();
        var isSignup = $("#isSignup").val();
        console.log(isSignup);
        var resultEstimateDesign = $("#resultEstimateDesignHidden").val();
        var resultEstimateBuild = $("#resultEstimateBuildHidden").val();
        var typeSuppliesVal = $("#build_quote_type_6").val();
        var typeContructionVal = $("#build_quote_type_7").val();

        $.ajax({
            type: 'POST',
            url: ROUTER,
            data: {
                resultEstimateDesign: resultEstimateDesign,
                constructionVal: constructionVal,
                packageVal: packageVal,
                designQuotePrices: designQuotePrices,
                areaSize: areaSize,
                areaConstructionSize: areaConstructionSize,
                resultEstimateBuild: resultEstimateBuild,
                buildQuoteTypes: buildQuoteTypes,
                buildQuotePrices: buildQuotePrices,
                typeSuppliesVal: typeSuppliesVal,
                typeContructionVal: typeContructionVal,
                listIdAttrFloors: listIdAttrFloors,
                isChangeInput: isChangeInput
            },
            success: function (data) {
                if (!data.error) {
                        if (data.viewTotalDesign) {
                            $('#designPrices').removeClass('hidden');
                            $('#designPrices .table-responsive tbody').html(data.viewTotalDesign);
                        } else {
                            $('#designPrices').addClass('hidden');
                            $('#designPrices .table-responsive tbody').html('');
                        }
                        if (data.viewTotalBuild) {
                            $('#buildPrices').removeClass('hidden');
                            $('#buildPrices .table-responsive tbody').html(data.viewTotalBuild);
                        } else {
                            $('#buildPrices').addClass('hidden');
                            $('#buildPrices .table-responsive tbody').html('');
                        }
                } else {
                    alert.fadeIn().addClass('alert-fmit-error');
                    messager.html(messError);
                }

                $("#isChangeInput").val("0");
            },
            error: function (xhr, err) {
                // var w = window.open();
                // jQuery(w.document.body).html(xhr.responseText);
                // location.reload();
            },
        });
        $('td#designPrices').removeClass('hidden');
    } else {
        $('td#designPrices').addClass('hidden');
    }
}

function changeSatusDesignCoefficient(el) {
    var areaValChild = el.val();
    var cbDesignCoefficient = el.parents('.tr-design-coefficient').find('input.cb-design-coefficient');
    if (areaValChild > 0) {
        cbDesignCoefficient.prop('checked', true);
    } else {
        if (el.parents('.tr-design-coefficient').hasClass('cb-first-design-coefficient')) {
            cbDesignCoefficient.prop('checked', true);
        } else {
            cbDesignCoefficient.prop('checked', false);
        }
    }
}

function changeSatusBuildCoefficient(el) {
    var areaValChild = el.val();
    var cbBuildCoefficient = el.parents('.tr-build-floor-child').find('input.cb-build-floor-child');
    if (areaValChild > 0) {
        cbBuildCoefficient.prop('checked', true);
    } else {
        if (el.parents('.tr-build-floor-child').hasClass('cb-first-build-floor-child')) {
            cbBuildCoefficient.prop('checked', true);
        } else {
            cbBuildCoefficient.prop('checked', false);
        }
    }
}

function changeCoefficient(selectElm, idFloor) {
    var selectElmId = selectElm.value;
    var selectElmVal = $(selectElm).find(':selected').data('value');
    var selectElmDesignVal = $(selectElm).find(':selected').data('design');
    console.log(selectElmDesignVal);
    $('.td-build-coefficient-' + idFloor).data('value', selectElmVal);
    $('.td-build-coefficient-' + idFloor).text(selectElmVal + '%');
    $('.coefficient-' + selectElmId).text(selectElmDesignVal + '%');

    setTimeout(function () {
        changeFloor();
    }, 100);
}

var resultTotal = 0;

// Khai toan thiet ke va thi cong
$(document).ready(function () {

    // thay doi lua chon tang khi mo man hinh
    if (typeof (resultEstimateDesign) !== 'undefined') {
        checkAreaChange();
        changeFloor();
    }
    $(".tr-design-coefficient-structure").addClass('hidden');
    $(".floor-coefficient").each(function () {
        var isHidden = $(this).hasClass('hidden');
        if (!isHidden) {
            var itemStructureSelected = $(this).find('.list-structured').val();
            $(".tr-design-coefficient-structure-" + itemStructureSelected).removeClass('hidden');
        }

    });
    // thay doi lua chon tang khi chon
    $('.cb-floor').change(function () {
        if ($(this).parents('li').hasClass('is_normal')) {
            var thisVal = $(this).parents('li').data('count-normal');
            var thisChecked = this.checked;
            if (thisChecked == true) {
                for (let i = 1; i <= thisVal; i++) {
                    $('.count-floor-' + i).find('.cb-floor').prop('checked', true);
                }
            } else {
                for (let j = thisVal; j <= countFloorIsNomal; j++) {
                    $('.count-floor-' + j).find('.cb-floor').prop('checked', false);
                }
            }
        }
        if ($(this).hasClass('is_required')) {
            $(this).prop('checked', true);
            setTimeout(function () {
                changeFloor();
            }, 500);
        } else {
            changeFloor();
        }
    });

    // thay doi gia tri dien tich dat
    $('input#area').keyup(function () {
        checkAreaChange();
    });

    // thay doi gia tri dien tich xay dung
    $('input#area_construction').keyup(function () {
        checkAreaChange();
    });

    // thay doi gia tri dien tich xay dung tung tang
    $('.txt-design-coefficient').keyup(function () {
        $("#isChangeInput").val("1");
        changeArea();
        changeSatusDesignCoefficient($(this));
    });
    $('.txt-design-coefficient').change(function () {
        $("#isChangeInput").val("1");
        changeArea();
        changeSatusDesignCoefficient($(this));
    });

    // thay doi lua chon dien tich cua san
    $('.cb-design-coefficient').change(function () {
        if ($(this).hasClass('is_required')) {
            $(this).prop('checked', true);
            setTimeout(function () {
                changeArea();
            }, 500);
        } else {
            changeArea();
        }
    });

    // thay doi lua chon tinh chi phi thiet ke
    $(document).on("change", '.cb-design-quote', function (event) {
        $("#isChangeInput").val("1");
        showHideQuoteType(false);
    });

    // thay doi lua chon tinh chi phi thiet ke
    $(document).on("change", '.txt-design-quote', function (event) {
        var cbDesignQuote = $(this).parents('.tr-design-quote-type').find('.cb-design-quote');
        if (cbDesignQuote.is(':checked') == true) {
            showHideQuoteType(false);
        }
    });

    // thay doi lua chon dien tich cua san
    $('.cb-build-floor-child').change(function () {
        if ($(this).hasClass('is_required')) {
            $(this).prop('checked', true);
            setTimeout(function () {
                changeArea();
            }, 500);
        } else {
            changeArea();
        }
    });

    // thay doi gia tri dien tich xay dung tung tang
    $('.txt-build-floor-child').keyup(function () {
        changeArea();
        changeSatusBuildCoefficient($(this));
    });
    $('.txt-build-floor-child').change(function () {
        changeArea();
        changeSatusBuildCoefficient($(this));
    });

    // thay doi lua chon tinh chi phi thi cong
    $(document).on("change", '.cb-build-quote', function (event) {
        showHideQuoteType(false);
    });

    // thay doi lua chon tinh chi phi thi cong
    $(document).on("change", '.txt-build-quote', function (event) {
        var cbBuildQuote = $(this).parents('.tr-build-quote-type').find('.cb-build-quote');
        if (cbBuildQuote.is(':checked') == true) {
            showHideQuoteType(false);
        }
    });
});

