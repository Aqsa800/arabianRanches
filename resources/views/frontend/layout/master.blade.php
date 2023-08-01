<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Primary Meta Tags -->
    <meta name="title" content="@yield('title') @if ($slogan) | {{ $slogan }} @endif">
    <meta name="keyword" content="@yield('pageKeyword')">
    <meta name="description" content="@yield('pageDescription')">
    <meta name="author"
        content="@if ($name) {{ $name }} | @endif Xpertise Creative Studio">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $website_url }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('pageDescription')">
    <meta property="og:image"
        content="@if ($logo) {{ $logo }} @else {{ asset('frontend/assets/images/logo.png') }} @endif">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $website_url }}">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('pageDescription')">
    <meta property="twitter:image"
        content="@if ($logo) {{ $logo }} @else {{ asset('frontend/assets/images/logo.png') }} @endif">
    {{-- end meta --}}

    <title>@yield('title') @if ($slogan)
            | {{ $slogan }}
        @endif
    </title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <!-- Favicon and touch icons -->
    <link rel="icon" type="image/png"
        href="@if ($favicon) {{ $favicon }} @else {{ asset('frontend/assets/images/favicon.png') }} @endif">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <meta name="robots" content="index,follow" />
    <!-- Favicon and touch icons -->

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/responsive.css') }}">

</head>

<body>
    <header class="header overlayClr">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light  mainNavBar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" class="mainLogo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navBarArea" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/arabianRanches_1') }}">Arabian Ranches |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/arabianRanches_2') }}">Arabian Ranches ||</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/arabianRanches_3') }}">Arabian Ranches |||</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/properties') }}">Properties</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
            @yield('header')
        </div>
    </header>
   @yield('header_extra')
    @yield('content')
    <section class="secLight">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="NewsBox">
                        <img src="{{ asset('frontend/assets/images/icons/mail-icon.png') }}">
                        <div class="newsContent">
                            <h5>Sign Up For Our Newsletter.</h5>
                            <p>Enter your email and get new updates & news.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputBar">
                        <input type="email" name="" class="fillInput"
                            placeholder="Enter Your Email Address....">
                        <img src="{{ asset('frontend/assets/images/icons/mail-icon-2.png') }}" class="mailIcon">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="onload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content pageLoderModal">
                <button type="button" class="btn-close closeModalBtn" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="formTitle">
                    <img src="{{ asset('frontend/assets/images/logo.png') }}" class="modalLogo">
                    <h3>Reach out to us today!</h3>
                </div>
                <div class="modalFormBox">
                    <form action="/action_page.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2  fieldBar">
                                    <label class="labelText">Full Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2  fieldBar">
                                    <label class="labelText">Phone No.</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-2  fieldBar">
                                    <label class="labelText">Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>

                        </div>

                        <input type="submit" value="Submit" class="fillBtn modlBtn">
                    </form>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="ftLogo">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}">
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="ftTitle">Properties</h5>
                    <div class="row ftClmRow">
                        <div class="col-md-4">
                            <div class="ftList">
                                <a href="#" class="ftLink">JOY</a>
                                <a href="#" class="ftLink">Spring </a>
                                <a href="#" class="ftLink">SPRING</a>
                                <a href="#" class="ftLink">RUBA</a>
                                <a href="#" class="ftLink">Sun</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ftList">
                                <a href="#" class="ftLink">Bliss </a>
                                <a href="#" class="ftLink">CAYA </a>
                                <a href="#" class="ftLink">JUNE</a>
                                <a href="#" class="ftLink">ELIE SAAB</a>
                                <a href="#" class="ftLink">BLISS 2</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ftList">
                                <a href="#" class="ftLink">RAYA</a>
                                <a href="#" class="ftLink">ANYA </a>
                                <a href="#" class="ftLink">NYA 2</a>
                                <a href="#" class="ftLink">MAY</a>
                                <a href="#" class="ftLink">Bliss</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="ftBottomBar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="ftText">2023 House Hunters - All rights reserved</p>
                    </div>
                    <div class="col-md-6">
                        <div class="ftHoriList">
                            <a href="#" class="ftLink">Home </a>
                            <a href="#" class="ftLink">Privacy </a>
                            <a href="#" class="ftLink">Sitemap </a>
                            <a href="#" class="ftLink">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var $owl = $('.owl-carousel');
            $owl.children().each(function(index) {
                jQuery(this).attr('data-position', index);
            });
            $owl.owlCarousel({
                center: true,
                nav: false,
                loop: true,
                items: 3,
                margin: 30,
                navText: ["<i class='fa arrow-circle-left'><</i>", "<i class='fa arrow-right'>></i>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            $(document).on('click', '.item', function() {
                $owl.trigger('to.owl.carousel', $(this).data('position'));
            });
        });
    </script>
    <script type="text/javascript">
        window.onload = () => {
            $('#onload').modal('show');
        }
    </script>
</body>

</html>
