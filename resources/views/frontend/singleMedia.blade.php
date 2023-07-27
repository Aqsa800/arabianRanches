@extends('frontend.layout.master')
@if ($article->meta_title != '')
    @section('title', $article->meta_title)
@else
    @section('title', $article->title)
@endif
@if ($article->meta_description != '')
    @section('pageDescription', $article->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($article->meta_keyword != '')
    @section('pageKeyword', $article->meta_keyword)
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
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue mb-0 ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ route('media') }}">Media</a></li>
                                    <li><a>{{$article->article_type}}</a></li>
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
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="row">

                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="my-auto">
                                <h2 class=" text-primary ">{{$article->title}}</h2>
                            </div>

                            <div class="d-flex justify-content-start text-secondary mb-3">
                                <div class="my-auto me-3">
                                    <small><i class="fa fa-calendar"></i>&nbsp; {{date('d-m-Y', strtotime($article->publish_at));}}</small>
                                </div>
                                <div class="my-auto">
                                    <small><i class="fa fa-user"></i>&nbsp; {{$article->author}}</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <center>
                                    <img src="{{$article->mainImage}}" alt="{{$article->title}}" class="img-fluid rounded-3">
                                </center>
                            </div>
                            <div class="blogDesc">
                                {!! $article->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Simialar News --}}
    @if(count($similarArticle) > 0)
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="row g-3">

                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="mb-2">
                                <h6 class=" text-primary ">Other News</h6>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="swiper serviceSlider blogSliderArr">
                                <div class="swiper-wrapper">
                                    @foreach ($similarArticle as $item)
                                        
                                    
                                    <div class="swiper-slide">

                                        <div class="row g-0">
                                            <div class="col-12 col-lg-12 col-md-12">
                                                <center>
                                                    <a href="{{url(strtolower($item->article_type).'/'.$item->slug)}}" class="text-decoration-none"> <img src="{{$item->mainImage}}" alt="{{$item->title}}" class="img-fluid blogSimImg rounded-3"></a>
                                                </center>
                                            </div>
                                            <div class="col-12 col-lg-12 col-md-12">
                                                <div class="">
                                                    <div class="mt-2">
                                                        <a href="{{url(strtolower($item->article_type).'/'.$item->slug)}}" class="text-primary text-decoration-none"><h6 class=" fs-16 text-primary ">{{substr(strip_tags($item->title), 0, 60).'...'}}</h6></a>
                                                    </div>
                                                    <div>
                                                            <a href="{{url(strtolower($item->article_type).'/'.$item->slug)}}" class="text-primary text-uppercase fw-semibold fs-14 text-decoration-none">Read More <i class="bi bi-chevron-right fs-12"></i></a>
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
    @endif
@endsection
