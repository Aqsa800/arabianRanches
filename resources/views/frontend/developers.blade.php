@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Developers | '.$name)
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
                                <h1 class="text-white">Developers</h1>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Developers</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- projects --}}

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="row g-4">
                        @foreach ($developers as $developer)
                        <div class="col-12 col-lg-12 col-md-12 agentProperty">
                            <div>
                                <div class="card p-3 borderLight">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="swiper swiperPropList swiperDev">
                                                <div class="swiper-wrapper">
                                                    @if(count($developer->projects) >0)
                                                        @foreach ($developer->projects as $project)
                                                            <div class="swiper-slide">
                                                                <div class="">
                                                                    <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                        class="text-decoration-none">
                                                                    <div class="devContainerNew rounded-2"
                                                                        style="background-image: url('{{$project->mainImage}}')">
                                                                        @if($project->is_new_launch == 1)
                                                                        <div class="devTopLeft">
                                                                            <div
                                                                            class="badge bg-warning fw-normal text-white fs-12">
                                                                            <i class="bi bi-patch-check-fill"></i> New</div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="devDetails p-3">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div class="my-auto">
                                                                                    <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                        class="text-decoration-none"> <p class="mb-0 text-white">{{$project->title}}</p></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                    <div class="swiper-slide">
                                                        <div class="">
                                                            <div class="devContainerNew rounded-2"
                                                                style="background-image: url('{{ $developer->image }}')">

                                                                <div class="devDetails p-3">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="my-auto">
                                                                            <p class="mb-0 text-white"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif

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
                                                        <i
                                                            class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="p-relative h-100">
                                                <div class="card-body p-0">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="my-auto">
                                                            <a href="{{url('developer/'.$developer->slug)}}" class="text-decoration-none">
                                                                <h5 class="text-primary fw-semibold mb-0">{{$developer->name}}
                                                                </h5>
                                                            </a>
                                                        </div>
                                                        <div class="my-auto">
                                                            <div class="">
                                                                <img src="{{ $developer->logo }}"
                                                                    alt="{{$developer->name}}" class="img-fluid mb-2" width="80px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fs-14">
                                                            {!! $developer->short_description !!}
                                                        </div>
                                                    </div>
                                                    @if(count($developer->communityDevelopers) > 0)
                                                    <div class="mb-3">
                                                        <p class="text-primary fw-semibold mb-1">Top Communities
                                                        </p>
                                                        <div class="propTagDiv">
                                                            @foreach ($developer->communityDevelopers as $com)
                                                            <div class="propTag">
                                                                <a href="{{url('community/'.$com->slug)}}"  class="text-primary text-decoration-none border rounded-1 py-1 px-3 fs-12 my-auto me-2">
                                                                    {{$com->name}}
                                                                </a>
                                                            </div>  
                                                            @endforeach

                                                            <div class="propTag">
                                                                <a href="{{url('communities?developer='.$developer->id)}}"  class="text-white bg-primary text-decoration-none rounded-1 py-1 px-3 fs-12 my-auto me-2">
                                                                    View More
                                                                </a>
                                                            </div>
                                    
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if(count($developer->projects) > 0)
                                                    <div>
                                                        <p class="text-primary fw-semibold mb-1">New Launches
                                                        </p>
                                                        <div class="propTagDiv">
                                                            @foreach ($developer->projects as $proj)
                                                            <div class="propTag">
                                                                <a href="{{url('dubai-offplan/'.$proj->slug)}}"  class="text-primary text-decoration-none border rounded-1 py-1 px-3 fs-12 my-auto me-2">
                                                                    {{$proj->title}}
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            <div class="propTag">
                                                                <a href="{{url('dubai-offplans?developer='.$developer->id)}}"  class="text-white bg-primary text-decoration-none rounded-1 py-1 px-3 fs-12 my-auto me-2">
                                                                    View More
                                                                </a>
                                                            </div>
                                    
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6 col-md-6 my-auto">
                                                        <div class="d-flex justify-content-start py-1">
                                                            <div class="my-auto me-3">
                                                                <center>
                                                                    <img src="{{ asset('frontend/assets/images/icons/counter4.png') }}"
                                                                        alt="Unique Properties Logo "
                                                                        class="img-fluid rounded-circle border" width="40px">
                                                                </center>
                                                            </div>
                                                            <div class="text-primary my-auto">
                                                                <p class="fw-semibold fs-14 mb-0">{{$developer->name}} Awards Recieved
                                                                </p>
                                                                <p class="fs-12 mb-0">{{count($developer->awards)}} {{count($developer->awards) > 1 ? ' Awards' : ' Award'}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-md-6 my-auto">
                                                        <ul class="list-unstyled  mb-0  py-1 float-start float-md-end float-lg-end">
                                                            <li class="d-inline propOpt">
                                                                <a href="{{ $whatsapp ? $whatsapp : ''}}" class="text-decoration-none btn fs-14 btn-success rounded-1 px-3"
                                                                    target="_blank">
                                                                    <i class="bi bi-whatsapp "></i>
                                                                </a>
                                                            </li>
                                                            <li class="d-inline propOpt">
                                                                <a href="tel:{{ $telephone_number ? $telephone_number : '+97144558888'}}" class="text-decoration-none btn fs-14 btn-primary rounded-1 px-3"
                                                                    target="_blank">
                                                                        <i class="bi bi-telephone"></i>
                                                                </a>
                                                            </li>
                                                            <li class="d-inline propOpt">
                                                                <a href="{{url('developer/'.$developer->slug)}}" 
                                                                class="btn  text-decoration-none fs-14 btn-primary rounded-1 px-3">Learn More</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 col-lg-12">
                            <div class="text-center viewMoreBtnWrapper">
                                <button class="btn btn-primary rounded-pill viewMoreBtn px-3" type="button">Show More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Content --}}
