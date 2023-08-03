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


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&display=swap" rel="stylesheet">

 {{-- country code --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />


</head>
<style>
    .fa-stack {
        position: relative;
        display: inline-block;
        width: 2em;
        height: 2em;
        line-height: 2em;
        vertical-align: middle;
    }

    .footIconSocial .fIcon {
        font-size: 18px;
        color: #fff !important;
        background-color: #252A50;
        border-radius: 8px;
    }
</style>

<body>
    <header class="header overlayClr @yield('headerClass')" id="@yield('headerId')">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light  mainNavBar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ $logo }}" alt="arabianRanches" class="mainLogo">
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
                                <a class="nav-link" href="{{ url('/arabianRanches_1') }}">Arabian Ranches I</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/arabianRanches_11') }}">Arabian Ranches II</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/arabianRanches_111') }}">Arabian Ranches III</a>
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
    <div class="modal fade" id="onload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content pageLoderModal">
                <button type="button" class="btn-close closeModalBtn" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="formTitle">
                    <img src="{{ $logo }}" class="modalLogo">
                    <h3>Reach out to us today!</h3>
                </div>
                <div class="modalFormBox">
                    <form action="{{ url('reachoutForm') }}" method="POST" id="reachoutForm">
                        @csrf
                        <input type="hidden" name="formName" value="reachoutForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2  fieldBar">
                                    <label class="labelText">Full Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2  fieldBar">
                                    <label class="labelText">Email</label>
                                    <input type="email" class="form-control" name="email" required>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2  fieldBar">
                                    <label class="labelText">Phone No.</label>
                                    <input class="fullNumber" id="fullNumberM" type="hidden" name="fullNumber">
                                    <input type="text"  class="form-control" onkeyup="numbersOnly(this)" id="modelTelephone" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2  fieldBar">
                                    <label class="labelText">Message</label>
                                    <textarea class="form-control" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="fillBtn modlBtn reachoutFormButton">
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
                        <img src="{{ $footer_logo }}" alt="arabianRanches">
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
                        <p class="ftText">{{ date('Y') }} House Hunters - All rights reserved</p>
                    </div>
                    <div class="col-md-6">
                        <div class="ftHoriList">
                            <a href="{{ url('/') }}" class="ftLink">Home </a>
                            <a href="#" class="ftLink">Privacy </a>
                            <a href="#" class="ftLink">Sitemap </a>
                            <a href="{{ url('/contact-us') }}" class="ftLink">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button class="scrollBtn" style="display: block;">
        <span>Scroll Top</span>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/build/js/intlTelInput.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $(document).on('click', '.btnEnquire', function() {
                $('#onload').modal('show');
            });
        });
        var input = document.querySelector("#telephone");

        if (input) {
            intlTelInput(input, {
                input: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['UAE'],
                separateDialCode: true,
                geoIpLookup: function(success, failure) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        success(countryCode);
                    });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
            });
            var inti = window.intlTelInputGlobals.getInstance(input);
            input.addEventListener('input', function() {
                var fullNumber = inti.getNumber();
                $("#fullNumber").val(fullNumber);
            });
        }
        var inputMt = document.querySelector("#modelTelephone");
        if (inputMt) {
            intlTelInput(inputMt, {
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['UAE'],
                separateDialCode: true,
                geoIpLookup: function(success, failure) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        success(countryCode);
                    });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
            });
            var itiRE = window.intlTelInputGlobals.getInstance(inputMt);
            inputMt.addEventListener('input', function() {
                var fullNumberM = itiRE.getNumber();
                $("#fullNumberM").val(fullNumberM);
            });
        }

        $(".contactusFormButton").click(function() {
            var formData = new FormData($("#contactusForm")[0]);
            $.ajax({
                beforeSend: function() {
                    $("#contactusForm").find('button').attr('disabled', true);
                    $("#contactusForm").find('button>i').show();
                },
                url: $("#contactusForm").attr('action'),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        if (Array.isArray(response.message)) {
                            $.each(response.message, function(i, v) {
                                if (v['type'] == 'success') {
                                    toastr.success(v['message'], 'Success');
                                } else {
                                    toastr.error(v['message'], 'Error');
                                }
                            });
                        } else {
                            toastr.success(response.message, 'Success');
                        }
                    } else {
                        toastr.error('Something going wrong!', 'Opps!');
                    }
                    document.getElementById('contactusForm').reset();
                },
                complete: function() {
                    $("#contactusForm").find('button').attr('disabled', false);
                    $("#contactusForm").find('button>i').hide();
                    document.getElementById('contactusForm').reset();
                },
                error: function(status, error) {
                    var errors = JSON.parse(status.responseText);
                    if (status.status == 401) {
                        $("#contactusForm").find('button').attr('disabled', false);
                        $("#contactusForm").find('button>i').hide();
                        $.each(errors.error, function(i, v) {
                            toastr.error(v[0], 'Opps!');
                        });
                    } else {
                        toastr.error(errors.message, 'Opps!');
                    }
                    document.getElementById('contactusForm').reset();
                }
            });
            return false;
        });

        $(".reachoutFormButton").click(function() {
            var formData = new FormData($("#reachoutForm")[0]);
            $.ajax({
                beforeSend: function() {
                    $("#reachoutForm").find('button').attr('disabled', true);
                    $("#reachoutForm").find('button>i').show();
                },
                url: $("#reachoutForm").attr('action'),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        if (Array.isArray(response.message)) {
                            $.each(response.message, function(i, v) {
                                if (v['type'] == 'success') {
                                    toastr.success(v['message'], 'Success');
                                } else {
                                    toastr.error(v['message'], 'Error');
                                }
                            });
                        } else {
                            toastr.success(response.message, 'Success');
                        }
                    } else {
                        toastr.error('Something going wrong!', 'Opps!');
                    }
                    document.getElementById('reachoutForm').reset();
                },
                complete: function() {
                    $("#reachoutForm").find('button').attr('disabled', false);
                    $("#reachoutForm").find('button>i').hide();
                    document.getElementById('reachoutForm').reset();
                },
                error: function(status, error) {
                    var errors = JSON.parse(status.responseText);
                    if (status.status == 401) {
                        $("#reachoutForm").find('button').attr('disabled', false);
                        $("#reachoutForm").find('button>i').hide();
                        $.each(errors.error, function(i, v) {
                            toastr.error(v[0], 'Opps!');
                        });
                    } else {
                        toastr.error(errors.message, 'Opps!');
                    }
                    document.getElementById('reachoutForm').reset();
                }
            });
            return false;
        });
        $(".subscribeFormButton").click(function() {
            var formData = new FormData($("#subscribeForm")[0]);
            $.ajax({
                beforeSend: function() {
                    $("#subscribeForm").find('button').attr('disabled', true);
                    $("#subscribeForm").find('button>i').show();
                },
                url: $("#subscribeForm").attr('action'),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        if (Array.isArray(response.message)) {
                            $.each(response.message, function(i, v) {
                                if (v['type'] == 'success') {
                                    toastr.success(v['message'], 'Success');
                                } else {
                                    toastr.error(v['message'], 'Error');
                                }
                            });
                        } else {
                            toastr.success(response.message, 'Success');
                        }
                    } else {
                        toastr.error('Something going wrong!', 'Opps!');
                    }
                    document.getElementById('subscribeForm').reset();
                },
                complete: function() {
                    $("#subscribeForm").find('button').attr('disabled', false);
                    $("#subscribeForm").find('button>i').hide();
                    document.getElementById('subscribeForm').reset();
                },
                error: function(status, error) {
                    var errors = JSON.parse(status.responseText);
                    if (status.status == 401) {
                        $("#subscribeForm").find('button').attr('disabled', false);
                        $("#subscribeForm").find('button>i').hide();
                        $.each(errors.error, function(i, v) {
                            toastr.error(v[0], 'Opps!');
                        });
                    } else {
                        toastr.error(errors.message, 'Opps!');
                    }
                    document.getElementById('subscribeForm').reset();
                }
            });
            return false;
        });
        function numbersOnly(input)
        {
            var regex = /[^0-9+]/g;
            input.value = input.value.replace(regex, "");
        }
    </script>

    @yield('js')
</body>

</html>
