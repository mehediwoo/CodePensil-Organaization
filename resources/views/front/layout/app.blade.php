<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/favicon.png') }}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-Menu-area -->
        @include('front.layout.HomeNav')
        <!-- header-Menu-area-end -->

        <!-- main-area -->
        <main>
            @yield('content')
        </main>
        <!-- main-area-end -->

        <!-- Footer-area -->
        @include('front.layout.Footer')
        <!-- Footer-area-end -->


		<!-- JS here -->
        <script src="{{ asset('front/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/element-in-view.js') }}"></script>
        <script src="{{ asset('front/assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('front/assets/js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script>
            @if (session()->has('success'))
                toastr.success("{{ session()->get('success') }}");
            @elseif (session()->has('error'))
                toastr.error("{{ session()->get('error') }}");
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        </script>

    </body>
</html>
