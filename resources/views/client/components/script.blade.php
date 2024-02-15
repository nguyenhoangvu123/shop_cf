<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS4S8GC" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script language="javascript" type="text/javascript" src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/jqueryslidemenu.js') }} " type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('client/js/jquery.bxslider.js') }}"></script>

<script type="text/javascript" src="{{ asset('client/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/js/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/js/fullpage.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('client/js/jquery.fullpage.extensions.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('client/js/scrolloverflow.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- Valid -->
<script src="{{ asset('admin/assets/js/validate.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/toast/toast.script.js') }}"></script>
<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var revapi;
    jQuery(document).ready(function() {
        revapi = jQuery('.tp-banner').revolution({
            delay: 3000,
            startwidth: 1170,
            startheight: 500,
            hideThumbs: 10,
            fullWidth: "off",
            fullScreen: "on",
            fullScreenOffsetContainer: ""

        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
