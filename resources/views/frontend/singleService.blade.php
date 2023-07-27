@extends('frontend.layout.master')
@if ($service->meta_title != '')
    @section('title', $service->meta_title)
@else
    @section('title', $service->name)
@endif
@if ($service->meta_description != '')
    @section('pageDescription', $service->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($service->meta_keyword != '')
    @section('pageKeyword', $service->meta_keyword)
@else
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">
    </section>

    {{-- search & breadcrumps --}}
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ route('services') }}">Services</a></li>
                                    <li><a>{{ $service->name }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">

                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="secHead text-start mb-3">
                                <h2 class="text-primary">{{ $service->name }}</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="row g-3">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <div>
                                        @if ($service->image)
                                            <img class="img-fluid rounded-3  float-start  widthImg100 me-5 mb-2"
                                                src="{{ $service->image }}" width="50%" alt="{{ $service->name }}">
                                        @endif
                                        {!! $service->description !!}
                                    </div>

                                    @if(count($service->childServies)>0)
                                    <div class="accordion accordion-flush" id="accordionExample">
                                        @foreach ($service->childServies as $key => $childService)
                                            <div class="accordion-item border-0 pb-2">
                                                <h2 class="accordion-header" id="serice{{ $key + 1 }}Q">
                                                    <button
                                                        class="accordion-button collapsed bg-transparent p-0 "
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#serice{{ $key + 1 }}Detail"
                                                        aria-expanded="false"
                                                        aria-controls="serice{{ $key + 1 }}Detail">
                                                        <h6 class="text-primary">{{ $childService->name }}</h6>
                                                    </button>
                                                </h2>
                                                <div id="serice{{ $key + 1 }}Detail"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="serice{{ $key + 1 }}Q"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body p-0">
                                                        {!! $childService->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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

    {{-- Contact --}}
    <section class="my-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="bg-lightBlue p-3 p-md-3 p-lg-5">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 my-auto">
                                <div class="secHead text-center text-lg-start text-md-start">
                                    <h4 class="text-primary fw-semibold mb-0">Have a question?</h4>
                                    <h4 class="text-primary fw-semibold">Our team is happy to assist you</h4>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 col-md-5 my-auto">
                                <div class="d-block d-lg-flex d-md-block text-center justify-content-center">
                                    <div class="my-auto me-3 py-2"><a href="{{ route('contact-us') }}"
                                            class="btn btn-primary rounded-pill px-5">Contact
                                            Us</a></div>
                                    <div class="my-auto py-2">or <span class="fw-semibold">Call: </span><a
                                            href="tel:{{ $telephone_number ? $telephone_number : '+97144558888' }}"
                                            class="text-decoration-none text-dark">{{ $telephone_number ? $telephone_number : '+971 4 455 8888' }}</a>
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
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">

                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="secHead text-start mb-3">
                                <h2 class="text-primary">Other Services</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="swiper serviceSliderMore swiperAwardsFull pb-5">
                                <div class="swiper-wrapper">
                                    @foreach ($similarServices as $item)
                                        <div class="swiper-slide">

                                            <div class="serviceBlock">
                                                <div class="card p-3 border-0">
                                                    <div class="row g-0">

                                                        <div class="col-4 col-md-4 my-auto ">
                                                            <div class="my-auto rounded-3 border p-3 bg-lightBlue">
                                                                <center><a href="{{ url('service/' . $item->slug) }}"
                                                                        class="text-decoration-none"><img class="img-fluid"
                                                                            src="{{ $item->icon }}"
                                                                            alt="{{ $item->name }}" width="60px" /></a>
                                                                </center>
                                                            </div>
                                                        </div>

                                                        <div class="col-8 col-md-8 my-auto ">
                                                            <div class="card-body p-0 ps-3">
                                                                <a href="{{ url('service/' . $item->slug) }}"
                                                                    class="text-decoration-none">
                                                                    <h6 class="card-title text-primary mb-1">
                                                                        {{ $item->name }}</h6>
                                                                </a>
                                                                <p class="fs-14 mb-0">
                                                                    {!! substr(strip_tags($item->description), 0, 70) . '...' !!}
                                                                </p>
                                                                <a href="{{ url('service/' . $item->slug) }}"
                                                                    class="text-primary text-uppercase fw-semibold fs-14 text-decoration-none">Read
                                                                    More <i class="bi bi-chevron-right fs-12"></i></a>
                                                            </div>
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
    </section>
@endsection
