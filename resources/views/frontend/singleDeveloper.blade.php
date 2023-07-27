@extends('frontend.layout.master')
@if ($developer->meta_title != '')
    @section('title', $developer->meta_title)
@else
    @section('title', $developer->name)
@endif
@if ($developer->meta_description != '')
    @section('pageDescription', $developer->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($developer->meta_keyword != '')
    @section('pageKeyword', $developer->meta_keyword)
@else
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:url('{{ $developer->image }}');padding:110px 0px;min-height:92vh !important">
        <div class="container">
            <div class="row justify-content-center">
                @if($developer->video)
                <div class="col-12 col-lg-12">
                    <div class="text-center mb-3 mb-md-1 mb-lg-1">
                        <button type="button" class="btn btn-outline-light rounded-circle p-3 bg-lightOlive"
                            data-bs-toggle="modal" data-bs-target="#videoModal"><i
                                class="bi bi-play-fill fa-2x lh-1"></i></button>
                    </div>
                </div>
                @endif
                <div class="col-12 col-lg-12">
                    <h1 class="bannerHeading text-uppercase text-white text-center">{{$developer->name}}</h1>
                </div>
                <div class="col-12 col-lg-8 text-center text-white">
                    <div class="propDesc">
                        {!! $developer->short_description !!}
                    </div>
                </div>
                <div class="col-12 col-lg-8 text-center">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#subscribeModal"
                                        class="btn btn-light rounded-pill px-5">Subscribe for Latest Launches</button>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="position-bottom">
                        <div class="d-flex justify-content-center py-3">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{route('developers')}}">Developer</a></li>
                                <li><a>{{$developer->name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        {{-- counter --}}
        @if(count($developer->details) >  0)
            <section class="my-5 awardPc" id="counter">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="row g-3 justify-content-center">
                                @foreach ($developer->details as $item)
                                <div class="col-12 col-lg-3 col-md-4">
                                    <div class="text-center">
                                        <h1 class="text-primary fw-semibold mb-0"><span class="counter" data-count="{{(int)( $item->value)}}">0</span></h1>
                                        <p class="text-secondary fs-18 fw-semibold">{{$item->name}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- counter Mobile --}}
            <section class="awardMob bg-primary py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <div class="swiper counterSliderMob">
                                        <div class="swiper-wrapper">
                                            @foreach ($developer->details as $item)
                                            <div class="swiper-slide">
                                                <div class="text-center">
                                                    <h1 class="text-white fw-semibold mb-0">{{(int)( $item->value)}}</h1>
                                                    <p class="text-secondary fs-18 mb-0 fw-semibold">{{$item->name}}</p>
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
    {{-- Tags --}}
    @if(count($tags) >  0)
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="d-flex mb-3">
                                <div class="my-auto">
                                    <h2 class="mb-0 text-primary">Popular Tags</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <form action="{{route('developers')}}" method="post">
                                @csrf
                            <div class="propTagDiv">
                                @foreach ($tags as $key => $tag)
                                @if($key < 6)
                                    <div class="propTag">
                                        <input type="radio" class="btn-check btnCheckTab" name="tags"
                                            id="tag{{ $key + 1 }}" autocomplete="off" value="{{ $tag->id }}" @if(isset($data['tags']))
                                            {{$data['tags'] == $tag->id ? 'checked' : ''}}
                                       @endif>
                                        <label class="btn btn-secondary btn-lightBlue"
                                            for="tag{{ $key + 1 }}">{{ $tag->name }}</label>
                                    </div>
                                @else
                                <div class="propTag TagExtra d-none">
                                    <input type="radio" class="btn-check btnCheckTab" name="tags"
                                            id="tag{{ $key + 1 }}" autocomplete="off" value="{{ $tag->id }}" @if(isset($data['tags']))
                                            {{$data['tags'] == $tag->id ? 'checked' : ''}}
                                       @endif>
                                        <label class="btn btn-secondary btn-lightBlue"
                                            for="tag{{ $key + 1 }}">{{ $tag->name }}</label>
                                </div>
                                @endif
                                @endforeach 
                            </div>
                        </form>
                        @if(count($tags) >= 6)
                        <a class="showMoreBtn text-primary">Show More Tags</a>
                            <a class="showLessBtn  d-none text-primary">Show Less Tags</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
{{-- @dd($developer); --}}
    {{-- about --}}
    <section class="my-5 py-5 bg-lightBlue">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row g-3 colRev">
                        <div class="col-12 col-lg-6 col-md-12 my-auto">
                            <div class="d-none d-lg-block d-md-block mb-3">
                                <div class="my-auto">
                                    <h2 class="mb-0 text-primary">{{$developer->name}} Communities</h2>
                                </div>
                            </div>
                            <div>
                                <div class="propDesc">
                                    {!! $developer->long_description !!}
                                </div>
                            </div>
                            <div class="row g-1 pt-3 text-center">
                                <div class="col-auto my-auto">
                                    <a href="{{ $whatsapp ? $whatsapp : ''}}"
                                        class="text-decoration-none w-100 btn btn-lg fs-14 btn-success my-1 rounded-1"
                                        target="_blank">
                                        <i class="bi bi-whatsapp "></i>
                                    </a>
                                </div>
                                <div class="col-auto my-auto">
                                    <a href="tel:{{ $telephone_number ? $telephone_number : '+97144558888'}}"
                                        class="text-decoration-none w-100 btn btn-lg fs-14 btn-primary my-1 rounded-1"
                                        target="_blank">
                                        <i class="bi bi-telephone"></i>
                                    </a>
                                </div>
                                <div class="col-auto my-auto">
                                    <a href="{{url('communities?developer='.$developer->id)}}"
                                        class="btn fs-14 w-100 btn-primary btn-lg fs-14 my-1 rounded-1">View All
                                        Communities</a>
                                </div>
                            </div>
                        </div>
                        {{-- @dd($developer->communityDevelopers) --}}
                        @if(count($developer->communityDevelopers) > 0)
                        <div class="col-12 col-lg-6 col-md-12 my-auto">
                            <div class="d-block d-lg-none d-md-none mb-3">
                                <div class="my-auto">
                                    <h2 class="mb-0 text-primary">{{$developer->name}} Communities</h2>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="masonryDev communityGrid">
                                    @foreach ($developer->communityDevelopers as $key => $comm)
                                    @if($key < 5)
                                        <div class="item item-{{$key}}">
                                            <a href="{{ url('community/' . $comm->slug) }}"
                                                class="text-decoration-none"><img class="item__content img-fluid" src="{{$comm->mainImage}}" alt="{{$comm->name}}"></a>
                                            <div class="itemText"><a href="{{ url('community/' . $comm->slug) }}"
                                                class="text-decoration-none"><small class="text-white">{{$comm->name}}</small></a></div>
                                        </div>
                                        @else
                                        @break;
                                        @endif
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
    {{-- Projects --}}
    @if(count($latestProjects) > 0)
    <section class="my-5 ">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="secHead text-center mb-5">
                        <h2 class="text-primary">Latest Launches</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-md-12">
                    <div>
                        <div class="swiper developerProject py-3">
                            <div class="swiper-wrapper">
                               @foreach ($latestProjects as $latest)
                                <div class="swiper-slide px-2 px-md-5 px-lg-5">
                                    <div class=" shadow bg-lightBlue rounded-3 p-4">
                                        <div class="row">
                                            <div class="col-12 col-lg-5 col-md-12 my-auto">
                                                <div>
                                                    <div class="swiper swiperPropList swiperLatest swiperDev">
                                                        <div class="swiper-wrapper">
                                                            @if(count($latest->exteriorGallery) > 0)
                                                            @foreach ($latest->exteriorGallery as $img)
                                                            <div class="swiper-slide">
                                                                <div class="">
                                                                    <center><a href="{{ url('dubai-offplan' . '/' . $latest->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <img src="{{ $img['path'] }}"
                                                                                class="img-fluid devContainerNew rounded-4 "
                                                                                alt="{{$latest->title}}">
                                                                        </a>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @elseif(count($latest->interiorGallery) > 0)
                                                            @foreach ($latest->interiorGallery as $img)
                                                            <div class="swiper-slide">
                                                                <div class="">
                                                                    <center><a href="{{ url('dubai-offplan' . '/' . $latest->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <img src="{{ $img['path'] }}"
                                                                                class="img-fluid devContainerNew rounded-4 "
                                                                                alt="{{$latest->title}}">
                                                                        </a>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @else
                                                            <div class="swiper-slide">
                                                                <div class="">
                                                                    <center><a href="{{ url('dubai-offplan' . '/' . $latest->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <img src="{{ $latest->mainImage }}"
                                                                                class="img-fluid devContainerNew rounded-4 "
                                                                                alt="{{$latest->title}}">
                                                                        </a>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            @endif
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
                                                <div class="d-none d-md-block d-lg-block">
                                                    <div class="row g-1 pt-3 text-center">
                                                        <div class="col-auto my-auto">
                                                            <a href="{{ $latest->agent->whatsapp_number ? 'https://wa.me/'.$latest->agent->whatsapp_number : $whatsapp}}"
                                                                class="text-decoration-none w-100 btn btn-success my-1 rounded-1"
                                                                target="_blank">
                                                                <i class="bi bi-whatsapp "></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto my-auto">
                                                            <a href="tel:{{ $latest->agent->contact_number ? $latest->agent->contact_number : $telephone_number }}"
                                                                class="text-decoration-none w-100 btn btn-primary my-1 rounded-1"
                                                                target="_blank">
                                                                <i class="bi bi-telephone"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto my-auto">
                                                            <a href="{{ url('dubai-offplan' . '/' . $latest->slug) }}"
                                                                class="btn w-100 btn-primary text-decoration-none my-1 rounded-1">Learn
                                                                More</a>
                                                        </div>
                                                        <div class="col-auto my-auto">
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#preRegister" propertyUrl="{{ url('dubai-offplan' . '/' . $latest->slug) }}"
                                                                class="btn  w-100 btn-primary bookpreRegisterBtn my-1 rounded-1">Pre-Register</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-7 col-md-12 my-auto">
                                                <div class="bg-white px-0 px-lg-3 px-md-3 py-2 rounded-3">
                                                    <div class="d-flex justify-content-start my-2">
                                                        <div class="my-auto pe-1 pe-lg-3 pe-md-3 border-end">

                                                            <h5 class="text-primary mb-0">{{ substr(strip_tags($latest->title), 0, 40) . '...' }}</h5>
                                                            <p class="text-secondary mb-0">Prime location  {{$latest->emirate ? 'in '. $latest->emirate :$latest->mainCommunity->name}}</p>
                                                        </div>
                                                        <div class="my-auto px-3">
                                                            <p class="text-secondary mb-0">Starting Price</p>
                                                            <p class="fw-bold mb-0">AED {{$latest->starting_price}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="propDesc">
                                                        {!! $latest->short_description !!}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row g-2">

                                                       
                                                        <div class="col-4 col-lg-3 {{$latest->area_highlight ? '' : 'nonHighlighted' }}">
                                                            <div class=" h-100 {{$latest->area_highlight ? 'highlightedShadow' :'shadow' }}  text-center p-2 rounded-3">
                                                               <div class="my-auto">
                                                                <div class="mb-1">
                                                                    <center>
                                                                        <img src="{{ asset('frontend/assets/images/icons/plot.png') }}"
                                                                            alt="Unique Properties Logo "
                                                                            class="img-fluid amenityImg">
                                                                    </center>
                                                                </div>
                                                                <div class="text-primary my-auto">
                                                                    <p class="fw-bold fs-12 mb-0">{{$latest->area}} {{$latest->area_unit ?$latest->area_unit :'sqft' }}</p>
                                                                    <p class="fs-12 text-secondary mb-0">Total Area</p>
                                                                </div>
                                                               </div>
                                                            </div>
                                                        </div>
                                                        @if($latest->accommodations)
                                                        <div class="col-4 col-lg-3 {{$latest->accommodation_id_highlight ? '' : 'nonHighlighted' }}">
                                                            <div class=" {{$latest->accommodation_id_highlight ? 'highlightedShadow' :'shadow' }} h-100 text-center p-2 rounded-3">
                                                                <div class="mb-1">
                                                                    <center>
                                                                        <img src="{{ asset('frontend/assets/images/icons/apartment.png') }}"
                                                                            alt="Unique Properties Logo "
                                                                            class="img-fluid amenityImg">
                                                                    </center>
                                                                </div>
                                                                <div class="text-primary my-auto">
                                                                    <p class="fw-bold fs-12 mb-0">{{$latest->accommodations->implode('name', ',')}}</p>
                                                                    <p class="fs-12 text-secondary mb-0">Property Type</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        <div class="col-4 col-lg-3 {{$latest->community_id_highlight ? '' :'nonHighlighted' }}">
                                                            <div class=" {{$latest->community_id_highlight ? 'highlightedShadow' :'shadow' }}  h-100 text-center p-2 rounded-3">
                                                                <div class="mb-1">
                                                                    <center>
                                                                        <img src="{{ asset('frontend/assets/images/icons/map.png') }}"
                                                                            alt="Unique Properties Logo "
                                                                            class="img-fluid amenityImg">
                                                                    </center>
                                                                </div>
                                                                <div class="text-primary my-auto">
                                                                    <p class="fw-bold fs-12 mb-0">{{$latest->mainCommunity->name}}</p>
                                                                    <p class="fs-12 text-secondary mb-0">Location</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-lg-3 {{$latest->completion_date_highlight ? '' : 'nonHighlighted' }}">
                                                            <div class="{{$latest->completion_date_highlight ? 'highlightedShadow' :'shadow' }}  h-100 text-center p-2 rounded-3">
                                                                <div class="mb-1">
                                                                    <center>
                                                                        <img src="{{ asset('frontend/assets/images/icons/home.png') }}"
                                                                            alt="Unique Properties Logo "
                                                                            class="img-fluid amenityImg">
                                                                    </center>
                                                                </div>
                                                                <div class="text-primary my-auto">
                                                                    <p class="fw-bold fs-12 mb-0">{{$latest->completion_date}}</p>
                                                                    <p class="fs-12 text-secondary mb-0">Handover</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(count($latest->highlighted_amenities) > 0)
                                                        @foreach ($latest->highlighted_amenities as $highlight)
                                                            
                                                       
                                                        <div class="col-4 col-lg-3 ">
                                                            <div class="highlightedShadow  h-100  text-center p-2 rounded-3">
                                                                <div class="mb-1">
                                                                    <center>
                                                                        <img src="{{ asset('frontend/assets/images/amenities/pool.png') }}"
                                                                            alt="Unique Properties Logo "
                                                                            class="img-fluid amenityImg">
                                                                    </center>
                                                                </div>
                                                                <div class="text-primary my-auto">
                                                                    <p class="fs-12 text-primary fw-semibold mb-0">{{$highlight->name}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        @foreach ($latest->unhighlighted_amenities as $unhighlight)
                                                            
                                                       
                                                        <div class="col-4 col-lg-3 nonHighlighted">
                                                            <div class="shadow  h-100  text-center p-2 rounded-3">
                                                                <div class="mb-1">
                                                                    <center>
                                                                        <img src="{{ asset('frontend/assets/images/amenities/pool.png') }}"
                                                                            alt="Unique Properties Logo "
                                                                            class="img-fluid amenityImg">
                                                                    </center>
                                                                </div>
                                                                <div class="text-primary my-auto">
                                                                    <p class="fs-12 text-primary fw-semibold mb-0">{{$unhighlight->name}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-block d-md-none d-lg-none">
                                                    <div class="row g-1 pt-3 text-center">
                                                        <div class="col-auto my-auto">
                                                            <a href="{{ $latest->agent->whatsapp_number ? 'https://wa.me/'.$latest->agent->whatsapp_number : $whatsapp}}"
                                                                class="text-decoration-none w-100 btn btn-sm btn-success my-1 rounded-1"
                                                                target="_blank">
                                                                <i class="bi bi-whatsapp "></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto my-auto">
                                                            <a href="tel:{{ $latest->agent->contact_number ? $latest->agent->contact_number : $telephone_number }}"
                                                                class="text-decoration-none w-100 btn-sm btn btn-primary my-1 rounded-1"
                                                                target="_blank">
                                                                <i class="bi bi-telephone"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto my-auto">
                                                            <a href="{{ url('dubai-offplan' . '/' . $latest->slug) }}"
                                                                class="btn w-100 btn-primary text-decoration-none btn-sm my-1 rounded-1">Learn
                                                                More</a>
                                                        </div>
                                                        <div class="col-auto my-auto">
                                                            <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#preRegister" propertyUrl="{{ url('dubai-offplan' . '/' . $latest->slug) }}"
                                                                class="btn  w-100 btn-primary bookpreRegisterBtn btn-sm my-1 rounded-1">Pre-Register</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>     
                                @endforeach
                            </div>
                            <div class="swiper-button-prev swiperPrev">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                </span>
                            </div>
                            <div class="swiper-button-next swiperNext me-2">
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
    @endif
    {{-- Featured Property --}}
    @if(count($featuredProjects) > 0)
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-start mb-3">
                                <h5 class="text-primary">Featured projects from Emaar that may interest you</h5>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12  my-auto">

                            <div>
                                <div class="swiper swiperThumpLatest py-3 px-1">
                                    <div class="swiper-wrapper">
                                        @foreach ($featuredProjects as $featured)
                                        <div class="swiper-slide">
                                            <div>
                                                <div class="card border-0 shadow">
                                                    <a href="{{ url('dubai-offplan' . '/' . $featured->slug) }}"
                                                        class="text-decoration-none">
                                                        <img src="{{ $featured->mainImage }}"
                                                            class="card-img-top "
                                                            alt="{{$featured->title}}">
                                                    </a>
                                                    <div class="card-body">
                                                        <h5 class="text-primary mb-1">{{ substr(strip_tags($featured->title), 0, 20) . '...' }}</h5>
                                                        <ul class="list-unstyled propListSmall lh-1 my-2">
                                                            <li class="d-inline"><small>{{ $featured->bedrooms  ? $featured->bedrooms : '' }} Beds</small></li>
                                                            <li class="d-inline"><small> {{ $featured->bathrooms  ? $featured->bathrooms : '' }} Baths</small>
                                                            </li>
                                                            <li class="d-inline"><small>{{ $featured->area ? $featured->area : '' }}
                                                                {{ $featured->area_unit ? $featured->area_unit : 'sqft' }}</small></li>
                                                        </ul>
                                                        <small>Starting Price: AED {{ $featured->starting_price }}</small>
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
        </div>
    </section>
    @endif
    {{-- Awards --}}
    @if(count($developer->awards) > 0)
    <section class="my-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="secHead text-center mb-5">
                        <h2 class="text-primary">Awards Received from {{$developer->name}}</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="swiper pb-5 swiperPropList swiperAwardsFull">
                        <div class="swiper-wrapper pb-3">
                            @foreach ($developer->awards as $award)
                                
                            <div class="swiper-slide bg-lightBlue rounded-3 p-1 p-md-3 p-lg-5">

                                <div class="row">

                                    <div class="col-12 col-lg-4 col-md-4 my-auto">
                                        <div class="text-center">
                                            <center><img src="{{$award->gallery[0]['path']}}"
                                                    alt="{{$award->title}}" class="img-fluid awardImg"></center>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 col-md-8 my-auto">
                                        <div class=" bg-white p-0 p-lg-3 p-md-2 rounded-3">
                                            <div class="card border-0">
                                                <div class="row g-0">
                                                    <div class="col-md-4 my-auto">
                                                        <div class="w-fit-content d-none d-lg-block d-md-block p-relative mx-auto">
                                                            <center> <img
                                                                    src="{{$award->trophy}}"
                                                                    alt="{{$award->title}}"
                                                                    class="img-fluid bg-lightBlue border imgAwardTrophy rounded-3 p-2">
                                                            </center>
                                                            <div class="zoomBtn">
                                                                <a href="{{$award->trophy}}"
                                                                    data-toggle="lightbox">
                                                                    <span class="fa-stack">
                                                                        <i class="fa fa-square fa-stack-2x text-light"></i>
                                                                        <i
                                                                            class="bi bi-zoom-in text-primary fs-14 fa-stack-1x"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12 col-md-8 my-auto">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-primary">{{$award->title}}</h5>
                                                            <p class="card-text">{{$award->position}}</p>
                                                            <h5 class="text-primary">{{$award->year}}</h5>
                                                            <a href="{{route('awards')}}" class="btn btn-primary px-3">View Awards</a>
                                                        </div>
                                                    </div>
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
    </section>
@endif
{{-- Agents --}}
<section class="bg-lightBlue py-5 mt-5" id="agent">
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
                            <source src="{{ $developer->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Register modal -->
      <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h2 class="text-white text-uppercase">Register Now</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 col-md-5">
                            <div class="modalViewFormCont">
                                <form action="{{route('enquireForm')}}" id="modalViewForm" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Full Name*</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Full Name*" required>
                                                <input type="hidden" class="form-control" id="formName" name="formName"
                                            value="Latest Launch Subscription">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Email*</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email*" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mobile" class="form-label">Mobile*</label>
                                            <input id="fullNumber2" type="hidden" name="fullNumber">
                                            <input type="tel" class="form-control contField" id="telephoneNew"
                                                name="phone" placeholder="Mobile*" required>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-grid ">
                                                <button type="submit" class="btn btn-lightBlue rounded-pill text-uppercase">Submit
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
<!-- Book Viewing modal -->
<div class="modal fade" id="preRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h2 class="text-white text-uppercase">Pre-register Project</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 col-md-5">
                        <div class="modalViewFormCont">
                            <form action="{{route('enquireForm')}}" id="modalViewForm" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Full Name*</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Full Name*" required>
                                        <input type="hidden" class="form-control" id="formName" name="formName"
                                            value="Pre Register Project">
                                        <input type="hidden" class="form-control" id="propName" value="">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email*" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="mobile" class="form-label">Mobile*</label>
                                        <input id="fullNumber" type="hidden" name="fullNumber">
                                        <input type="tel"   onkeyup="numbersOnly(this)" class="form-control contField" id="telephone"
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
    $(document).on('click', '.bookpreRegisterBtn', function() {
        //alert('check');   
        var formName = $(this).attr("propertyUrl");
        $("#propName").val(formName);
    });
    $(document).on('change', '.btnCheckTab', function(event) {
        if (this.checked) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
        $(this).closest("form").submit();   
    
    });
    </script>
@endsection
