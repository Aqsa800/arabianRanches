@extends('frontend.layout.master')

@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title', 'Home | ' . $name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{ $pagemeta ? ($pagemeta->bannerImage ? $pagemeta->bannerImage : asset('frontend/assets/images/banner/homeBg.webp')) : asset('frontend/assets/images/banner/homeBg.webp') }}');">
        {{-- <!-- Slider main container -->
        <div class="swiper-container videoMainSlider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="">
                        <video class="d-block w-100 videoMain" autoPlay loop muted playsinline preload="metadata"
                            poster="{{ asset('frontend/assets/images/banner/homeBg.webp') }}">
                            <source src="{{ asset('frontend/assets/images/banner/homeVideo.mov') }}" type="video/mp4">
                            Sorry, your browser doesn't support videos.
                        </video>
                        <div class="videoOverlay"></div>
                    </div>
                    <div class="container centered">

                        <div class="row">

                            <div class="col-12 col-lg-12">
                                <h1 class="bannerHeading text-uppercase text-white text-center">Mudon Townhouses</h1>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-light rounded-pill px-3">Discover Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="">
                        <video class="d-block w-100 videoMain" autoPlay loop muted playsinline preload="metadata"
                            poster="{{ asset('frontend/assets/images/banner/homeBg.webp') }}">
                            <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">
                            Sorry, your browser doesn't support videos.
                        </video>
                        <div class="videoOverlay"></div>
                    </div>
                    <div class="container centered">

                        <div class="row">

                            <div class="col-12 col-lg-12">
                                <h1 class="bannerHeading text-uppercase text-white text-center">Mudon Townhouses</h1>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-light rounded-pill px-3">Discover Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="">
                        <video class="d-block w-100 videoMain" autoPlay loop muted playsinline preload="metadata"
                            poster="{{ asset('frontend/assets/images/banner/homeBg.webp') }}">
                            <source src="{{ asset('frontend/assets/images/banner/homeVideo.mov') }}" type="video/mp4">
                            Sorry, your browser doesn't support videos.
                        </video>
                        <div class="videoOverlay"></div>
                    </div>
                    <div class="container centered">

                        <div class="row">

                            <div class="col-12 col-lg-12">
                                <h1 class="bannerHeading text-uppercase text-white text-center">Mudon Townhouses</h1>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-light rounded-pill px-3">Discover Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ...
            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
         --}}
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($banner as $key => $item)
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}"
                        @if ($loop->first) class="active" aria-current="true" @endif
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($banner as $item)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <div class="">
                            @if ($item->video)
                                <video class="d-block w-100 videoMain" autoPlay loop muted playsinline>
                                    <source src="{{ $item->video }}" type="video/mp4">
                                    Sorry, your browser doesn't support videos.
                                </video>
                            @elseif($item->image)
                                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="img-fluid w-100  videoMain">
                            @else
                                <img src="{{ $pagemeta ? ($pagemeta->bannerImage ? $pagemeta->bannerImage : asset('frontend/assets/images/banner/homeBg.webp')) : asset('frontend/assets/images/banner/homeBg.webp') }}"
                                    alt="{{ $item->title }}" class="img-fluid w-100 videoMain">
                            @endif

                            <div class="videoOverlay"></div>
                        </div>
                        <div class="container centered">

                            <div class="row">

                                <div class="col-12 col-lg-12">
                                    <h1 class="bannerHeading text-uppercase text-white text-center">{{ $item->title }}</h1>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="text-center">
                                        <a href="{{ $item->button_link }}"
                                            class="btn btn-outline-light text-decoration-none rounded-pill px-3">{{ $item->button_text }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- counter --}}
    <section class="my-5 awardPc" id="counter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="swiper counterSlider">
                        <div class="swiper-wrapper">
                            @foreach ($counters as $counter)
                                <div class="swiper-slide my-auto">
                                    <div class="text-center text-primary text-uppercase">
                                        <h2 class="fw-bold d-flex justify-content-center"><span class="counter"
                                                data-count="{{ (int) $counter->value }}">0</span> {{ $counter->key }}</h2>
                                        <p class="fs-14">{{ $counter->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- counter Mobile --}}
    <section class="awardMob bg-primary py-4" id="counter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="swiper counterSliderMob">
                                <div class="swiper-wrapper">
                                    @foreach ($counters as $key => $counter)
                                        <div class="swiper-slide">
                                            <div class="d-flex justify-content-center">
                                                <div class="my-auto me-3">
                                                    <center>
                                                        <img src="{{ asset('frontend/assets/images/icons/counter' . ($key + 1) . '.png') }}"
                                                            alt="Unique Properties" class="img-fluid rounded-circle border"
                                                            width="50px">
                                                    </center>
                                                </div>
                                                <div class="text-white text-uppercase my-auto">
                                                    <h6 class="fw-bold d-flex"><span>{{ (int) $counter->value }}</span>
                                                        {{ $counter->key }}</h6>
                                                    <p class="fs-12 mb-0">{{ $counter->name }}</p>
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

    {{-- Awards --}}
    <section class="mt-0 mt-md-5 mt-lg-5 mb-5 bg-lightBlue py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center mb-3">
                                <h2 class="text-primary text-uppercase">Awards recieved from developers</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="swiper awardSlider">
                                <div class="swiper-wrapper justify-content-center">
                                    @foreach ($awardsAll as $awards)
                                        @if( $awards[0]->developer)
                                        <div class="swiper-slide">
                                            <div>
                                                <div class="text-center text-uppercase fs-14 p-3">
                                                    <center><img src="{{ $awards[count($awards) - 1]->trophy }}"
                                                            alt="{{ $awards[0]->developer->name }}" class="img-fluid mb-3">
                                                    </center>
                                                    <div>
                                                        <h6 class="text-primary pb-2 border-bottom">
                                                            {{ $awards[0]->developer->name }}
                                                            {{ $awards[0]->year == $awards[count($awards) - 1]->year ? $awards[0]->year : $awards[0]->year . ' - ' . $awards[count($awards) - 1]->year }}
                                                        </h6>
                                                        <p class="fw-semibold">{{ count($awards) }} @if(count($awards) >1 )awards @else award @endif</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
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
                        <div class="col-12 col-lg-12">
                            <div class="text-center">
                                <a href="{{ route('awards') }}"
                                    class="btn btn-primary  text-uppercase rounded-pill px-3">View All
                                    Awards</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- latest launch --}}
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-12">

                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center mb-3">
                                <h2 class="text-primary text-uppercase">Something new every week</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <ul class="nav latestTabs justify-content-center nav-pills mb-3" id="pills-tab"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-offplan-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-offplan" type="button" role="tab"
                                        aria-controls="pills-offplan" aria-selected="true">Off-plan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-resale-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-resale" type="button" role="tab"
                                        aria-controls="pills-resale" aria-selected="false">Resales & Rentals</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-exclusive-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-exclusive" type="button" role="tab"
                                        aria-controls="pills-exclusive" aria-selected="false">Exclusive</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-offplan" role="tabpanel"
                                    aria-labelledby="pills-offplan-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <div class="shadow rounded-4 p-4 mb-3">
                                                <div>
                                                    <ul class="nav latestInnerTabs nav-pills pb-2 mb-2" id="InnerTabProp"
                                                        role="tablist">
                                                        @foreach ($offplan as $key => $projectName)
                                                            @if ($key < 3)
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link @if ($loop->first) active @endif"
                                                                        id="proj{{ $projectName->id }}"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#proj{{ $projectName->id }}Tab"
                                                                        type="button" role="tab"
                                                                        aria-controls="proj{{ $projectName->id }}"
                                                                        aria-selected="true">{{ $projectName->title }}</button>
                                                                </li>
                                                            @else
                                                            @break;
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="tab-content" id="pills-excltabContent">
                                                @foreach ($offplan as $key => $project)
                                                    @if ($key < 3)
                                                        <div class="tab-pane  fade @if ($loop->first) show active @endif"
                                                            id="proj{{ $project->id }}Tab" role="tabpanel"
                                                            aria-labelledby="proj{{ $project->id }}Tab"
                                                            tabindex="0">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-8 col-md-12">
                                                                    <div class="swiper swiperPropList swiperLatest">
                                                                        <div class="swiper-wrapper">

                                                                            @if (count($project->exteriorGallery) > 0)
                                                                                @foreach ($project->exteriorGallery as $img)
                                                                                    <div class="swiper-slide">
                                                                                        <div class="">
                                                                                            <center><a
                                                                                                    href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                                    class="text-decoration-none">
                                                                                                    <img src="{{ $img['path'] }}"
                                                                                                        class="img-fluid rounded-4"
                                                                                                        alt="{{ $project->title }}">
                                                                                                </a>
                                                                                            </center>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @elseif(count($project->interiorGallery) > 0)
                                                                                @foreach ($project->interiorGallery as $img)
                                                                                    <div class="swiper-slide">
                                                                                        <div class="">
                                                                                            <center><a
                                                                                                    href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                                    class="text-decoration-none">
                                                                                                    <img src="{{ $img['path'] }}"
                                                                                                        class="img-fluid rounded-4"
                                                                                                        alt="{{ $project->title }}">
                                                                                                </a>
                                                                                            </center>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div class="swiper-slide">
                                                                                    <div class="">
                                                                                        <center><a
                                                                                                href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                                class="text-decoration-none">
                                                                                                <img src="{{ $project->mainImage }}"
                                                                                                    class="img-fluid rounded-4"
                                                                                                    alt="{{ $project->title }}">
                                                                                            </a>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="swiper-button-prev">
                                                                            <span class="fa-stack fa-lg">
                                                                                <i
                                                                                    class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                                <i
                                                                                    class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="swiper-button-next me-2">
                                                                            <span class="fa-stack fa-lg">
                                                                                <i
                                                                                    class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                                <i
                                                                                    class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-12 col-lg-4 col-md-12">
                                                                    <div class="mobDisplay">
                                                                        <div class="my-2">
                                                                            <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                class="text-decoration-none">
                                                                                <h5 class="text-primary">
                                                                                    {{ $project->title }}
                                                                                </h5>
                                                                            </a>
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-12 col-lg-8 col-md-7 my-auto">
                                                                                    <small>{{ $project->bedrooms ? $project->bedrooms . ' Bedroom' : '' }}
                                                                                        {{ count($project->accommodations) > 0 ? 'spacious ' . $project->accommodations->implode('name', ', ') : '' }}</small>
                                                                                    <h5 class="text-primary">AED
                                                                                        {{ $project->starting_price }}
                                                                                    </h5>
                                                                                </div>
                                                                                <div
                                                                                    class="col-12 col-lg-4 col-md-5 my-auto">
                                                                                    <div
                                                                                        class="text-lg-end text-sm-start text-md-end">
                                                                                        <button
                                                                                            class="btn btn-primary text-uppercase btnRegister rounded-pill px-3"
                                                                                            data-bs-toggle="modal"
                                                                                            propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                            formName="Register Your Interest"
                                                                                            data-bs-target="#registerModal">Register
                                                                                            now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hideMob hideTab">
                                                                        <div class="text-primary text-start ">
                                                                            <h5>Key Highlights </h5>
                                                                            <div class="propDesc">
                                                                                {!! $project->features_description !!}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-8 col-md-12 my-auto">
                                                                    <div class="hideMob">
                                                                        <div class="my-2">
                                                                            <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                class="text-decoration-none">
                                                                                <h5 class="text-primary">
                                                                                    {{ $project->title }}
                                                                                </h5>
                                                                            </a>
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-12 col-lg-8 col-md-7 my-auto">
                                                                                    <small>{{ $project->bedrooms ? $project->bedrooms . ' Bedroom' : '' }}
                                                                                        {{ count($project->accommodations) > 0 ? 'spacious ' . $project->accommodations->implode('name', ', ') : '' }}</small>
                                                                                    <h5 class="text-primary">AED
                                                                                        {{ $project->starting_price }}
                                                                                    </h5>
                                                                                </div>
                                                                                <div
                                                                                    class="col-12 col-lg-4 col-md-5 my-auto">
                                                                                    <div
                                                                                        class="text-lg-end text-sm-start text-md-end">
                                                                                        <button
                                                                                            class="btn btn-primary text-uppercase btnRegister rounded-pill px-3"
                                                                                            data-bs-toggle="modal"
                                                                                            propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                            formName="Register Your Interest"
                                                                                            data-bs-target="#registerModal">Register
                                                                                            now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mobDisplay showTab">
                                                                        <div class="text-primary text-start my-2">
                                                                            <div class="accordion"
                                                                                id="accordionExample">
                                                                                <div class="accordion-item border-0">
                                                                                    <h2 class="accordion-header"
                                                                                        id="headingOne">
                                                                                        <button
                                                                                            class="accordion-button accordianPrimary  bg-lightOlive p-2 collapsed"
                                                                                            type="button"
                                                                                            data-bs-toggle="collapse"
                                                                                            data-bs-target="#collapseOne"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapseOne">
                                                                                            <h6
                                                                                                class="text-primary mb-0">
                                                                                                Key
                                                                                                Highlights </h6>
                                                                                        </button>
                                                                                    </h2>
                                                                                    <div id="collapseOne"
                                                                                        class="accordion-collapse collapse"
                                                                                        aria-labelledby="headingOne"
                                                                                        data-bs-parent="#accordionExample">
                                                                                        <div
                                                                                            class="accordion-body ps-0">

                                                                                            <div class="propDesc">
                                                                                                {!! $project->features_description !!}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-4 col-md-12 my-auto">
                                                                    <div class="d-flex my-2">
                                                                        @if ($project->factsheet)
                                                                            <button
                                                                                class="btn btn-light btnRegisterDownload rounded-3 w-100 mx-2"
                                                                                type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#registerModal"
                                                                                propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                fileUrl={{ $project->factsheet }}
                                                                                formName="Download Factsheet">
                                                                                <i
                                                                                    class="bi bi-cloud-download fa-2x"></i>
                                                                                <p class="mb-0 fs-14">
                                                                                    Download<br>Factsheet</p>
                                                                            </button>
                                                                        @endif
                                                                        @if ($project->brochure)
                                                                            <button
                                                                                class="btn btn-light btnRegisterDownload rounded-3 w-100 mx-2"
                                                                                type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#registerModal"
                                                                                propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                fileUrl={{ $project->brochure }}
                                                                                formName="View Floorplan">
                                                                                <i
                                                                                    class="fa fa-pencil-square-o fa-2x"></i>
                                                                                <p class="mb-0 fs-14">
                                                                                    View<br>Floorplans</p>
                                                                            </button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                    @break;
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if (count($offplan) > 3)
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="secHead text-center mb-3">
                                            <h4 class="text-primary text-uppercase">Similar Properties</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="swiper swiperThumpLatest  pt-2 px-1 pb-5 ">
                                            <div class="swiper-wrapper">
                                                @foreach ($offplan as $key => $projectSim)
                                                    @if ($key >= 3)
                                                        <div class="swiper-slide">
                                                            <div>
                                                                <div class="card border-0 shadow">
                                                                    <a href="{{ url('dubai-offplan/' . $projectSim->slug) }}"
                                                                        class="text-decoration-none"> <img
                                                                            src="{{ $projectSim->mainImage }}"
                                                                            class="card-img-top"
                                                                            alt="{{ $projectSim->title }}"></a>
                                                                    <div class="card-body">
                                                                        <a href="{{ url('dubai-offplan/' . $projectSim->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <h5 class="text-primary mb-1">
                                                                                @if(strlen($projectSim->title) > 15)
                                                                                {{ substr(strip_tags($projectSim->title), 0, 15) . '...' }}
                                                                                @else
                                                                                {{ $projectSim->title }}
                                                                                @endif
                                                                            </h5>
                                                                        </a>
                                                                        <ul
                                                                            class="list-unstyled propListSmall lh-1 my-2">
                                                                            <li class="d-inline">
                                                                                <small>{{ $projectSim->bedrooms ? $projectSim->bedrooms : '' }}
                                                                                    Beds</small>
                                                                            </li>
                                                                            <li class="d-inline">
                                                                                <small>{{ $projectSim->bathrooms ? $projectSim->bathrooms : '' }}
                                                                                    Baths</small>
                                                                            </li>
                                                                            <li class="d-inline">
                                                                                <small>{{ $projectSim->area ? $projectSim->area : '' }}
                                                                                    {{ $projectSim->area_unit ? $projectSim->area_unit : 'sqft' }}</small>
                                                                            </li>
                                                                        </ul>
                                                                        <small>Starting Price: AED
                                                                            {{ $projectSim->starting_price }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif
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
                                <div class="col-12 col-lg-12 col-md-12">
                                    <div class="text-center">
                                        <a href="{{ route('dubai-offplans') }}"
                                            class="btn btn-primary text-uppercase rounded-pill px-3">View
                                            More
                                            Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-resale" role="tabpanel"
                            aria-labelledby="pills-resale-tab" tabindex="0">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <div class="shadow rounded-4 p-4 mb-3">
                                        <div>
                                            <ul class="nav latestInnerTabs nav-pills pb-2 mb-2" id="InnerTabProp"
                                                role="tablist">
                                                @foreach ($properties as $key => $propName)
                                                    @if ($key < 3)
                                                        <li class="nav-item" role="presentation">
                                                            <button
                                                                class="nav-link @if ($loop->first) active @endif"
                                                                id="prop{{ $propName->id }}"
                                                                data-bs-toggle="pill"
                                                                data-bs-target="#prop{{ $propName->id }}Tab"
                                                                type="button" role="tab"
                                                                aria-controls="prop{{ $propName->id }}"
                                                                aria-selected="true">{{ $propName->name }}</button>
                                                        </li>
                                                    @else
                                                    @break;
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="pills-proptabContent">
                                        @foreach ($properties as $key => $property)
                                            @if ($key < 3)
                                                <div class="tab-pane  fade @if ($loop->first) show active @endif"
                                                    id="prop{{ $property->id }}Tab" role="tabpanel"
                                                    aria-labelledby="prop{{ $property->id }}Tab"
                                                    tabindex="0">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-8 col-md-12">
                                                            <div class="swiper swiperPropList swiperLatest">
                                                                <div class="swiper-wrapper">

                                                                    @if (count($property->subImages) > 0)
                                                                        @foreach ($property->subImages as $img)
                                                                            <div class="swiper-slide">
                                                                                <div class="">
                                                                                    <center><a
                                                                                            href="{{ url('property' . '/' . $property->slug) }}"
                                                                                            class="text-decoration-none">
                                                                                            <img src="{{ $img['path'] }}"
                                                                                                class="img-fluid rounded-4"
                                                                                                alt="{{ $property->name }}">
                                                                                        </a>
                                                                                    </center>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <div class="swiper-slide">
                                                                            <div class="">
                                                                                <center><a
                                                                                        href="{{ url('property' . '/' . $property->slug) }}"
                                                                                        class="text-decoration-none">
                                                                                        <img src="{{ $property->mainImage }}"
                                                                                            class="img-fluid rounded-4"
                                                                                            alt="{{ $property->name }}">
                                                                                    </a>
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="swiper-button-prev">
                                                                    <span class="fa-stack fa-lg">
                                                                        <i
                                                                            class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                        <i
                                                                            class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="swiper-button-next me-2">
                                                                    <span class="fa-stack fa-lg">
                                                                        <i
                                                                            class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                        <i
                                                                            class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-4 col-md-12">
                                                            <div class="mobDisplay">
                                                                <div class="my-2">
                                                                    <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                        class="text-decoration-none">
                                                                        <h5 class="text-primary">
                                                                            {{ $property->name }}
                                                                        </h5>
                                                                    </a>
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-12 col-lg-8 col-md-7 my-auto">
                                                                            <small>{{ $property->bedrooms > 0 ? $property->bedrooms . ' Bedroom' : 'Studio Bedroom' }}
                                                                                {{ $property->accommodations ? 'spacious ' . $property->accommodations->name : '' }}</small>
                                                                            <h5 class="text-primary">
                                                                                {{ $property->currency ? $property->currency : 'AED' }}
                                                                                {{ number_format($property->price) }}
                                                                            </h5>
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-lg-4 col-md-5 my-auto">
                                                                            <div
                                                                                class="text-lg-end text-sm-start text-md-end">
                                                                                <button
                                                                                    class="btn btn-primary text-uppercase btnRegister rounded-pill px-3"
                                                                                    data-bs-toggle="modal"
                                                                                    propertyUrl="{{ url('property' . '/' . $property->slug) }}"
                                                                                    formName="Register Your Interest"
                                                                                    data-bs-target="#registerModal">Register
                                                                                    now</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="hideMob hideTab">
                                                                <div class="text-primary text-start ">
                                                                    <h5>Key Highlights </h5>
                                                                    <div class="propDesc text-less-line">
                                                                        {!! nl2br(e(strip_tags($property->description))) !!}

                                                                    </div>
                                                                    <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                        class="text-primary fs-13">Read
                                                                        More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-8 col-md-12 my-auto">
                                                            <div class="hideMob">
                                                                <div class="my-2">
                                                                    <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                        class="text-decoration-none">
                                                                        <h5 class="text-primary">
                                                                            {{ $property->name }}
                                                                        </h5>
                                                                    </a>
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-12 col-lg-8 col-md-7 my-auto">
                                                                            <small>{{ $property->bedrooms ? $property->bedrooms . ' Bedroom' : '' }}
                                                                                {{ $property->accommodations ? 'spacious ' . $property->accommodations->name : '' }}</small>
                                                                            <h5 class="text-primary">
                                                                                {{ $property->currency ? $property->currency : 'AED' }}
                                                                                {{ number_format($property->price) }}
                                                                            </h5>
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-lg-4 col-md-5 my-auto">
                                                                            <div
                                                                                class="text-lg-end text-sm-start text-md-end">
                                                                                <a href=""
                                                                                    class="btn btn-primary btnRegister  text-uppercase rounded-pill px-3"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#registerModal"
                                                                                    propertyUrl="{{ url('property' . '/' . $property->slug) }}"
                                                                                    formName="Register Your Interest">Register
                                                                                    now</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mobDisplay showTab">
                                                                <div class="text-primary text-start my-2">
                                                                    <div class="accordion"
                                                                        id="accordionExample">
                                                                        <div class="accordion-item border-0">
                                                                            <h2 class="accordion-header"
                                                                                id="headingOne">
                                                                                <button
                                                                                    class="accordion-button accordianPrimary  bg-lightOlive p-2 collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapseOne"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="collapseOne">
                                                                                    <h6
                                                                                        class="text-primary mb-0">
                                                                                        Key
                                                                                        Highlights </h6>
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseOne"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="headingOne"
                                                                                data-bs-parent="#accordionExample">
                                                                                <div
                                                                                    class="accordion-body ps-0">

                                                                                    <div
                                                                                        class="propDesc text-less-line">
                                                                                        {!! nl2br(e(strip_tags($property->description))) !!}

                                                                                    </div>
                                                                                    <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                                        class="text-primary fs-13">Read
                                                                                        More</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-4 col-md-12 my-auto">

                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            @break;
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if (count($properties) > 3)
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="secHead text-center mb-3">
                                    <h4 class="text-primary text-uppercase">Similar Properties</h4>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="swiper swiperThumpLatest  pt-2 px-1 pb-5 ">
                                    <div class="swiper-wrapper">
                                        @foreach ($properties as $key => $propertySim)
                                            @if ($key >= 3)
                                                <div class="swiper-slide">
                                                    <div>
                                                        <div class="card border-0 shadow">
                                                            <a href="{{ url('property/' . $propertySim->slug) }}"
                                                                class="text-decoration-none"><img
                                                                    src="{{ $propertySim->mainImage }}"
                                                                    class="card-img-top"
                                                                    alt="{{ $propertySim->name }}"></a>
                                                            <div class="card-body">
                                                                <a href="{{ url('property/' . $propertySim->slug) }}"
                                                                    class="text-decoration-none">
                                                                    <h5 class="text-primary mb-1">
                                                                        {{ substr(strip_tags($propertySim->name), 0, 20) . '...' }}
                                                                    </h5>
                                                                </a>
                                                                <ul
                                                                    class="list-unstyled propListSmall lh-1 my-2">
                                                                    <li class="d-inline">
                                                                        <small>{{ $propertySim->bedrooms > 0 ? $propertySim->bedrooms . 'Beds' : 'Studio' }}
                                                                        </small>
                                                                    </li>
                                                                    <li class="d-inline">
                                                                        <small>{{ $propertySim->bathrooms ? $propertySim->bathrooms : '' }}
                                                                            Baths</small>
                                                                    </li>
                                                                    <li class="d-inline">
                                                                        <small>{{ $propertySim->area ? $propertySim->area : '' }}
                                                                            sqft</small>
                                                                    </li>
                                                                </ul>
                                                                <small>{{ $propertySim->currency ? $propertySim->currency : 'AED' }}
                                                                    {{ number_format($propertySim->price) }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
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
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="text-center">
                                <a href="{{ route('properties') }}"
                                    class="btn btn-primary text-uppercase rounded-pill px-3">View
                                    More
                                    Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-exclusive" role="tabpanel"
                    aria-labelledby="pills-exclusive-tab" tabindex="0">

                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="shadow rounded-4 p-4 mb-3">
                                <div>
                                    <ul class="nav latestInnerTabs nav-pills pb-2 mb-2" id="InnerTabProp"
                                        role="tablist">
                                        @foreach ($exclusives as $key => $exclusiveName)
                                            @if ($key < 3)
                                                <li class="nav-item" role="presentation">
                                                    <button
                                                        class="nav-link @if ($loop->first) active @endif"
                                                        id="excl{{ $exclusiveName->id }}"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#excl{{ $exclusiveName->id }}Tab"
                                                        type="button" role="tab"
                                                        aria-controls="excl{{ $exclusiveName->id }}"
                                                        aria-selected="true">{{ $exclusiveName->name }}</button>
                                                </li>
                                            @else
                                            @break;
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-excltabContent">
                                @foreach ($exclusives as $key => $exclusive)
                                    @if ($key < 3)
                                        <div class="tab-pane  fade @if ($loop->first) show active @endif"
                                            id="excl{{ $exclusive->id }}Tab" role="tabpanel"
                                            aria-labelledby="excl{{ $exclusive->id }}Tab"
                                            tabindex="0">
                                            <div class="row">
                                                <div class="col-12 col-lg-8 col-md-12">
                                                    <div class="swiper swiperPropList swiperLatest">
                                                        <div class="swiper-wrapper">

                                                            @if (count($exclusive->subImages) > 0)
                                                                @foreach ($exclusive->subImages as $img)
                                                                    <div class="swiper-slide">
                                                                        <div class="">
                                                                            <center><a
                                                                                    href="{{ url('property' . '/' . $exclusive->slug) }}"
                                                                                    class="text-decoration-none">
                                                                                    <img src="{{ $img['path'] }}"
                                                                                        class="img-fluid rounded-4"
                                                                                        alt="{{ $exclusive->name }}">
                                                                                </a>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="swiper-slide">
                                                                    <div class="">
                                                                        <center><a
                                                                                href="{{ url('property' . '/' . $exclusive->slug) }}"
                                                                                class="text-decoration-none">
                                                                                <img src="{{ $exclusive->mainImage }}"
                                                                                    class="img-fluid rounded-4"
                                                                                    alt="{{ $exclusive->name }}">
                                                                            </a>
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="swiper-button-prev">
                                                            <span class="fa-stack fa-lg">
                                                                <i
                                                                    class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                <i
                                                                    class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                            </span>
                                                        </div>
                                                        <div class="swiper-button-next me-2">
                                                            <span class="fa-stack fa-lg">
                                                                <i
                                                                    class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                <i
                                                                    class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-12">
                                                    <div class="mobDisplay">
                                                        <div class="my-2">
                                                            <a href="{{ url('property' . '/' . $exclusive->slug) }}"
                                                                class="text-decoration-none">
                                                                <h5 class="text-primary">
                                                                    {{ $exclusive->name }}
                                                                </h5>
                                                            </a>
                                                            <div class="row">
                                                                <div
                                                                    class="col-12 col-lg-8 col-md-7 my-auto">
                                                                    <small>{{ $exclusive->bedrooms > 0 ? $exclusive->bedrooms . ' Bedroom' : 'Studio Bedroom' }}
                                                                        {{ $exclusive->accommodations ? 'spacious ' . $exclusive->accommodations->name : '' }}</small>
                                                                    <h5 class="text-primary">
                                                                        {{ $exclusive->currency ? $exclusive->currency : 'AED' }}
                                                                        {{ number_format($exclusive->price) }}
                                                                    </h5>
                                                                </div>
                                                                <div
                                                                    class="col-12 col-lg-4 col-md-5 my-auto">
                                                                    <div
                                                                        class="text-lg-end text-sm-start text-md-end">
                                                                        <button
                                                                            class="btn btn-primary text-uppercase btnRegister rounded-pill px-3"
                                                                            data-bs-toggle="modal"
                                                                            propertyUrl="{{ url('property' . '/' . $exclusive->slug) }}"
                                                                            formName="Register Your Interest"
                                                                            data-bs-target="#registerModal">Register
                                                                            now</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hideMob hideTab">
                                                        <div class="text-primary text-start ">
                                                            <h5>Key Highlights </h5>

                                                            <div class="propDesc text-less-line">
                                                                {!! nl2br(e(strip_tags($exclusive->description))) !!}

                                                            </div>
                                                            <a href="{{ url('property' . '/' . $exclusive->slug) }}"
                                                                class="text-primary fs-13">Read
                                                                More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-8 col-md-12 my-auto">
                                                    <div class="hideMob">
                                                        <div class="my-2">
                                                            <a href="{{ url('property' . '/' . $exclusive->slug) }}"
                                                                class="text-decoration-none">
                                                                <h5 class="text-primary">
                                                                    {{ $exclusive->name }}
                                                                </h5>
                                                            </a>
                                                            <div class="row">
                                                                <div
                                                                    class="col-12 col-lg-8 col-md-7 my-auto">
                                                                    <small>{{ $exclusive->bedrooms ? $exclusive->bedrooms . ' Bedroom' : '' }}
                                                                        {{ $exclusive->accommodations ? 'spacious ' . $exclusive->accommodations->name : '' }}</small>
                                                                    <h5 class="text-primary">
                                                                        {{ $exclusive->currency ? $exclusive->currency : 'AED' }}
                                                                        {{ number_format($exclusive->price) }}
                                                                    </h5>
                                                                </div>
                                                                <div
                                                                    class="col-12 col-lg-4 col-md-5 my-auto">
                                                                    <div
                                                                        class="text-lg-end text-sm-start text-md-end">
                                                                        <a href=""
                                                                            class="btn btn-primary btnRegister  text-uppercase rounded-pill px-3"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#registerModal"
                                                                            propertyUrl="{{ url('dubai-offplan' . '/' . $exclusive->slug) }}"
                                                                            formName="Register Your Interest">Register
                                                                            now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mobDisplay showTab">
                                                        <div class="text-primary text-start my-2">
                                                            <div class="accordion"
                                                                id="accordionExample">
                                                                <div class="accordion-item border-0">
                                                                    <h2 class="accordion-header"
                                                                        id="headingOne">
                                                                        <button
                                                                            class="accordion-button accordianPrimary  bg-lightOlive p-2 collapsed"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseOne"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapseOne">
                                                                            <h6
                                                                                class="text-primary mb-0">
                                                                                Key
                                                                                Highlights </h6>
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseOne"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="headingOne"
                                                                        data-bs-parent="#accordionExample">
                                                                        <div
                                                                            class="accordion-body ps-0">

                                                                            <div
                                                                                class="propDesc text-less-line">
                                                                                {!! nl2br(e(strip_tags($exclusive->description))) !!}

                                                                            </div>
                                                                            <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                                class="text-primary fs-13">Read
                                                                                More</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-12 my-auto">

                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @break;
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @if (count($exclusives) > 3)
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="secHead text-center mb-3">
                            <h4 class="text-primary text-uppercase">Similar Properties</h4>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="swiper swiperThumpLatest  pt-2 px-1 pb-5 ">
                            <div class="swiper-wrapper">
                                @foreach ($exclusives as $key => $propertySim)
                                    @if ($key >= 3)
                                        <div class="swiper-slide">
                                            <div>
                                                <div class="card border-0 shadow">
                                                    <a href="{{ url('property/' . $propertySim->slug) }}"
                                                        class="text-decoration-none"><img
                                                            src="{{ $propertySim->mainImage }}"
                                                            class="card-img-top"
                                                            alt="{{ $propertySim->name }}"></a>
                                                    <div class="card-body">
                                                        <a href="{{ url('property/' . $propertySim->slug) }}"
                                                            class="text-decoration-none">
                                                            <h5 class="text-primary mb-1">
                                                                {{ substr(strip_tags($propertySim->name), 0, 20) . '...' }}
                                                            </h5>
                                                        </a>
                                                        <ul
                                                            class="list-unstyled propListSmall lh-1 my-2">
                                                            <li class="d-inline">
                                                                <small>{{ $propertySim->bedrooms > 0 ? $propertySim->bedrooms . 'Bed' : 'Studio' }}
                                                                </small>
                                                            </li>
                                                            <li class="d-inline">
                                                                <small>{{ $propertySim->bathrooms ? $propertySim->bathrooms : '' }}
                                                                    Baths</small>
                                                            </li>
                                                            <li class="d-inline">
                                                                <small>{{ $propertySim->area ? $propertySim->area : '' }}
                                                                    sqft</small>
                                                            </li>
                                                        </ul>
                                                        <small>{{ $propertySim->currency ? $propertySim->currency : 'AED' }}
                                                            {{ number_format($propertySim->price) }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
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
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="text-center">
                        <a href="{{ route('properties') }}"
                            class="btn btn-primary text-uppercase rounded-pill px-3">View
                            More
                            Properties</a>
                    </div>
                </div>
            </div>
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

{{-- Developers --}}
<section class="my-5 bg-lightBlue py-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="row">
<div class="col-12 col-lg-12 col-md-12">
<div class="secHead text-center mb-3">
<h2 class="text-primary text-uppercase">Developers</h2>
</div>
</div>
<div class="col-12 col-lg-12 col-md-12">
<div class="swiper developerSlider">
<div class="swiper-wrapper">
    @foreach ($developers as $developer)
        <div class="swiper-slide">
            <a href="{{ url('developer/' . $developer->slug) }}"
                class="text-decoration-none">
                <div class="devContainer rounded-3"
                    style="background-image: url('{{ $developer->image ? $developer->image : asset('frontend/assets/images/developers/merras.webp') }}')">
                    <div class="devLogo p-3">
                        <a href="{{ url('developer/' . $developer->slug) }}"
                            class="text-decoration-none"><img
                                src="{{ $developer->logo }}" alt="Unique Properties"
                                class="{{ $developer->name }}"></a>
                    </div>
                    <div class="devDetails p-3">
                        <div class="d-flex justify-content-end">
                            <a href="{{ url('developer/' . $developer->slug) }}"
                                class="text-decoration-none">
                                <div class="text-white border rounded-3 py-2 px-3 my-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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
<div class="col-12 col-lg-12">
<div class="text-center mt-4">
<a href="{{ route('developers') }}"
    class="btn btn-primary  text-uppercase rounded-pill px-3">Explore All
    Developers</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

{{-- Communities --}}
<section class="my-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="row">
<div class="col-12 col-lg-12 col-md-12">
<div class="secHead text-center mb-3">
<h2 class="text-primary text-uppercase">Discover dubai's best communities</h2>
</div>
</div>
<div class="col-12 col-lg-12 col-md-12">
<div class="swiper pt-3 communitySlider">
<div class="swiper-wrapper">
    @foreach ($communities as $community)
        <div class="swiper-slide">
            <a href="{{ url('community/' . $community->slug) }}"
                class="text-decoration-none">
                <div class="devContainer rounded-3"
                    style="background-image: url('{{ $community->mainIMage ? $community->mainIMage : asset('frontend/assets/images/community/bluewaters.webp') }}');">
                    <div class="devLogo p-3">
                        <div class="my-auto">
                            <a href="{{ url('community/' . $community->slug) }}"
                                class="text-decoration-none">
                                <p class="mb-1 text-white text-uppercase">
                                    {{ $community->name }}</p>
                            </a>
                        </div>
                    </div>
                    <div class="commDetails p-3">
                        <div class="d-flex justify-content-end">
                            <a href="{{ url('community/' . $community->slug) }}"
                                class="text-decoration-none">
                                <div class="text-white border rounded-3 py-2 px-3 my-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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
<div class="col-12 col-lg-12">
<div class="text-center mt-4">
<a href="{{ route('communities') }}"
    class="btn btn-primary  text-uppercase rounded-pill px-3">Explore
    All
    Areas</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

{{-- Blogs --}}
<section class="my-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="row g-3">
<div class="col-12 col-lg-12 col-md-12">
<div class="secHead text-center mb-3">
<h2 class="text-primary text-uppercase">Latest Blogs and videos</h2>
</div>
</div>
<div class="col-12 col-lg-8 col-md-12">
@foreach ($articles as $article)
@if ($loop->first)
    <div class="devContainer blogFullImg rounded-3"
        style="background-image: url('{{ $article->mainImage }}');height:100%;">
        <a href="{{ url(strtolower($article->article_type) . '/' . $article->slug) }}"
            class="text-decoration-none">
            <div class="blogDetails p-3">
                <div class="blogWidth">
                    <div class="my-auto">
                        <h5 class="mb-1 text-white">
                            {{ substr(strip_tags($article->title), 0, 50) }}
                        </h5>
                    </div>

                    <div class="d-flex justify-content-between text-white">
                        {{-- <div class="my-auto">
                            <small>By {{ $article->author }}</small>
                        </div> --}}
                        <div class="my-auto">
                            <small>{{ date('d M, Y', strtotime($article->publish_at)) }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif
@endforeach

</div>
<div class="col-12 col-lg-4 col-md-12">
@foreach ($articles as $article)
@if (!$loop->first)
    <div class="blogSide">
        <div
            class="card pb-3 mb-1 border-0  @if (!$loop->last) border-bottom @endif rounded-0">
            <div class="row rowRev g-0">

                <div class="col-8 col-md-8 my-auto ">
                    <div class="card-body p-0 px-2">
                        <a href="{{ url(strtolower($article->article_type) . '/' . $article->slug) }}"
                            class="text-decoration-none">
                            <h6 class="card-title text-primary mb-1">
                                {{ substr(strip_tags($article->title), 0, 50) }}</h6>
                        </a>
                        <small
                            class="fst-italic text-secondary">{{ date('M d, Y', strtotime($article->publish_at)) }}</small>
                    </div>
                </div>
                <div class=" col-4 col-md-4 my-auto ">
                    <a href="{{ url(strtolower($article->article_type) . '/' . $article->slug) }}"
                        class="text-decoration-none"> <img
                            src="{{ $article->mainImage }}" class="img-fluid rounded-3"
                            alt="Unique Properties"></a>
                </div>
            </div>
        </div>
    </div>
@endif
@endforeach
{{-- <div class="climateUpdate pt-3">
                                <div class="card text-bg-dark border-0 rounded-4">
                                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" class="card-img  rounded-4"
                                        alt="Unique Properties">
                                    <div class="card-img-overlay  rounded-4 text-white">
                                        <small>2023-09-07 TUE</small>
                                        <h5>09:18:00</h5>
                                        <h5 class="mt-3 mb-0"><i class="bi bi-cloud-fill"></i> 39.6 °C</h5>
                                        <small>Clouds 5.83 m/s | Dubai, UAE</small>
                                    </div>
                                </div>
                            </div> --}}
</div>
<div class="col-12 col-lg-12">
<div class="text-center mt-4">
<a href="{{ route('media') }}"
    class="btn btn-primary  text-uppercase rounded-pill px-3">view all blogs
    and videos</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

{{-- Story --}}
@if ($pageContent)
<section class="my-5 bg-lightBlue py-5 py-md-4 py-lg-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="row">
<div class="col-12 col-lg-12 col-md-12">
<div class="secHead text-center mb-3">
    <h2 class="text-primary text-uppercase">{{ $pageContent->title }}</h2>
</div>
</div>
<div class="col-12 col-lg-12 col-md-12">
<div class="mb-3 text-center">
    <div class="mb-0 d-none d-md-block d-lg-block">
        {!! $pageContent->description !!}
    </div>
    <div class="mb-0 d-block d-md-none d-lg-none">

        {!! substr(strip_tags($pageContent->description), 0, 250) !!}
    </div>
</div>
</div>
<div class="col-12 col-lg-12">
<div class="text-center mt-4">
    <a href="{{ route('about-us') }}"
        class="btn btn-primary  text-uppercase rounded-pill px-3">Read More</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
@endif
{{-- Agents --}}
<section class="my-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="row">

<div class="col-12 col-lg-6 col-md-6 my-auto">
<div>
<div class="secHead text-start mb-3">
    <h2 class="text-primary text-uppercase">Talk to a specialist</h2>
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
<div class="slider-div px-0 px-md-3 px-lg-5">

<!-- Swiper -->

<div
    class="swiper @if (count($agents) <= 3) agentSwiperLess @else agentSwiper @endif ">
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

{{-- Services --}}
<section class="my-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="row">
<div class="col-12 col-lg-12 col-md-12">
<div class="secHead text-center mb-3">
<h2 class="text-primary text-uppercase">Services</h2>
</div>
</div>
<div class="col-12 col-lg-12 col-md-12">
<div class="swiper serviceSlider">
<div class="swiper-wrapper">
    @foreach ($services as $service)
        <div class="swiper-slide">
            <a href="{{ url('service/' . $service->slug) }}"
                class="text-decoration-none">
                <div class="devContainer rounded-3"
                    style="background-image: url('{{ $service->image }}');">

                    <div class="devLogo p-3">
                        <div class="my-auto">
                            <p class="mb-1 text-white text-uppercase">
                                {{ $service->name }}</p>
                        </div>
                    </div>
                    <div class="commDetails p-3">
                        <div class="d-flex justify-content-end">

                            <div class="text-white border rounded-3 py-2 px-3 my-auto">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
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
<div class="col-12 col-lg-12">
<div class="text-center mt-4">
<a href="{{ route('services') }}"
    class="btn btn-primary  text-uppercase rounded-pill px-3">View All
    Services</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

{{-- testimonials --}}
<section class="my-5">
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-12 col-lg-4 col-md-12 my-auto">
<div class="ps-1 ps-md-5 ps-lg-5 ms-1 ms-md-5 ms-lg-5">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="mb-3">
    <h5 class="text-primary text-uppercase fw-light">Client testimonials</h5>
</div>
<div class="d-flex mb-3">
    <div class="my-auto">
        <img class="img-fluid me-3 rounded-circle"
            src="{{ asset('frontend/assets/images/icons/google.png') }}"
            width="70px" />
    </div>
    <div class="my-auto">
        <h5 class="mb-0 text-primary fw-bold">Rated 4.8/5</h5>
        <small class="text-primary">500+ Google Reviews</small>
    </div>
</div>
<div>
    <p class="">
        Don't just take our word for it. Here's what our clients have to say about their
        Unique experience.
    </p>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-8 col-md-12 my-auto">
<div>
<div class="swiper testiSwiper">
<div class="swiper-wrapper">
@foreach ($testimonials as $testimonial)
@if($testimonial->agent)
    <div class="swiper-slide h-auto">
        <div
            class="bg-white d-flex flex-column justify-content-center h-100 border rounded-3 px-5 px-md-4 px-lg-4 py-4">
            <div>
                <h5 class="text-primary">{{ $testimonial->feedback_title }}</h5>
                <p class="">{{ $testimonial->feedback }}</p>
            </div>
            <div class="d-flex">
                <div class="my-auto">
                    <img class="img-fluid me-3 rounded-circle testiImage"
                        src="{{ $testimonial->image }}" />
                </div>
                <div class="my-auto">
                    <div>
                        <?php for($i=1;$i<=$testimonial->rating;$i++){  ?>
                        <span class="fa fa-star text-warning fs-30 pe-1"></span>
                        <?php } ?>
                    </div>
                    <small class="text-primary">{{ $testimonial->client_name }}</small>
                </div>
            </div>
            <div class="text-end">
                <a href="{{ url('agent/' . $testimonial->agent->slug) }}"
                    class="btn btn-primary btn-sm fs-12 text-uppercase rounded-pill px-3">Contact
                    Agent</a>
            </div>
        </div>
    </div>
@endif
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
</div>
</div>
</div>
</section>

{{-- newsletter --}}
<section class="mt-5 bg-lightBlue py-5" id="newsletterSection">
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="row">
<div class="col-12 col-lg-7 col-md-7 my-auto">
<div class="secHead text-start">
<h3 class="text-primary fw-bold text-uppercase">Join our newsletter</h3>
<p class="mb-0">Subscribe to Newsletter</p>
</div>
</div>
<div class="col-12 col-lg-5 col-md-5 my-auto">
<div class="subscribeFormCont">
<form action="{{ route('subscribeForm') }}" id="subscribeForm" method="post">
    @csrf
    <div class="input-group">
        <input type="email" name="email" id="email"
            class="form-control form-control-md fs-16 form-control-lg"
            placeholder="Enter Your Email" required>
        <input type="hidden" class="form-control" id="formName" name="formName"
            value="Subscribe to Newsletter" required>
        <button class="btn btn-primary fs-16 btn-md btn-lg" type="submit"
            id="button-addon2">Sign
            up</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Register modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-fullscreen">
<div class="modal-content bg-primary">
<div class="modal-header border-0 bg-primaryLight justify-content-center">
<button type="button" class="bg-transparent border-0" data-bs-dismiss="modal"
aria-label="Close"><i class="bi bi-x-circle text-white fa-2x"></i></button>
</div>
<div class="modal-body d-flex flex-column justify-content-center">
<div class="row justify-content-center">
<div class="col-12 col-lg-12 col-md-12">
<div class="secHead text-center mb-3">
<h2 class="text-white text-uppercase formName">Register Now</h2>
</div>
</div>
<div class="col-12 col-lg-5 col-md-5">
<div class="modalViewFormCont">
<form action="{{ route('enquireForm') }}" id="modalViewForm" method="post">
    @csrf
    <div class="row g-3">
        <div class="col-md-12">
            <label for="name" class="form-label">Full Name*</label>
            <input type="text" class="form-control" id="name" name="name"
                placeholder="Full Name*">
            <input type="hidden" class="form-control" id="formNameEnquire"
                name="formName" value="">
            <input type="hidden" class="form-control" id="propName"
                name="propName" value="">
            <input type="hidden" class="form-control" id="fileUrl" name="fileUrl"
                value="">
        </div>

        <div class="col-md-12">
            <label for="email" class="form-label">Email*</label>
            <input type="email" class="form-control" id="email" name="email"
                placeholder="Email*">
        </div>

        <div class="col-md-12">
            <label for="mobile" class="form-label">Mobile*</label>
            <input id="fullNumber" type="hidden" name="fullNumber">
            <input type="tel" onkeyup="numbersOnly(this)"
                class="form-control contField" id="telephone" name="phone"
                placeholder="Mobile*">

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
<?php
function truncateLongText($string, $limit, $break = '.', $pad = '...')
{
    // return with no change if string is shorter than $limit
    $string = strip_tags($string, '<b><i><u><a><s><br><strong><em>');

    if (strlen($string) <= $limit) {
        return $string;
    }
    // is $break present between $limit and the end of the string?
    if (false !== ($breakpoint = strpos($string, $break, $limit))) {
        if ($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
    }
    return $string;
}
?>
<script>
    $(document).on('click', '.btnRegister', function() {
        //alert('check');
        var propUrl = $(this).attr("propertyUrl");
        var formName = $(this).attr("formName");
        $("#propName").val(propUrl);
        $("#formNameEnquire").val(formName);
        $(".formName").html(formName);
    });
    $(document).on('click', '.btnRegisterDownload', function() {
        //alert('check');
        var propUrl = $(this).attr("propertyUrl");
        var formName = $(this).attr("formName");
        var fileUrl = $(this).attr("fileUrl");
        if(fileUrl != ''){

        }
        $("#propName").val(propUrl);
        $("#formNameEnquire").val(formName);
        $("#fileUrl").val(fileUrl);
        $(".formName").html(formName);
    });
</script>
@endsection
