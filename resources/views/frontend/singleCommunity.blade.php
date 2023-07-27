@extends('frontend.layout.master')
@if ($community->meta_title != '')
    @section('title', $community->meta_title)
@else
    @section('title', $community->name)
@endif
@if ($community->meta_description != '')
    @section('pageDescription', $community->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($community->meta_keyword != '')
    @section('pageKeyword', $community->meta_keyword)
@else
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">

    </section>

    {{-- About --}}
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row g-3  justify-content-center">

                        <div class="col-12 col-lg-12 col-md-12">
                            <div>
                                <div class="secHead text-start">
                                    <h4 class=" text-primary">{{ $community->name }}</h4>
                                </div>
                                <div class="d-block">
                                    <ul class="breadcrumbBlue text-start ps-0">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ route('communities') }}">Community</a></li>
                                        <li><a>{{ $community->name }}</a></li>
                                    </ul>
                                </div>
                                <div class="propDesc">
                                    {!! $community->short_description !!}
                                </div>
                                <div class="py-3">
                                    <a href="{{ url('dubai-offplans/?community=' . $community->id) }}"
                                        class="btn btn-primary text-uppercase text-decoration-none rounded-pill fs-14 px-3"
                                        type="button">Find a property</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="videoBg pt-2">
                                <div class="nu_relCont">
                                    @if($community->mainImage)
                                    <div class="videoContPC videoContainer">
                                        <video title="{{ $community->name }}" playsinline="" preload="auto"
                                            alt="{{ $community->name }}" poster="{{ $community->mainImage }}"
                                            style="width: 100%;" class="video-fluid rounded-4" id="singlePropVideo">
                                            <source src="{{ $community->video }}" type="video/mp4">

                                            Your browser does not support HTML5 video.
                                        </video>
                                    </div>
                                        @if(!empty($community->video))
                                        <div class="playcontrol communityControl">
                                            <div title="Play video" class="play-gif" id="circle-play-b">
                                                <!-- SVG Play Button -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
                                                    <path d="M40 0a40 40 0 1040 40A40 40 0 0040 0zM26 61.56V18.44L64 40z" />
                                                </svg>
                                            </div>
                                        </div>
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">

                            <div class="propDesc">
                                {!! $community->description !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Locations --}}
    @if (count($community->stats) > 0)
        <section class="my-5" id="location">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="secHead text-start mb-3">
                                    <h5 class="text-primary">{{ $community->name }} Key Community Stats</h5>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12  my-auto">
                                <div class="">
                                    <ul class="nav latestTabs nav-pills mb-3" id="pills-tab" role="tablist">
                                        @foreach ($community->stats as $stat)
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link text-uppercase fs-12 @if ($loop->first) active @endif"
                                                    id="{{ Str::slug($stat->name) }}TabBtn" data-bs-toggle="pill"
                                                    data-bs-target="#{{ Str::slug($stat->name) }}Tab" type="button"
                                                    role="tab" aria-controls="{{ Str::slug($stat->name) }}Tab"
                                                    aria-selected="true">{{ $stat->name }}</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <div class="tab-content" id="pills-proptabContent">
                                        @foreach ($community->stats as $stat)
                                            <div class="tab-pane  fade @if ($loop->first) show active @endif"
                                                id="{{ Str::slug($stat->name) }}Tab" role="tabpanel"
                                                aria-labelledby="{{ Str::slug($stat->name) }}TabBtn" tabindex="0">

                                                <div class="row g-3">
                                                    <div class="col-12 col-lg-6 col-md-6">
                                                        <div class="bg-lightBlue keyComm p-3 rounded-3">
                                                            @foreach ($stat->values as $key => $data)
                                                                @if ($key % 2 == 0)
                                                                    <div class="borderBottomLst p-2 h-100">
                                                                        <div class="d-flex justify-content-between">
                                                                            <div class="my-auto">
                                                                                <p
                                                                                    class="fs-14  fw-semibold text-primary mb-0">
                                                                                    {{ $data->key }}
                                                                                </p>
                                                                            </div>
                                                                            <div class=" my-auto">
                                                                                <p class="fs-12 text-secondary mb-0">
                                                                                    {{ $data->value }}</p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-md-6">
                                                        <div class="bg-lightBlue keyComm p-3 rounded-3">
                                                            @foreach ($stat->values as $key => $data)
                                                                @if ($key % 2 != 0)
                                                                    <div class="borderBottomLst p-2 h-100">
                                                                        <div class="d-flex justify-content-between">
                                                                            <div class="my-auto">
                                                                                <p
                                                                                    class="fs-14  fw-semibold text-primary mb-0">
                                                                                    {{ $data->key }}
                                                                                </p>
                                                                            </div>
                                                                            <div class=" my-auto">
                                                                                <p class="fs-12 text-secondary mb-0">
                                                                                    {{ $data->value }}</p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- Gallery --}}
    @if (count($community->imageGallery) > 0)
        <section class="my-5" id="gallery">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="secHead text-start mb-3">
                                    <h5 class="text-primary">Image Gallery</h5>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12  my-auto">
                                <div>
                                    <div class="swiper galleryCommunitySlider">
                                        <div class="swiper-wrapper">
                                            @foreach ($community->imageGallery as $gallery)
                                                <div class="swiper-slide">

                                                    <a href="{{ $gallery['path'] }}" data-toggle="lightbox"
                                                        data-gallery="example-gallery">
                                                        <img src="{{ $gallery['path'] }}"
                                                            class="img-fluid rounded-3 galleryImgSize"
                                                            alt="{{ $community->name }}">
                                                        <div class="zoomOverlay"><span class="fa-stack text-center fa-lg">
                                                                <i class="fa fa-square fa-stack-2x text-white"></i>
                                                                <i class="bi bi-search text-primary fs-14 fa-stack-1x"></i>
                                                            </span></div>
                                                    </a>

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-prev">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                <i class="bi bi-chevron-left text-primary mx-1 fs-14 fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <div class="swiper-button-next me-2">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                <i class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @endif
    {{-- Featured Property --}}
    @if (count($projects) > 0 || count($rent) > 0 || count($resale) > 0 || count($exclusive) > 0)
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="secHead text-start mb-3">
                                    <h5 class="text-primary">Featured Properties on {{ $community->name }}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12  my-auto">
                                <div class="">
                                    <ul class="nav latestTabs featureTab justify-content-center nav-pills mb-3" id="pills-tab"
                                        role="tablist">
                                        @if (count($projects) > 0)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link text-uppercase active" id="offplanTab"
                                                    data-bs-toggle="pill" data-bs-target="#offplanBtn" type="button"
                                                    role="tab" aria-controls="offplanBtn"
                                                    aria-selected="true">Off-plan</button>
                                            </li>
                                        @endif
                                        @if (count($resale) > 0)
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link  text-uppercase"
                                                    id="resaleTab" data-bs-toggle="pill" data-bs-target="#resaleBtn"
                                                    type="button" role="tab" aria-controls="resaleBtn"
                                                    aria-selected="false">Resale</button>
                                            </li>
                                        @endif
                                        @if (count($exclusive) > 0)
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link  text-uppercase"
                                                    id="exclusiveTab" data-bs-toggle="pill"
                                                    data-bs-target="#exclusiveBtn" type="button" role="tab"
                                                    aria-controls="exclusiveBtn" aria-selected="false">Exclusive</button>
                                            </li>
                                        @endif
                                        @if (count($rent) > 0)
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link  text-uppercase"
                                                    id="rentalTab" data-bs-toggle="pill" data-bs-target="#rentalBtn"
                                                    type="button" role="tab" aria-controls="rentalBtn"
                                                    aria-selected="false">Rental</button>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div>
                                    <div class="tab-content featureTabContent" id="pills-tabContent">
                                        @if (count($projects) > 0)
                                            <div class="tab-pane  fade show active" id="offplanBtn" role="tabpanel"
                                                aria-labelledby="offplanTab" tabindex="0">
                                                <div class="swiper swiperThumpLatest py-3 px-1">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($projects as $project)
                                                            <div class="swiper-slide h-auto">
                                                                <div class="h-100 ">
                                                                    <div class="card h-100 border-0 shadow">
                                                                        <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                            class="text-decoration-none"><img
                                                                                src="{{ $project->mainImage }}"
                                                                                class="card-img-top lazy"
                                                                                alt="{{ $project->title }}"></a>
                                                                        <div class="card-body">
                                                                            <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                class="text-decoration-none">
                                                                                <h5 class="text-primary mb-1">
                                                                                    {{ substr(strip_tags($project->title), 0, 25) . '...' }}
                                                                                </h5>
                                                                            </a>
                                                                            <ul
                                                                                class="list-unstyled propListSmall lh-1 my-2">
                                                                                <li class="d-inline">
                                                                                    <small>{{ $project->bedrooms ? $project->bedrooms : '' }}
                                                                                        Beds</small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $project->bathrooms > 0 ? $project->bathrooms : '' }}
                                                                                        Baths</small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $project->area ? $project->area : '' }}
                                                                                        {{ $project->area_unit ? $project->area_unit : 'SQ.FT' }}</small>
                                                                                </li>
                                                                            </ul>
                                                                            <small>Starting Price: AED
                                                                                {{ $project->starting_price }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="swiper-button-prev">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-left text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                    <div class="swiper-button-next me-2">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- @if (count($resale) > 0)
                                            <div class="tab-pane  fade"
                                                id="resaleBtn" role="tabpanel" aria-labelledby="resaleTab"
                                                tabindex="0">
                                                <div class="swiper swiperThumpLatest py-3 px-1">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($resale as $sale)
                                                            <div class="swiper-slide">
                                                                <div>
                                                                    <div class="card border-0 shadow">
                                                                        <a href="{{ url('property' . '/' . $sale->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <img src="{{ $sale->mainImage }}"
                                                                                class="card-img-top img-fluid"
                                                                                alt="{{ $sale->name }}">
                                                                        </a>
                                                                        <div class="card-body">
                                                                            <a href="{{ url('property' . '/' . $sale->slug) }}"
                                                                                class="text-decoration-none">
                                                                                <h5 class="text-primary mb-1">
                                                                                    {{ substr(strip_tags($sale->name), 0, 25) . '...' }}
                                                                                </h5>
                                                                            </a>
                                                                            <ul
                                                                                class="list-unstyled propListSmall lh-1 mb-2">
                                                                                <li class="d-inline">
                                                                                    <small>{{ $sale->bedrooms > 0 ? $sale->bedrooms.' Bed' : 'Studio' }}
                                                                                        </small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $sale->bathrooms > 0 ? $sale->bathrooms : '' }}
                                                                                        Bath</small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $sale->area > 0 ? $sale->area : '' }}
                                                                                        SQ.FT</small>
                                                                                </li>
                                                                            </ul>
                                                                            <small
                                                                                class="fw-semibold">{{ $sale->currency ? $sale->currency : 'AED' }}
                                                                                {{ number_format($sale->price) }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="swiper-button-prev">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-left text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                    <div class="swiper-button-next me-2">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (count($exclusive) > 0)
                                            <div class="tab-pane  fade "
                                                id="exclusiveBtn" role="tabpanel" aria-labelledby="exclusiveTab"
                                                tabindex="0">
                                                <div class="swiper swiperThumpLatest py-3 px-1">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($exclusive as $excl)
                                                            <div class="swiper-slide">
                                                                <div>
                                                                    <div class="card border-0 shadow">
                                                                        <a href="{{ url('property' . '/' . $excl->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <img src="{{ $excl->mainImage }}"
                                                                                class="card-img-top img-fluid"
                                                                                alt="{{ $excl->name }}">
                                                                        </a>
                                                                        <div class="card-body">
                                                                            <a href="{{ url('property' . '/' . $excl->slug) }}"
                                                                                class="text-decoration-none">
                                                                                <h5 class="text-primary mb-1">
                                                                                    {{ substr(strip_tags($excl->name), 0, 25) . '...' }}
                                                                                </h5>
                                                                            </a>
                                                                            <ul
                                                                                class="list-unstyled propListSmall lh-1 mb-2">
                                                                                <li class="d-inline">
                                                                                    <small>{{ $excl->bedrooms > 0 ? $excl->bedrooms.' Bed' : 'Studio' }}
                                                                                        </small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $excl->bathrooms > 0 ? $excl->bathrooms : '' }}
                                                                                        Bath</small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $excl->area > 0 ? $excl->area : '' }}
                                                                                        SQ.FT</small>
                                                                                </li>
                                                                            </ul>
                                                                            <small
                                                                                class="fw-semibold">{{ $excl->currency ? $excl->currency : 'AED' }}
                                                                                {{ number_format($excl->price) }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="swiper-button-prev">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-left text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                    <div class="swiper-button-next me-2">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (count($rent) > 0)
                                            <div class="tab-pane  fade"
                                                id="rentalBtn" role="tabpanel" aria-labelledby="rentalTab"
                                                tabindex="0">
                                                <div class="swiper swiperThumpLatest py-3 px-1">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($rent as $rents)
                                                            <div class="swiper-slide">
                                                                <div>
                                                                    <div class="card border-0 shadow">
                                                                        <a href="{{ url('property' . '/' . $rents->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <img src="{{ $rents->mainImage }}"
                                                                                class="card-img-top img-fluid"
                                                                                alt="{{ $rents->name }}">
                                                                        </a>
                                                                        <div class="card-body">
                                                                            <a href="{{ url('property' . '/' . $rents->slug) }}"
                                                                                class="text-decoration-none">
                                                                                <h5 class="text-primary mb-1">
                                                                                    {{ substr(strip_tags($rents->name), 0, 25) . '...' }}
                                                                                </h5>
                                                                            </a>
                                                                            <ul
                                                                                class="list-unstyled propListSmall lh-1 mb-2">
                                                                                <li class="d-inline">
                                                                                    <small>{{ $rents->bedrooms > 0 ? $rents->bedrooms : '' }}
                                                                                        Beds</small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $rents->bathrooms > 0 ? $rents->bathrooms : '' }}
                                                                                        Baths</small>
                                                                                </li>
                                                                                <li class="d-inline">
                                                                                    <small>{{ $rents->area > 0 ? $rents->area : '' }}
                                                                                        SQ.FT</small>
                                                                                </li>
                                                                            </ul>
                                                                            <small
                                                                                class="fw-semibold">{{ $rents->currency ? $rents->currency : 'AED' }}
                                                                                {{ number_format($rents->price) }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="swiper-button-prev">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-left text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                    <div class="swiper-button-next me-2">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                            <i
                                                                class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @endif
    {{-- Agents --}}
    <section class="my-5" id="agent">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">

                        <div class="col-12 col-lg-6 col-md-6 my-auto">
                            <div>
                                <div class="secHead text-center text-md-start text-lg-start mb-3">
                                    <h2 class="text-primary">Talk to a specialist</h2>
                                </div>
                                <div class="text-center text-md-start text-lg-start">
                                    <p>Our team of Luxury Sales Specialists is dedicated to providing you with exceptional service and expertise to consider before making any property purchase or sale. Each specialist focuses on a specific area in Dubai and possesses an in-depth knowledge of the local market.</p>
                                </div>
                                <div class="agentSearch">
                                    <div class="pcAgentForm">
                                        <form action="{{ route('agents') }}" method="post" id="agentSearchForm">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12 col-lg-4">
                                                    <div class="input-group input-group-solid flex-nowrap">
                                                        <span class="input-group-text bg-transparent p-1 ps-2"><i
                                                                class="bi bi-search fs-13"></i></span>
                                                        <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                            <select
                                                                class="form-control propertySelect1 h-100 form-select-solid border-start-0 rounded-start-0"
                                                                data-control="select2" name="keywords[]"
                                                                data-placeholder="Enter Project or Community" multiple>
                                                                @foreach ($searchKey as $item)
                                                                    <option value="{{ $item }}"
                                                                        @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                                                                            {{ $keyword == $item ? 'selected' : '' }}
                                                                                                        @endforeach @endif>
                                                                        {{ $item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <select class="form-control propertySelect1" name="language[]" multiple
                                                        data-placeholder="Languages">
                                                        @foreach ($languages as $lang)
                                                            <option value="{{ $lang->id }}"
                                                                @if (isset($data['language'])) @foreach ($data['language'] as $langs)
                                                                                                    {{ $langs == $lang->id ? 'selected' : '' }}
                                                                                                @endforeach @endif>
                                                                {{ $lang->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <select class="form-control propertySelect1" name="service[]" multiple
                                                        data-placeholder="Service needed">
                                                        @foreach ($serviceAll as $service)
                                                            <option value="{{ $service->id }}"
                                                                @if (isset($data['service'])) @foreach ($data['service'] as $serv)
                                                                                                    {{ $serv == $service->id ? 'selected' : '' }}
                                                                                                @endforeach @endif>
                                                                {{ $service->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <select class="form-control propertySelect1" name="nationality[]"
                                                        multiple data-placeholder="Nationality">
                                                        @foreach ($nationality as $nation)
                                                            <option value="{{ $nation->nationality }}"
                                                                @if (isset($data['nationality'])) @foreach ($data['nationality'] as $nat)
                                                                                                    {{ $nat == $nation->nationality ? 'selected' : '' }}
                                                                                                @endforeach @endif>
                                                                {{ $nation->nationality }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <button type="submit" class="btn btn-primary">Find Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mobAgentForm">
                                        <form action="{{ route('agents') }}" method="post" id="agentSearchForm">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-6 col-lg-4 my-auto">
                                                    <div class="input-group input-group-solid flex-nowrap mb-2">
                                                        <span class="input-group-text bg-transparent pe-1"><i
                                                                class="bi bi-search fs-14"></i></span>
                                                        <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                            <select
                                                                class="form-control propertySelect1 h-100 form-select-solid  border-start-0 rounded-start-0"
                                                                data-control="select2" name="keywords[]"
                                                                data-placeholder="Enter Project or Community" multiple>
                                                                @foreach ($searchKey as $item)
                                                                    <option value="{{ $item }}"
                                                                        @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                                                                            {{ $keyword == $item ? 'selected' : '' }}
                                                                                                        @endforeach @endif>
                                                                        {{ $item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-5 col-lg-4 my-auto">
                                                    <div class="mb-2">
                                                        <select
                                                            class="form-control propertySelect1 h-100 form-select-solid"
                                                            name="language[]" multiple data-placeholder="Languages">
                                                            @foreach ($languages as $lang)
                                                                <option value="{{ $lang->id }}"
                                                                    @if (isset($data['language'])) @foreach ($data['language'] as $langs)
                                                                                                    {{ $langs == $lang->id ? 'selected' : '' }}
                                                                                                @endforeach @endif>
                                                                    {{ $lang->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-1 col-lg-4 my-auto">
                                                    <button class="btn btn-primary mb-2 px-2 my-auto fs-14" type="button"
                                                        id="button-addon2">
                                                        <i class="bi bi-plus agentAdvbtn text-white"></i>
                                                        <i class="bi bi-dash-lg agentAdvMinbtn text-white d-none"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 my-auto">
                                                <div class="advAgentMobForm d-none">
                                                    <div class="row g-1">
                                                        <div class="col-6 col-lg-4 my-auto">
                                                            <div class="mb-2">
                                                                <select
                                                                    class="form-control propertySelect1 h-100 form-select-solid"
                                                                    name="service[]" multiple
                                                                    data-placeholder="Service needed">
                                                                    @foreach ($serviceAll as $service)
                                                                        <option value="{{ $service->id }}"
                                                                            @if (isset($data['service'])) @foreach ($data['service'] as $serv)
                                                                                                            {{ $serv == $service->id ? 'selected' : '' }}
                                                                                                        @endforeach @endif>
                                                                            {{ $service->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-lg-4 my-auto">
                                                            <div class="mb-2">
                                                                <select
                                                                    class="form-control propertySelect1 h-100 form-select-solid"
                                                                    name="nationality[]" multiple
                                                                    data-placeholder="Nationality">
                                                                    @foreach ($nationality as $nation)
                                                                        <option value="{{ $nation->nationality }}"
                                                                            @if (isset($data['nationality'])) @foreach ($data['nationality'] as $nat)
                                                                                                            {{ $nat == $nation->nationality ? 'selected' : '' }}
                                                                                                        @endforeach @endif>
                                                                            {{ $nation->nationality }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 my-auto">
                                                    <div class="text-center mt-2">
                                                        <button type="submit" class="btn btn-primary">Find Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 my-auto">
                            <div class="slider-div px-0 px-md-1 px-lg-5">

                                <!-- Swiper -->

                                <div class="swiper  @if(count($agents) <= 3) agentSwiperLess @else agentSwiper @endif ">
                                    <div class="swiper-wrapper">
                                        @foreach ($agents as $agent)
                                        <div class="swiper-slide">

                                            <div class="agentCont @if(count($agents) <= 3) d-flex justify-content-center @endif">
                                                <div class="card border-0 shadow my-3 rounded-4">
                                                    <img src="{{ $agent->image }}"
                                                        class="card-img-top img-fluid agentImg"
                                                        alt="Unique Properties">
                                                    <div class="bg-white">
                                                        <div class="border-bottom">
                                                            <div class="d-flex justify-content-between p-2">
                                                                <div class="text-primary my-auto">
                                                                    <a href="{{ url('agent/' . $agent->slug) }}"
                                                                        class="text-decoration-none">
                                                                        <h6 class="mb-0 text-primary">
                                                                            {{ $agent->name }}</h6>
                                                                    </a>
                                                                    <p class="mb-0">{{ $agent->designation }}</p>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <div class="d-flex justify-content-evenly">
                                                                        <a href="https://wa.me/{{ $agent->whatsapp_number }}"
                                                                            class="text-decoration-none"
                                                                            target="_blank">
                                                                            <img class="img-fluid mx-2"
                                                                                src="{{ asset('frontend/assets/images/icons/whatsapp.png') }}"
                                                                                width="20px" />
                                                                        </a>
                                                                        <a href="tel:{{ $agent->contact_number }}"
                                                                            class="text-decoration-none">
                                                                            <img class="img-fluid mx-2"
                                                                                src="{{ asset('frontend/assets/images/icons/call.png') }}"
                                                                                width="15px" />
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-2">
                                                            <p class="mb-0 fw-semibold">Language :
                                                                {{ $agent->languages->implode('name', ',') }}</p>
                                                            @if($agent->experience)
                                                            <p class="mb-0 fw-semibold">Experience :
                                                                {{ $agent->experience }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    <div class="swiper-button-prev">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                            <i class="bi bi-chevron-left text-primary mx-1 fs-14 fa-stack-1x"></i>
                                        </span>
                                    </div>
                                    <div class="swiper-button-next me-2">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                            <i class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6  offset-lg-6">
                            <div class="text-center text-md-center text-lg-center mt-4">
                                <a href="{{route('agents')}}" class="btn btn-primary  text-uppercase rounded-pill px-3">View All
                                    Agents</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $(".featureTab li:first .nav-link").addClass("active");
            $(".featureTabContent .tab-pane:first").addClass("active show");
        });
    </script>
@endsection
