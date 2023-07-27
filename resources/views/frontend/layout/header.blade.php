<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Primary Meta Tags -->
    <meta name="title" content="@yield('title') @if($slogan) | {{  $slogan }} @endif">
    <meta name="keyword" content="@yield('pageKeyword')">
    <meta name="description" content="@yield('pageDescription')">
    <meta name="author" content="@if($name) {{  $name }} | @endif Xpertise Creative Studio">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{$website_url}}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('pageDescription')">
    <meta property="og:image"
        content="@if($logo) {{  $logo }} @else {{ asset('frontend/assets/images/logo.png') }} @endif">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{$website_url}}">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('pageDescription')">
    <meta property="twitter:image"
        content="@if($logo) {{  $logo }} @else {{ asset('frontend/assets/images/logo.png') }} @endif">
    {{-- end meta --}}

    <title>@yield('title') @if($slogan) | {{  $slogan }} @endif</title>
    <link rel="canonical" href="{{url()->current()}}" />
    <!-- Favicon and touch icons -->
    <link rel="icon" type="image/png" href="@if($favicon) {{  $favicon }} @else {{ asset('frontend/assets/images/favicon.png') }} @endif">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <link rel="apple-touch-icon"
        href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <meta name="robots" content="index,follow" />
    <!-- Favicon and touch icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- fonts --}}

    {{-- css --}}
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- slider --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    {{-- country code --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/infiniteslidev2/infiniteslidev2.min.js"></script>

    {{-- select 2  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link href="https://kendo.cdn.telerik.com/themes/6.4.0/default/default-main.css" rel="stylesheet" />
<script src="https://kendo.cdn.telerik.com/2023.2.606/mjs/kendo.all.js" type="module"></script> <!-- Include all Kendo UI modules. -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>
