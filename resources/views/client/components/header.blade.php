<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ route('client.home') }}">
    <meta name="google-site-verification" content="tkbLJS3HHJo4l_A30jLPifzUuFtTPy9u_5V2U_5Nmc0" />
    <link id="favicon" rel="shortcut icon" href="{{ $listSettingBasic->value->logo }}" type="image/x-icon" />
    <title>{{ $listSettingBasic->value->nameCompany }}</title>
    <meta name="description"
        content="{{ $listSettingBasic->value->seoDescription }}">
    <meta name="keywords"
        content="{{ $listSettingBasic->value->seoKeyword }}">
    <link rel="canonical" href="{{ route('client.home') }}" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name="google" content="notranslate" />
    <meta name='revisit-after' content='1 days' />
    <meta name="ICBM" content="">
    <meta name="geo.position" content="">
    <meta name="geo.placename"
        content="">
    <meta name="author" content="">
    <meta name="google-site-verification" content="NvaXOC1iMt4G3rvE0lNH4YoV7o3WC5tsuaCoQYHztFA" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NS4S8GC');
    </script>
    <script type="text/javascript" src="{{ asset('client/js/jquery-1.9.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('client/assets/css/font.css') }} ">

    <link rel="stylesheet" href="{{ asset('client/assets/css/style_new.css') }}">
	
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/hoverEffects.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/navstylechange.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style_revolution.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/assets/css/jquery.mmenu.all.css') }}" />
	<link rel="stylesheet" href="{{ asset('client/assets/css/font-awesome/css/font-awesome.min.css') }}" type="text/css">

    <link href="{{ asset('client/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/assets/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/easy-autocomplete.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/fullpage.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/slick-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/jquery.fancybox.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/toast/toast.style.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/libs/switch-alert/sweetalert2.min.css') }}" />

    <style>
        .box_img_qc_u {
            display: block;
            overflow: hidden;
        }

        .box_img_qc_u span {
            transform: scale(1);
            display: block;
            transition: all 0.3s;
        }

        .box_img_qc_u:hover span {
            transform: scale(1.05);
            transition: all 0.3s;

            .box_img_qc_u {
                display: block;
                overflow: hidden;
            }

            .box_img_qc_u img {
                transform: scale(1);
                display: block;
                transition: all 0.3s;
            }

            .box_img_qc_u:hover img {
                transform: scale(1);
                transition: all 0.3s;
            }
    </style>
</head>

<body>

