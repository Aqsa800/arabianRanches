@extends('frontend.layout.master')
@if ($page)
    @section('title', $page->meta_title)
    @section('pageDescription', $page->meta_description)
    @section('pageKeyword', $page->meta_keywords)
@else
    @section('title', 'Page | ' . $name)
    @section('pageDescription', $website_description)
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
                                    @if ($page)
                                    <li><a>{{ $page->page_name }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Content --}}
    @if ($page)
        <section class="my-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 my-auto">
                                <div class="secHead text-start mb-3">
                                    <h2 class="text-primary">{{ $page->page_name }}</h2>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 my-auto">
                                <div class="row g-3">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div>
                                            {!! $page->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="row g-3">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <div class="text-center">
                                        <h2 class="text-primary">Page not Found</h2>
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
                                    <div class="my-auto me-3 py-2"><button class="btn btn-primary rounded-pill px-5"
                                            data-bs-toggle="modal" data-bs-target="#EnquireNowModal">Enquire Now</button>
                                    </div>
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

@endsection
