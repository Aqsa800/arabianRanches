@extends('frontend.layout.master')
@if ($project->meta_title != '')
    @section('title', $project->meta_title)
@else
    @section('title', $project->title)
@endif
@if ($project->meta_description != '')
    @section('pageDescription', $project->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($project->meta_keyword != '')
    @section('pageKeyword', $project->meta_keyword)
@else
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{ $project->mainImage }}');min-height:92vh !important;padding-top:92px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    @if ($project->video)
                        <div class="text-center mb-3 mb-md-0 mb-lg-0">
                            <button type="button" class="btn btn-outline-light rounded-circle p-3 bg-lightOlive"
                                data-bs-toggle="modal" data-bs-target="#videoModal"><i
                                    class="bi bi-play-fill fa-2x lh-1"></i></button>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-lg-12">
                    <h1 class="bannerHeading text-uppercase text-white text-center mb-0">{{ $project->title }}</h1>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="position-bottom">
                        <div class="d-flex justify-content-center px-3 mt-3 pb-3">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('dubai-offplans') }}">Project</a></li>
                                <li><a>{{ $project->title }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About --}}
    <section class="bg-lightBlue py-5" id="factsheets">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row g-3">

                        <div class="col-12 col-lg-6 col-md-6">
                            <div>
                                <div class="secHead text-start mb-3">
                                    <h1 class="text-primary text-uppercase">{{ $project->title }}</h1>
                                </div>
                                <div class="d-block d-md-none d-lg-none">
                                    <div class="swiper mb-3 swiperProDet">
                                        <div class="swiper-wrapper">
                                            @if ($project->starting_price)
                                                <div class="swiper-slide">
                                                    <div class="d-flex justify-content-center h-100">
                                                        <div class="my-auto me-3">
                                                            <center>
                                                                <img src="{{ asset('frontend/assets/images/icons/wallet.png') }}"
                                                                    alt="Unique Properties Logo "
                                                                    class="img-fluid amenityImg50">
                                                            </center>
                                                        </div>
                                                        <div class="text-primary text-uppercase my-auto">
                                                            <h6 class="fw-bold mb-0">AED {{ $project->starting_price }}</h6>
                                                            <p class="fs-12 text-secondary mb-0">Starting Price</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @if ($project->completion_date)
                                                <div class="swiper-slide">
                                                    <div class="d-flex justify-content-center h-100">
                                                        <div class="my-auto me-3">
                                                            <center>
                                                                <img src="{{ asset('frontend/assets/images/icons/home.png') }}"
                                                                    alt="Unique Properties Logo "
                                                                    class="img-fluid amenityImg50">
                                                            </center>
                                                        </div>
                                                        <div class="text-primary text-uppercase my-auto">
                                                            <h6 class="fw-bold mb-0">{{ $project->completion_date }}</h6>
                                                            <p class="fs-12 text-secondary mb-0">Completion Date</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @if ($project->area)
                                                <div class="swiper-slide">
                                                    <div class="d-flex justify-content-center h-100">
                                                        <div class="my-auto me-3">
                                                            <center>
                                                                <img src="{{ asset('frontend/assets/images/icons/plot.png') }}"
                                                                    alt="Unique Properties Logo "
                                                                    class="img-fluid amenityImg50">
                                                            </center>
                                                        </div>
                                                        <div class="text-primary text-uppercase my-auto">
                                                            <h6 class="fw-bold mb-0">
                                                                {{ $project->area ? $project->area : '' }}
                                                                {{ $project->area_unit ? $project->area_unit : 'sqft' }}
                                                            </h6>
                                                            <p class="fs-12 text-secondary mb-0">Total Area</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @if ($project->accommodations)
                                                <div class="swiper-slide">
                                                    <div class="d-flex justify-content-center h-100">
                                                        <div class="my-auto me-3">
                                                            <center>
                                                                <img src="{{ asset('frontend/assets/images/icons/apartment.png') }}"
                                                                    alt="Unique Properties Logo "
                                                                    class="img-fluid amenityImg50">
                                                            </center>
                                                        </div>
                                                        <div class="text-primary text-uppercase my-auto">
                                                            <h6 class="fw-bold mb-0">
                                                                {{ $project->accommodations->implode('name', ', ') }}</h6>
                                                            <p class="fs-12 text-secondary mb-0">Property Type</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @if ($project->mainCommunity)
                                                <div class="swiper-slide">
                                                    <div class="d-flex justify-content-center h-100">
                                                        <div class="my-auto me-3">
                                                            <center>
                                                                <img src="{{ asset('frontend/assets/images/icons/map.png') }}"
                                                                    alt="Unique Properties Logo "
                                                                    class="img-fluid amenityImg50">
                                                            </center>
                                                        </div>
                                                        <div class="text-primary text-uppercase my-auto">
                                                            <h6 class="fw-bold mb-0">{{ $project->mainCommunity->name }},
                                                                {{ $project->emirate }}</h6>
                                                            <p class="fs-12 text-secondary mb-0">Location</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    {!! $project->short_description !!}
                                </div>
                                <div class="d-grid gap-3 d-none d-md-flex d-lg-flex pt-3">
                                    @if ($project->brochure)
                                        <button class="btn btn-primary btnRegisterDownload rounded-pill px-3"
                                            data-bs-toggle="modal" data-bs-target="#modalView"
                                            propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                            fileUrl={{ $project->brochure }} formName="Download Brochure"
                                            type="button">Download
                                            Brochure</button>
                                    @endif

                                    @if ($project->floorPlan && $project->floorPlan->floorPlanFile)
                                        <button id="floorplan" class="btn btn-primary btnRegisterDownload rounded-pill px-3"
                                            data-bs-toggle="modal" data-bs-target="#modalView"
                                            propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                            fileUrl={{ $project->floorPlan->floorPlanFile }} formName="Download Floor Plan"
                                            type="button">Download
                                            Floor Plan </button>
                                    @endif

                                    @if ($project->factsheet )
                                        <button id="factsheet" class="btn btn-primary btnRegisterDownload rounded-pill px-3"
                                            data-bs-toggle="modal" data-bs-target="#modalView"
                                            propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                            fileUrl={{ $project->factsheet }} formName="Download Factsheet"
                                            type="button">Download Factsheet </button>
                                    @endif
                                </div>
                                <div class="d-grid gap-3 d-none d-md-flex d-lg-flex pt-3">
                                    <button class="btn btn-primary btnModal  rounded-pill px-3" data-bs-toggle="modal"
                                        data-bs-target="#modalView"
                                        propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                        formName="Enquire Now" type="button">Enquire Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <div class="my-auto">
                                    <h5 class="mb-0 text-primary">Off-Plan properties launched by
                                        {{ $project->developer->name }} PRICES
                                        STARTING: AED {{ $project->starting_price }} </h5>
                                </div>
                            </div>
                            <div>
                                <div class="propDesc d-none d-md-block d-lg-block">
                                    <div class="textLessProp d-block">
                                        {!! substr(strip_tags($project->long_description), 0, 500) !!}
                                    </div>
                                    <div class="textExtraProp d-none">
                                        {!! $project->long_description !!}
                                    </div>
                                    @if ($project->long_description)
                                        <a class="text-primary readMorePropBtn cursor-pointer">Read More</a>
                                        <a class="text-primary readLessPropBtn cursor-pointer  d-none">Read
                                            Less</a>
                                    @endif
                                </div>
                                <div class="propDesc d-block d-md-none d-lg-none">
                                    <div class="textLessProp d-block">
                                        {!! substr(strip_tags($project->long_description), 0, 300) !!}
                                    </div>
                                    <div class="textExtraProp d-none">
                                        {!! $project->long_description !!}
                                    </div>
                                    @if ($project->long_description)
                                        <a class="text-primary readMorePropBtn cursor-pointer">Read More</a>
                                        <a class="text-primary readLessPropBtn cursor-pointer  d-none">Read
                                            Less</a>
                                    @endif
                                </div>
                            </div>
                            <div class="d-grid gap-3 d-flex d-md-none d-lg-none pt-3">
                                @if ($project->brochure)
                                    <button class="btn btn-primary rounded-pill btnRegisterDownload px-3"
                                        propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                        fileUrl={{ $project->brochure }} data-bs-toggle="modal"
                                        data-bs-target="#modalView" formName="Download Brochure" type="button">Download
                                        Brochure</button>
                                @endif
                                @if ($project->floorPlan && $project->floorPlan->floorPlanFile)
                                    <button id="floorplan" class="btn btn-primary rounded-pill btnRegisterDownload px-3"
                                        propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                        fileUrl={{ $project->floorPlan->floorPlanFile }} data-bs-toggle="modal"
                                        data-bs-target="#modalView" formName="Download Floor Plan"
                                        type="button">Download
                                        Floor Plan </button>
                                @endif
                                @if ($project->factsheet )
                                        <button id="factsheet" class="btn btn-primary btnRegisterDownload rounded-pill px-3"
                                            data-bs-toggle="modal" data-bs-target="#modalView"
                                            propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                            fileUrl={{ $project->factsheet }} formName="Download Factsheet"
                                            type="button">Download Factsheet </button>
                                @endif
                                <button class="btn btn-primary  rounded-pill btnModal px-3"
                                    propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                    data-bs-toggle="modal" data-bs-target="#modalView" formName="Enquire Now"
                                    type="button">Enquire Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Project Detail --}}

    <section class="mb-5 bg-lightBlue d-none d-md-block d-lg-block py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="swiper pb-5 swiperProDet">
                                <div class="swiper-wrapper">
                                    @if ($project->starting_price)
                                        <div class="swiper-slide">
                                            <div class="d-flex justify-content-center">
                                                <div class="my-auto me-3">
                                                    <center>
                                                        <img src="{{ asset('frontend/assets/images/icons/wallet.png') }}"
                                                            alt="Unique Properties Logo " class="img-fluid amenityImg50">
                                                    </center>
                                                </div>
                                                <div class="text-primary text-uppercase my-auto">
                                                    <h6 class="fw-bold mb-0">AED {{ $project->starting_price }}</h6>
                                                    <p class="fs-12 text-secondary mb-0">Starting Price</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @if ($project->completion_date)
                                        <div class="swiper-slide">
                                            <div class="d-flex justify-content-center">
                                                <div class="my-auto me-3">
                                                    <center>
                                                        <img src="{{ asset('frontend/assets/images/icons/home.png') }}"
                                                            alt="Unique Properties Logo " class="img-fluid amenityImg50">
                                                    </center>
                                                </div>
                                                <div class="text-primary text-uppercase my-auto">
                                                    <h6 class="fw-bold mb-0">{{ $project->completion_date }}</h6>
                                                    <p class="fs-12 text-secondary mb-0">Completion Date</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @if ($project->area)
                                        <div class="swiper-slide">
                                            <div class="d-flex justify-content-center">
                                                <div class="my-auto me-3">
                                                    <center>
                                                        <img src="{{ asset('frontend/assets/images/icons/plot.png') }}"
                                                            alt="Unique Properties Logo " class="img-fluid amenityImg50">
                                                    </center>
                                                </div>
                                                <div class="text-primary text-uppercase my-auto">
                                                    <h6 class="fw-bold mb-0">{{ $project->area ? $project->area : '' }}
                                                        {{ $project->area_unit ? $project->area_unit : 'sqft' }}</h6>
                                                    <p class="fs-12 text-secondary mb-0">Total Area</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @if ($project->accommodations)
                                        <div class="swiper-slide">
                                            <div class="d-flex justify-content-center">
                                                <div class="my-auto me-3">
                                                    <center>
                                                        <img src="{{ asset('frontend/assets/images/icons/apartment.png') }}"
                                                            alt="Unique Properties Logo " class="img-fluid amenityImg50">
                                                    </center>
                                                </div>
                                                <div class="text-primary text-uppercase my-auto">
                                                    <h6 class="fw-bold mb-0">
                                                        {{ $project->accommodations->implode('name', ', ') }}</h6>
                                                    <p class="fs-12 text-secondary mb-0">Property Type</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @if ($project->mainCommunity)
                                        <div class="swiper-slide">
                                            <div class="d-flex justify-content-center">
                                                <div class="my-auto me-3">
                                                    <center>
                                                        <img src="{{ asset('frontend/assets/images/icons/map.png') }}"
                                                            alt="Unique Properties Logo " class="img-fluid amenityImg50">
                                                    </center>
                                                </div>
                                                <div class="text-primary text-uppercase my-auto">
                                                    <h6 class="fw-bold mb-0">{{ $project->mainCommunity->name }},
                                                        {{ $project->emirate }}</h6>
                                                    <p class="fs-12 text-secondary mb-0">Location</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section class="my-5" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row colRev">

                        <div class="col-12 col-lg-6 col-md-12 my-auto">
                            <div class="py-3">
                                <div class="swiper swiperFeatProp">
                                    <div class="swiper-wrapper">
                                        @if (count($project->exteriorGallery) > 0)
                                            @foreach ($project->exteriorGallery as $key => $imgs)
                                                @if ($key < 3)
                                                    <div class="swiper-slide">
                                                        <div class="">
                                                            <center>
                                                                <a href="{{ $imgs['path'] }}" data-toggle="lightbox"
                                                                    data-gallery="feature-gallery"
                                                                    class="text-decoration-none">
                                                                    <img src="{{ $imgs['path'] }}"
                                                                        class="img-fluid rounded-3 featImg1000"
                                                                        alt="{{ $project->title }}">
                                                                </a>
                                                            </center>
                                                        </div>
                                                    </div>
                                                @else
                                                @break
                                            @endif
                                        @endforeach
                                    @elseif(count($project->interiorGallery) > 0)
                                        @foreach ($project->interiorGallery as $key => $imgs)
                                            @if ($key < 3)
                                                <div class="swiper-slide">
                                                    <div class="">
                                                        <center>
                                                            <a href="{{ $imgs['path'] }}" data-toggle="lightbox"
                                                                data-gallery="feature-gallery"
                                                                class="text-decoration-none">
                                                                <img src="{{ $imgs['path'] }}"
                                                                    class="img-fluid rounded-3 featImg1000"
                                                                    alt="{{ $project->title }}">
                                                            </a>
                                                        </center>
                                                    </div>
                                                </div>
                                            @else
                                            @break
                                        @endif
                                    @endforeach
                                @else
                                    <div class="swiper-slide">
                                        <div class="">
                                            <center>
                                                <a href="{{ $project->mainImage }}" data-toggle="lightbox"
                                                    data-gallery="feature-gallery" class="text-decoration-none">
                                                    <img src="{{ $project->mainImage }}"
                                                        class="img-fluid rounded-3 featImg1000"
                                                        alt="{{ $project->title }}">
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="swiper-button-prev">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                </span>
                            </div>
                            <div class="swiper-button-next me-2">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-12">
                    @if ($project->features_description)
                        <div class="secHead text-start mb-3">
                            <h2 class="text-primary">Features</h2>
                        </div>
                        <div>
                            <div class="propFeat">
                                {!! $project->features_description !!}
                            </div>
                        </div>
                    @endif
                    @if (count($project->amenities) > 0)
                        <div class="mb-3">
                            <div class="my-auto">
                                <h5 class="mb-0 text-primary">Amenities</h5>
                            </div>
                        </div>
                        <div>
                            <div class="swiper py-3 px-1 amenitySlider">
                                <div class="swiper-wrapper">
                                    @foreach ($project->amenities as $ameni)
                                        <div class="swiper-slide h-auto">
                                            <div
                                                class="shadow text-center w-100 h-100 d-flex flex-column justify-content-center p-2 rounded-3">
                                                <div class="mb-1">
                                                    <center>
                                                        <img src="{{ $ameni->image ? $ameni->image : asset('frontend/assets/images/icons/home.png') }}"
                                                            alt="{{ $ameni->name }}"
                                                            class="img-fluid amenityImg">
                                                    </center>
                                                </div>
                                                <div class="text-primary my-auto">
                                                    <p class="fs-12 text-primary  fw-semibold mb-0">
                                                        {{ $ameni->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                    </span>
                                </div>
                                <div class="swiper-button-next me-2">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</section>

{{-- Locations --}}
<section class="my-5" id="location">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="row">
                @if ($project->address_longitude && $project->address_latitude)
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="secHead text-center mb-3">
                            <h2 class="text-primary">Location</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div>
                            <div>
                                <iframe
                                    src="https://maps.google.com/maps?q={{ $project->address_latitude ? $project->address_latitude : '' }},{{ $project->address_longitude ? $project->address_longitude : '' }}&z=17&ie=UTF8&iwloc=&output=embed"
                                    width="100%" height="350" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                @endif
                @if (count($project->stats) > 0)
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="">
                            <ul class="nav latestTabs nav-pills mb-3" id="pills-tab" role="tablist">
                                @foreach ($project->stats as $stat)
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link text-capitalize @if ($loop->first) active @endif"
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
                                @foreach ($project->stats as $stats)
                                    <div class="tab-pane  fade  @if ($loop->first) show active @endif"
                                        id="{{ Str::slug($stats->name) }}Tab" role="tabpanel"
                                        aria-labelledby="{{ Str::slug($stats->name) }}TabBtn" tabindex="0">
                                        <div class="bg-lightBlue  p-3 rounded-3">
                                            <div class="row g-3">
                                                @foreach ($stats->values as $key => $data)
                                                    <div class="col-6 col-lg-6 col-md-12 keyComm">
                                                        <div class="borderBottomLst border-bottom p-2 h-100">
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

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</section>

{{-- Gallery --}}
@if (count($project->exteriorGallery) > 0 || count($project->interiorGallery) > 0)
<section class="my-5" id="gallery">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="secHead text-center mb-3">
                            <h2 class="text-primary">{{ $project->title }}</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12  my-auto">
                        <div class="">
                            <ul class="nav latestTabs galleryTab justify-content-center nav-pills mb-3"
                                id="pills-tab" role="tablist">
                                @if (count($project->exteriorGallery) > 0)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-capitalize" id="exteriorTabBtn"
                                            data-bs-toggle="pill" data-bs-target="#exteriorTab" type="button"
                                            role="tab" aria-controls="exteriorTab"
                                            aria-selected="true">Exterior</button>
                                    </li>
                                @endif
                                @if (count($project->interiorGallery) > 0)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link  text-capitalize" id="interiorTabBtn"
                                            data-bs-toggle="pill" data-bs-target="#interiorTab" type="button"
                                            role="tab" aria-controls="interiorTab"
                                            aria-selected="false">Interior</button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div>
                            <div class="tab-content galleryTabContent" id="pills-tabContent">
                                @if (count($project->exteriorGallery) > 0)
                                    <div class="tab-pane  fade" id="exteriorTab" role="tabpanel"
                                        aria-labelledby="exteriorTabBtn" tabindex="0">
                                        <div class="swiper pt-3 gallerySlider">
                                            <div class="swiper-wrapper">
                                                @foreach ($project->exteriorGallery as $key => $imgs)
                                                    <div class="swiper-slide">

                                                        <a href="{{ $imgs['path'] }}" data-toggle="lightbox"
                                                            data-gallery="example-gallery">
                                                            <img src="{{ $imgs['path'] }}"
                                                                class="img-fluid rounded-3"
                                                                alt="{{ $project->title }}">
                                                        </a>

                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-button-prev">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                    <i
                                                        class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                </span>
                                            </div>
                                            <div class="swiper-button-next me-2">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                    <i
                                                        class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                                @if (count($project->interiorGallery) > 0)
                                    <div class="tab-pane  fade " id="interiorTab" role="tabpanel"
                                        aria-labelledby="interiorTabBtn" tabindex="0">
                                        <div class="swiper pt-3 gallerySlider">
                                            <div class="swiper-wrapper">
                                                @foreach ($project->interiorGallery as $key => $imgs)
                                                    <div class="swiper-slide">

                                                        <a href="{{ $imgs['path'] }}" data-toggle="lightbox"
                                                            data-gallery="example-gallery2">
                                                            <img src="{{ $imgs['path'] }}"
                                                                class="img-fluid rounded-3"
                                                                alt="{{ $project->title }}">
                                                        </a>

                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-button-prev">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                    <i
                                                        class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                </span>
                                            </div>
                                            <div class="swiper-button-next me-2">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                    <i
                                                        class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
{{-- Payment Plan --}}
@if (count($project->paymentPlans) > 0)
<section class="my-5 pb-5 border-bottom" id="payment">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row g-3 justify-content-center">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="secHead text-center mb-3">
                            <h2 class="text-primary">Payment Plan</h2>
                        </div>
                    </div>
                    @foreach ($project->paymentPlans as $pay)
                        <div class="col-4 col-lg-3 col-md-3 my-auto payPlan">
                            <div class="text-center">
                                <h2 class="text-primary fw-semibold mb-0">{{ $pay->value }}</h2>
                                <p class="text-primary fw-semibold">{{ $pay->name }}</p>
                            </div>
                        </div>
                    @endforeach
                    @if ($project->paymentPlan)
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="text-center">
                                <button class="btn btn-primary btnRegisterDownload px-3"
                                    propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                    fileUrl={{ $project->paymentPlan }} formName="Download Payment Plan"
                                    data-bs-toggle="modal" data-bs-target="#modalView" type="button">Download
                                    Payment Plan</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
{{-- Projects --}}
@if (count($project->subProjects) > 0)
<section class="my-5 " id="floorplan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="secHead text-center mb-5">
                    <h2 class="text-primary">{{ $project->title }} Properties</h2>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row bg-lightBlue p-1 p-md-2 p-lg-5">

                    <div class="col-12 col-lg-4 col-md-4">
                        <div class="text-center">
                            <div class="nav navPropject flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($project->subProjects as $key => $subPro)
                                    <button class="nav-link  @if ($loop->first) active @endif"
                                        id="project{{ $key + 1 }}Btn" data-bs-toggle="pill"
                                        data-bs-target="#project{{ $key + 1 }}Tab" type="button"
                                        role="tab" aria-controls="project{{ $key + 1 }}Tab"
                                        aria-selected="true">{{ $key + 1 }}. {{ $subPro->title }} <i
                                            class="bi bi-chevron-right"></i></button>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-md-8">
                        <div class=" bg-white p-3 rounded-3">
                            <div class="tab-content" id="v-pills-tabContent">
                                @foreach ($project->subProjects as $key => $subPro)
                                    <div class="tab-pane fade  @if ($loop->first) show active @endif"
                                        id="project{{ $key + 1 }}Tab" role="tabpanel"
                                        aria-labelledby="project{{ $key + 1 }}Btn" tabindex="0">
                                        <div>
                                            <h5 class="text-primary">{{ $subPro->title }}</h5>
                                            <p class="text-primary fw-semibold mb-0">Starting Price AED
                                                {{ $subPro->starting_price }}</p>
                                            <div class="propDesc">
                                                {!! $subPro->short_description !!}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row g-3">
                                                @foreach ($subPro->amenities as $item)
                                                    <div class="col-4 col-lg-3">
                                                        <div class="shadow text-center p-2 rounded-3">
                                                            <div class="mb-1">
                                                                <center>
                                                                    <img src="{{ $item->image ? $item->image : asset('frontend/assets/images/icons/home.png') }}"
                                                                        alt="{{ $subPro->title }}"
                                                                        class="img-fluid" width="40px">
                                                                </center>
                                                            </div>
                                                            <div class="text-primary my-auto">
                                                                <p class="fs-12 text-primary fw-semibold mb-0">
                                                                    {{ $item->name }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if (count($subPro->projectBedrooms) > 0)
                                            <div>
                                                <ul class="nav latestTabs nav-pills my-3" id="pills-tab"
                                                    role="tablist">
                                                    @foreach ($subPro->projectBedrooms as $bedrooms)
                                                        <li class="nav-item" role="presentation">
                                                            <button
                                                                class="nav-link  text-capitalize @if ($loop->first) active @endif"
                                                                id="bed{{ $bedrooms->bedroom_number }}Tab"
                                                                data-bs-toggle="pill"
                                                                data-bs-target="#bed{{ $bedrooms->bedroom_number }}Btn"
                                                                type="button" role="tab"
                                                                aria-controls="bed{{ $bedrooms->bedroom_number }}Btn"
                                                                aria-selected="true">{{ $bedrooms->bedroom_number }}
                                                                Bedroom</button>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <div>
                                                <div class="tab-content" id="pills-tabContent">
                                                    @foreach ($subPro->projectBedrooms as $bedrooms)
                                                        <div class="tab-pane fade  @if ($loop->first) show active @endif"
                                                            id="bed{{ $bedrooms->bedroom_number }}Btn"
                                                            role="tabpanel"
                                                            aria-labelledby="bed{{ $bedrooms->bedroom_number }}Tab"
                                                            tabindex="0">
                                                            <div class="row">
                                                                @if (count($bedrooms->details) > 0)
                                                                    <div
                                                                        class="col-12 col-lg-6 col-md-6 displayInline">
                                                                        @foreach ($bedrooms->details as $detail)
                                                                            <div
                                                                                class="d-flex justify-content-start py-3">
                                                                                <div
                                                                                    class="my-auto  me-3 pe-3 border-end">
                                                                                    <center>
                                                                                        <img src="{{ $detail->icon }}"
                                                                                            alt="{{ $subPro->title }}"
                                                                                            class="img-fluid"
                                                                                            width="50px">
                                                                                    </center>
                                                                                </div>
                                                                                <div class="text-primary my-auto">
                                                                                    <p
                                                                                        class="fs-14 text-secondary mb-0">
                                                                                        {{ $detail->name }}</p>
                                                                                    <h6 class="fw-bold mb-0">
                                                                                        {{ $detail->value }}</h6>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                @endif
                                                                <div class="col-12 col-lg-6 col-md-6">
                                                                    <div>
                                                                        <center><a
                                                                                href="{{ $bedrooms->floorPlanImage }}"
                                                                                data-toggle="lightbox"><img
                                                                                    src="{{ $bedrooms->floorPlanImage }}"
                                                                                    alt="{{ $subPro->title }}"
                                                                                    class="img-fluid"></a>
                                                                        </center>
                                                                    </div>
                                                                    @if ($bedrooms->floorPlanFile)
                                                                        <div class="text-center mt-2">
                                                                            <button
                                                                                class="btn btn-secondary btn-light btnRegisterDownload  rounded-pill px-3"
                                                                                propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                fileUrl={{ $bedrooms->floorPlanFile }}
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modalView"
                                                                                formName="Download Floor Plan"
                                                                                type="button">Download Floor
                                                                                Plan</button>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
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
{{-- Agents --}}
<section class="my-5" id="agent">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="row">

                <div class="col-12 col-lg-6 col-md-6 my-auto">
                    <div>
                        <div class="secHead text-start mb-3">
                            <h2 class="text-primary">Talk to a specialist</h2>
                        </div>
                        <div>
                            <p>Our team of Luxury Sales Specialists is dedicated to providing you with exceptional
                                service and expertise to consider before making any property purchase or sale. Each
                                specialist focuses on a specific area in Dubai and possesses an in-depth knowledge
                                of the local market.</p>
                        </div>
                        <div class="agentSearch">
                            <div class="pcAgentForm">
                                <form action="{{ route('agents') }}" method="post" id="agentSearchForm">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6">
                                            <select name="keywords[]" id="keywords" hidden>
                                                <option value="{{ $project->title }}">{{ $project->title }}
                                                </option>
                                            </select>
                                            <select class="form-control propertySelect1" name="language[]"
                                                multiple data-placeholder="Languages">
                                                @foreach ($languages as $lang)
                                                    <option value="{{ $lang->id }}"
                                                        @if (isset($data['language'])) @foreach ($data['language'] as $langs)
                                                                                                    {{ $langs == $lang->id ? 'selected' : '' }}
                                                                                                @endforeach @endif>
                                                        {{ $lang->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-6">
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
                                        <div class="col-12 col-lg-6">
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
                                        <div class="col-12 col-lg-6">
                                            <button type="submit" class="btn btn-primary">Find Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mobAgentForm">
                                <form action="{{ route('agents') }}" method="post" id="agentSearchForm">
                                    @csrf
                                    <div class="row g-1">

                                        <div class="col-10 col-lg-4 my-auto">
                                            <select name="keywords[]" id="keywords" hidden>
                                                <option value="{{ $project->title }}">{{ $project->title }}
                                                </option>
                                            </select>
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
                                        <div class="col-2 col-lg-4 my-auto">
                                            <button class="btn btn-primary w-100 mb-2 px-2 my-auto fs-14"
                                                type="button" id="button-addon2">
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

                        <div
                            class="swiper  @if (count($agents) <= 3) agentSwiperLess @else agentSwiper @endif ">
                            <div class="swiper-wrapper">
                                @foreach ($agents as $agent)
                                    <div class="swiper-slide">

                                        <div
                                            class="agentCont  @if (count($agents) <= 3) d-flex justify-content-center @endif">
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
            </div>
        </div>
    </div>
</div>
</section>

{{-- Related Properties --}}
@if (count($similarProject) > 0)
<section class="mt-5 bg-lightBlue py-2 py-md-4 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="secHead text-center mb-3">
                            <h2 class="text-primary">Related Properties</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="swiper serviceSlider">
                            <div class="swiper-wrapper">
                                @foreach ($similarProject as $similar)
                                    <div class="swiper-slide">
                                        <div>
                                            <a href="{{ url('dubai-offplan/' . $similar->slug) }}"
                                                class="text-decoration-none">
                                                <div class="devContainer rounded-3"
                                                    style="background-image: url('{{ $similar->mainImage }}')">
                                                    <div class="devLogo p-3">
                                                        <div class="d-flex justify-content-between">

                                                            <div>
                                                                <img src="{{ $similar->developer ? $similar->developer->logo : '' }}"
                                                                    alt="{{ $similar->developer ? $similar->developer->logo : '' }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div>
                                                                @if ($similar->is_new_lunch == 1)
                                                                    <span
                                                                        class="badge bg-warning fw-normal text-white fs-12"><i
                                                                            class="bi bi-patch-check-fill"></i>
                                                                        New</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="devDetails p-3">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="my-auto">
                                                                <p class="mb-0 text-white">{{ $similar->title }}
                                                                </p>
                                                            </div>

                                                            <div
                                                                class="text-white border rounded-3 py-1 px-2 my-auto">
                                                                <i class="bi bi-chevron-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
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
            </div>
        </div>
    </div>
</section>
@endif
<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered  modal-lg">
    <div class="modal-content  bg-primary">
        <div class="modal-header border-0 justify-content-end p-1">
            <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                    class="bi bi-x-circle text-white"></i></button>
        </div>
        <div class="modal-body">
            <div>
                <video width="100%" height="100%" controls>
                    <source src="{{ $project->video }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Pre Register modal -->
<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content bg-primary">
        <div class="modal-header border-0 bg-primaryLight justify-content-center">
            <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                    class="bi bi-x-circle text-white fa-2x"></i></button>
        </div>
        <div class="modal-body d-flex flex-column justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="secHead text-center mb-3">
                        <h2 class="text-white text-uppercase formName">PRE-BOOK NOW</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-5">
                    <div class="modalViewFormCont">
                        <form action="{{ route('enquireForm') }}" id="modalViewForm" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Full Name*</label>
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Full Name*" required>
                                    <input type="hidden" class="form-control" id="formName" name="formName"  value="" required>
                                    <input type="hidden" class="form-control" id="fileUrl" name="fileUrl"  value="">
                                    <input type="hidden" class="form-control" id="propName" name="propName"  value="" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email*" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="mobile" class="form-label">Mobile*</label>
                                    <input id="fullNumber" type="hidden" name="fullNumber">
                                    <input type="tel" class="form-control contField" id="telephone"
                                        name="phone" placeholder="Mobile*" required>

                                </div>
                                <div class="col-md-12">
                                    <div class="d-grid ">
                                        <button type="submit" class="btn btn-lightBlue text-uppercase">Submit
                                            Details</button>
                                    </div>
                                    <div class="form-text text-white text-center">By clicking submit, you agree to
                                        our Terms & Privacy Policy</div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $(".galleryTab li:first .nav-link").addClass("active");
        $(".galleryTabContent .tab-pane:first").addClass("active show");
    });
</script>
<script>
    $(document).on('click', '.btnModal', function() {
        //alert('check');
        var propName = $(this).attr("propertyUrl");
        var formName = $(this).attr("formName");
        $("#propName").val(propName);
        $("#formName").val(formName);
        $(".formName").html(formName);
    });
    $(document).on('click', '.btnRegisterDownload', function() {
        //alert('check');
        var propUrl = $(this).attr("propertyUrl");
        var formName = $(this).attr("formName");
        var fileUrl = $(this).attr("fileUrl");
        $("#propName").val(propUrl);
        $("#formName").val(formName);
        $("#fileUrl").val(fileUrl);
        $(".formName").html(formName);
    });
</script>

@endsection
