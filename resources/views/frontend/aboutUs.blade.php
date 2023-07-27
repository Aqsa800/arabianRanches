@extends('frontend.layout.master')

@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'About Us | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">

    </section>

    {{-- about --}}
    @if($pageContent)
    <section class="pb-5 mb-5 shadow-sm" id="overview">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row colRev">

                        <div class="col-12 col-lg-6 col-md-6 my-auto">
                            <div class="px-1 px-lg-5 px-md-3 py-3 py-lg-0 py-md-3">
                                <div class="d-flex mb-3">
                                    <div class="my-auto rounded-4 shadow p-2 bg-white me-3">
                                        <img class="img-fluid" src="{{ $pageContent->image }}"
                                            width="80px" alt="unique properties" />
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="mb-0 text-primary">{{ $pageContent->title }}</h4>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        {!! $pageContent->less_description !!}
                                    </div>
                                    <div class="textExtra d-none">{!! $pageContent->more_description!!}</div>

                                    <a class="text-primary readMoreBtn cursor-pointer  d-block">Read More</a>
                                    <a class="text-primary readLessBtn cursor-pointer  d-none">Read
                                        Less</a>
                                </div>
                                <div class="text-start pt-3">
                                    {{-- <button type="button" class="btn btn-outline-light rounded-circle p-3 bg-primary"
                                        data-bs-toggle="modal" data-bs-target="#videoModal"><i
                                            class="bi bi-play-fill fa-2x lh-1"></i></button> --}}
                                    <button type="button"
                                        class="btn btn-primary fs-14 btn-lg videoBtnModal rounded-5 d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#videoModal" videoUrl="{{ $pageContent->video }}">Play Video
                                        <span
                                            class="bg-light ms-2 rounded-5 px-2 py-1 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-play-fill text-primary"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 my-auto">
                            <div class="masonryNew">
                                <ul class="masonryCont ps-0">
                                    <li>
                                    @foreach ($pageContent->gallery as $key => $imgs)
                                    {{-- @dd(count($pageContent->gallery)/3); --}}
                                    <div class="first-column">
                                        @foreach ($pageContent->gallery as $key => $imgs)

                                        @if($key < (count($pageContent->gallery)/3))
                                            <div class="item">
                                                <a href="{{ $imgs['path'] }}"
                                                    data-toggle="lightbox" data-gallery="example-gallery" class=""><img
                                                        src="{{ $imgs['path'] }}"
                                                        alt="Unique Properties" class="img-fluid" ></a>
                                            </div>
                                            @else
                                            @endif
                                          @endforeach
                                    </div>
                                    <div class="second-column">
                                        @foreach ($pageContent->gallery as $key => $imgs)
                                        @if($key > (count($pageContent->gallery)/3)-1 && $key < ((count($pageContent->gallery)/3)+(count($pageContent->gallery)/3)))
                                            <div class="item">
                                                <a href="{{ $imgs['path'] }}"
                                                    data-toggle="lightbox" data-gallery="example-gallery" class=""><img
                                                        src="{{ $imgs['path'] }}"
                                                        alt="Unique Properties" class="img-fluid" ></a>
                                            </div>
                                            @else
                                            @endif
                                          @endforeach
                                    </div>
                                    <div class="third-column">
                                        @foreach ($pageContent->gallery as $key => $imgs)
                                        @if($key > ((count($pageContent->gallery)/3)+(count($pageContent->gallery)/3)-1))
                                            <div class="item">
                                                <a href="{{ $imgs['path'] }}"
                                                    data-toggle="lightbox" data-gallery="example-gallery" class=""><img
                                                        src="{{ $imgs['path'] }}"
                                                        alt="Unique Properties" class="img-fluid" ></a>
                                            </div>
                                            @else
                                            @endif
                                          @endforeach
                                    </div>
                                    @endforeach
                                </li>
                                </ul>
                                <div class="scroll-btn cursor-pointer text-center d-none d-lg-block d-md-block">
                                    <div id=mouse_body>
                                        <div id=mouse_wheel></div>

                                    </div>
                                    <div>
                                        <span class="down-arrow-1 text-shadow"><i
                                                class="bi bi-chevron-down text-white"></i></span>
                                    </div>
                                    <small class="fs-14 text-white text-shadow">Scroll Down</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

    {{-- CEO Message --}}
    @if($ceoContent)
    <section class="my-5"  id="ceo">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row g-3">

                        <div class="col-12 col-lg-5 col-md-5 my-auto">
                            <div class="mb-3 d-flex d-lg-none d-md-none justify-content-between">
                                <div class="my-auto">
                                    <h5 class="mb-0 text-primary">{{$ceoContent->title}}</h5>
                                </div>
                                <div class="text-end my-auto">
                                    <button type="button" class="btn videoBtnModal border-0 btn-outline-light p-0"
                                        data-bs-toggle="modal" data-bs-target="#videoModal" videoUrl="{{ $ceoContent->video }}"><i
                                            class="bi bi-youtube text-primary fa-2x lh-1"></i></button>
                                </div>
                            </div>
                            <div class="">
                                <center><img class="img-fluid rounded-4 ceoImg"
                                        src="{{$ceoContent->image}}" alt="{{$ceoContent->title}}"></center>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-md-7 my-auto py-3">
                            <div class="text-start mb-1  d-none d-lg-block d-md-block">
                                <button type="button" class="btn videoBtnModal btn-outline-light border-0 p-0"
                                        data-bs-toggle="modal" data-bs-target="#ceovideoModal" videoUrl="{{ $ceoContent->video }}"><i
                                        class="bi bi-youtube text-primary fa-4x lh-1"></i></button>
                            </div>
                            <div class="mb-3 d-none d-lg-block d-md-block">
                                <div class="my-auto">
                                    <h5 class="mb-0 text-primary">{{$ceoContent->title}}</h5>
                                </div>
                            </div>
                            <div>
                                <div class="propDesc">
                                    {!! $ceoContent->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
    {{-- Partner --}}
    @if(count($partners) > 0)
    <section class="my-5 hideMob"  id="mission">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center mb-3">
                                <h2 class="text-primary text-uppercase">Partners</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="row g-3">
                                @foreach ($partners as $partner)

                                <div class="col-12 col-lg-6">
                                    <div class="partnerBlock">
                                        <div class="card p-3 border-0 bg-lightBlue rounded-3">
                                            <div class="row g-0">

                                                <div class="col-4 col-md-4 partnerImg rounded-3"
                                                    style="background:url('{{ $partner->image }}');">
                                                </div>

                                                <div class="col-8 col-md-8 my-auto ">
                                                    <div class="card-body p-0 ps-3 py-3">
                                                        <div class="text-start mb-1">
                                                            <button type="button" class="btn videoBtnModal btn-outline-light p-0"
                                                            data-bs-toggle="modal" data-bs-target="#partnervideoModal-{{$partner->id  }}" videoUrl="{{ $partner->video }}" ><i
                                                                class="bi bi-youtube text-primary fa-2x lh-1"></i></button>
                                                        </div>
                                                        <h6 class="card-title text-primary mb-1">{{ $partner->name }}</h6>
                                                        <div class="fs-14 mb-1">
                                                            {!! $partner->less_description !!}
                                                        </div>
                                                        <div class="textExtra fs-14 mb-1 d-none">{!! $partner->more_description !!}</div>

                                                        <a class="text-primary readMoreBtn cursor-pointer  d-block">Read
                                                            More</a>
                                                        <a class="text-primary readLessBtn cursor-pointer  d-none">Read
                                                            Less</a>
                                                    </div>
                                                </div>
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
    </section>
    {{-- Partner --}}
    <section class="my-5 mobDisplay" id="mission">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center mb-3">
                                <h2 class="text-primary text-uppercase">Partners</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="row g-3">
                                @foreach ($partners as $partner)
                                <div class="col-12 col-lg-6">
                                    <div class="partnerBlock">
                                        <div class="card p-3 border-0 bg-lightBlue rounded-3">
                                            <div class="row g-0">

                                                <div class="col-4 col-md-4 partnerImg rounded-3"
                                                    style="background:url('{{ $partner->image }}');">
                                                </div>

                                                <div class="col-8 col-md-8 my-auto ">
                                                    <div class="card-body p-0 ps-3 py-3">
                                                        <div class="text-start mb-1">
                                                            <button type="button" class="btn videoBtnModal btn-outline-light p-0"
                                        data-bs-toggle="modal" data-bs-target="#videoModal" videoUrl="{{ $partner->video }}"><i
                                            class="bi bi-youtube text-primary fa-2x lh-1"></i></button>
                                                        </div>
                                                        <h6 class="card-title text-primary mb-1">{{ $partner->name }}</h6>
                                                        <div class="fs-14 mb-1">
                                                            {!! $partner->less_description !!}
                                                        </div>


                                                        <a class="text-primary readMoreBtnNew cursor-pointer  d-block">Read
                                                            More</a>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="textDiv  d-none">
                                                        <div class="textFull fs-14 mb-1">{!! $partner->more_description !!}</div>
                                                        <a class="text-primary readLessBtnNew cursor-pointer">Read
                                                            Less</a>
                                                    </div>
                                                </div>
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
    </section>
@endif
    {{-- Awards --}}
    <section class="mt-0 mt-md-5 mt-lg-5 mb-5 bg-lightBlue py-5"  id="awards">
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
                                    @if($awards[0]->developer)
                                        <div class="swiper-slide">
                                            <div>
                                                <div class="text-center text-uppercase fs-14 p-3">
                                                    <center><img src="{{ $awards[count($awards)-1]->trophy }}"
                                                            alt="{{$awards[0]->developer->name}}" class="img-fluid mb-3"></center>
                                                    <div>
                                                        <h6 class="text-primary pb-2 border-bottom">{{$awards[0]->developer->name}} {{ $awards[0]->year == $awards[count($awards)-1]->year ? $awards[0]->year : $awards[0]->year .' - '. $awards[count($awards)-1]->year }}</h6>
                                                        <p class="fw-semibold">{{count($awards)}} awards</p>
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
                                <a href="{{route('awards')}}" class="btn btn-primary  text-uppercase rounded-pill px-3">View All
                                    Awards</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Agents --}}
    <section class="my-5" id="team">
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

                                            <div class="agentCont  @if(count($agents) <= 3) d-flex justify-content-center @endif">
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
                                                            <p class="mb-0 fw-semibold">Experience :
                                                                {{ $agent->experience }}</p>
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
                        <div class="col-12 col-lg-12">
                            <div class="text-center text-md-end text-lg-end mt-4">
                                <a href="{{route('agents')}}" class="btn btn-primary  text-uppercase rounded-pill px-3">View All
                                    Agents</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Location --}}
    <section class="mt-5 py-5 bg-lightBlue">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row g-3 colRev">

                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="mb-3">
                                <div class="my-auto">
                                    <h5 class="mb-0 text-primary">Contact Us</h5>
                                </div>
                            </div>
                            <div>
                                <h6 class="border-bottom pb-2">
                                    Head Office

                                </h6>
                                <p class="">{{ $address ? $address : '306, 307, & 308, Building 3, Bay Square, Business Bay, Dubai, United Arab Emirates'}}</p>
                                <h6 class="border-bottom pb-2">
                                    Operating Hours
                                </h6>
                                <p class="mb-0">Our business operating hours are as follows: </p>
                                <p class="mb-0">Monday to Friday: 8.30am - 6pm </p>
                                <p class="">Saturdays: 10am - 4pm </p>
                                <h6 class="border-bottom pb-2">
                                    Reach Us Now

                                </h6>
                                <p class="mb-0">UAE FREE PHONE: <a href="tel:{{ $tollfree_number ? $tollfree_number : '800 18881'}}"
                                        class="text-black text-decoration-none"> {{ $tollfree_number ? $tollfree_number : '800 18881'}}</a></p>
                                <p class="mb-0">TEL: <a href="tel:{{ $telephone_number ? $telephone_number : '+97144558888'}}"
                                        class="text-black text-decoration-none">{{ $telephone_number ? $telephone_number : '+97144558888'}} </a></p>
                                <p class="mb-0">EMAIL: <a href="mailto:{{ $email ? $email : 'info@uniqueproperties.ae'}}"
                                        class="text-black text-decoration-none">{{ $email ? $email : 'info@uniqueproperties.ae'}}</a></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-md-8 my-auto py-3">
                            <div class="mb-3">
                                <div class="my-auto">
                                    <h5 class="text-primary">Location</h5>
                                </div>
                            </div>

                            <div>
                                <iframe
                                    src="https://maps.google.com/maps?q={{ isset($address_latitude) ? $address_latitude : '' }},{{ isset($address_longitude) ? $address_longitude : '' }}&z=17&ie=UTF8&iwloc=&output=embed"
                                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content  bg-primary">
                <div class="modal-header border-0 justify-content-end p-1">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-circle text-white"></i></button>
                </div>
                <div class="modal-body">
                    <div>
                        @if($pageContent->video_iframe)
                        {!! $pageContent->video_iframe !!}
                        @elseif($pageContent->video)
                        <video class="videoSrc" width="100%" height="100%" controls>
                            <source src="{{ $pageContent->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @else
                        <video class="videoSrc" width="100%" height="100%" controls>
                            <source src="{{ asset('frontend/assets/images/banner/homeVideo.mov') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ceo Modal -->
    <div class="modal fade" id="ceovideoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content  bg-primary">
                <div class="modal-header border-0 justify-content-end p-1">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-circle text-white"></i></button>
                </div>
                <div class="modal-body">
                    <div>
                        @if($ceoContent->video_iframe)
                        {!! $ceoContent->video_iframe_1 !!}
                        @elseif($ceoContent->video)
                        <video class="videoSrc" width="100%" height="100%" controls>
                            <source src="{{ $ceoContent->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @else
                        <video class="videoSrc" width="100%" height="100%" controls>
                            <source src="{{ asset('frontend/assets/images/banner/homeVideo.mov') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partner Modal -->
    @foreach ($partners as $partner)
    <div class="modal fade" id="partnervideoModal-{{ $partner->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content  bg-primary">
                <div class="modal-header border-0 justify-content-end p-1">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-circle text-white"></i></button>
                </div>
                <div class="modal-body">
                    <div>
                        @if($partner->video_iframe)
                        {!! $partner->video_iframe !!}
                        @elseif($partner->video)
                        <video class="videoSrc" width="100%" height="100%" controls>
                            <source src="{{ $partner->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @else
                        <video class="videoSrc" width="100%" height="100%" controls>
                            <source src="{{ asset('frontend/assets/images/banner/homeVideo.mov') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        $(document).on('click', '.videoBtnModal', function() {
            //alert('check');
            var videourl = $(this).attr("videourl");
            $(".videoSrc").attr("src",videourl);
        });
    </script>
@endsection
