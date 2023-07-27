@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Services | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{ $pagemeta ? ($pagemeta->bannerImage ? $pagemeta->bannerImage : asset('frontend/assets/images/banner/homeBg.webp')) : asset('frontend/assets/images/banner/homeBg.webp') }}');min-height:60vh;justify-content:end;padding-top:100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    <div class="row py-3">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center">
                                <h1 class="text-white">Services</h1>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Services</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services  --}}
      <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                                @foreach ($services as $service)
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                        <a href="{{ url('service/' . $service->slug) }}"
                                            class="text-decoration-none p-5">
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


                        {{-- <div class="col-12 col-lg-12 col-md-12">
                           <div class="row g-3">
                            @foreach ($services as $service)
                            <div class="col-12 col-lg-4 col-md-6">
                                <div class="serviceBlock">
                                    <div class="card p-3 border-0">
                                        <div class="row g-0">

                                            <div class="col-4 col-md-4 my-auto ">
                                                <div class="my-auto rounded-3 border p-3 bg-lightBlue">
                                                    <center><a href="{{url('service/'.$service->slug)}}" class="text-decoration-none"><img class="img-fluid"
                                                        src="{{ $service->icon }}" alt="{{$service->name}}" width="60px" /></a></center>
                                                </div>
                                            </div>

                                            <div class="col-8 col-md-8 my-auto ">
                                                <div class="card-body p-0 ps-3">
                                                    <a href="{{url('service/'.$service->slug)}}" class="text-decoration-none"><h6 class="card-title text-primary mb-1">{{($service->name)}}</h6></a>
                                                    <p class="fs-14 mb-0">
                                                        {!! substr(strip_tags($service->description), 0, 70).'...'!!}
                                                    </p>
                                                    <a href="{{url('service/'.$service->slug)}}" class="text-primary text-uppercase fw-semibold fs-14 text-decoration-none">Read More <i class="bi bi-chevron-right fs-12"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