@if(count($contents) > 0)
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    @foreach ($contents as $key => $content)
                        @if(($key + 1) % 2 == 0)
                        <div class="row colRev">
                            <div class="col-12 col-lg-4 col-md-4 blogImge rounded-3" style="background-image: url('{{$content->image ? $content->image : '' }}')">
        
                            </div>
                            <div class="col-12 col-lg-8 col-md-8 my-auto">
                                <div class="mb-3">
                                    <div class="my-auto">
                                        <h5 class="mb-0 text-primary">{{$content->title}}</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="propDesc">
                                        {!! $content->description !!}
                                    </div>
    
                                </div>
                            </div>
    
                        </div>
                        @else
                        <div class="row  mb-5">
                            <div class="col-12 col-lg-8 col-md-8 my-auto">
                                <div class="mb-3">
                                    <div class="my-auto">
                                        <h5 class="mb-0 text-primary">{{$content->title}}</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="propDesc">
                                        {!! $content->description !!}
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-md-4 blogImge rounded-3" style="background-image: url('{{$content->image ? $content->image : '' }}')">
        
                            </div>
                        </div>
                        @endif
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </section>
@endif
    <script>
        $(document).ready(function() {
            var x, size_li;

            function changeLoadCount(media) {
                if (media.matches) {
                    x = 4; // no. of items per click mobile <= 767
                    $(".agentProperty").hide();
                    $(".agentProperty:lt(" + x + ")").show();
                    size_li = $(".agentProperty").length;
                    if (x => size_li) {
                        $(".viewMoreBtnWrapper").hide();
                    } else {
                        $(".viewMoreBtnWrapper").show();
                    }
                } else {
                    x = 8; // no. of items per click in desktop >= 768
                    $(".agentProperty").hide();
                    $(".agentProperty:lt(" + x + ")").show();
                    size_li = $(".agentProperty").length;
                    //   alert(size_li);
                    if (x == size_li || x > size_li) {
                        $(".viewMoreBtnWrapper").hide();
                    } else {
                        $(".viewMoreBtnWrapper").show();
                    }
                }
            }

            var media = window.matchMedia("(max-width: 767px)");
            changeLoadCount(media);
            media.addListener(changeLoadCount);
            window.addEventListener("load resize", function() {
                changeLoadCount(media);
                media.addListener(changeLoadCount);
            });

            function loadMore() {
                $(".agentProperty").hide();
                size_li = $(".agentProperty").length;
                $(".agentProperty:lt(" + x + ")").show();
                $(".viewMoreBtn").click(function() {
                    if (media.matches) {
                        x = x + 4 <= size_li ? x + 4 : size_li;
                    } else {
                        x = x + x <= size_li ? x + x : size_li;
                    }
                    $(".agentProperty:lt(" + x + ")").show();
                    if (x == size_li) {
                        $(".viewMoreBtnWrapper").hide();
                    } else {
                        $(".viewMoreBtnWrapper").show();
                    }
                });
            }
            loadMore();
        });
    </script>
@endsection
