@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Awards | '.$name)
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
                                <h1 class="text-white">Awards</h1>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Awards</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Awards --}}
    <section class="my-5 p-relative">
        <div class="container p-relative">
            <div class="row g-3 justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">

                    <div>
                        <div class="pagination">
                            <li class="border px-2 py-1 m-1 rounded-2"><a class="list-group-item list-group-item-action text-center" href="{{url('awards')}}">All Awards ({{count($awardCOunt)}})</a></li>
                            @foreach ($developers as $developer)
                            @if($developer->awards_count> 0)
                                <li class="border px-2 py-1 m-1 rounded-2"><a class="list-group-item list-group-item-action " href="{{url('awards/'.$developer->slug)}}">{{ $developer->name  }} ({{$developer->awards_count}})</a></li>
                                @endif
                            @endforeach
                          </div>
                    </div>
                </div>
                <div class="col-3 col-lg-3 col-md-3">

                    <div>
                        <div id="list-example" class="list-group awardYears">
                            @foreach ($awards as $key => $item)
                            <a class="list-group-item list-group-item-action dot" href="#list-item-{{ $key }}"><span>{{ $key }}</span></a>
                            @endforeach
                          </div>
                    </div>
                </div>
                <div class="col-9 col-lg-9 col-md-9">
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                    @foreach ($awards as $key => $item)

                        <div class="content-section" id="list-item-{{ $key }}">
                           @foreach ($item as $award)
                           @if($award->developer)
                               <div class="py-2">
                                <div class="border p-3 p-lg-3 p-md-2 rounded-3">
                                    <div class="row g-0">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="">

                                                <div class="">
                                                    <img src="{{ $award->developer->logo }}"
                                                        alt="{{ $award->developer->name }}" class="img-fluid mb-2" width="90px">
                                                </div>


                                                <h5 class="text-primary">{{ $award->title }}</h5>
                                                <p class="">{{ $award->position ? $award->position : '' }}</p>
                                                <div class="d-flex justify-content-between">
                                                <div class="awardLogo">
                                                     <img
                                                        src="{{ $award->trophy }}"
                                                        alt="{{ $award->title }}"
                                                        class="img-fluid bg-lightBlue border imgAwardTrophy rounded-3 p-2">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 my-auto">
                                            <div class="swiper swiperAwards  ">
                                                <div class="swiper-wrapper">
                                                    @foreach ($award->gallery as $img)

                                                    <div class="swiper-slide">
                                                        <div class="text-center">
                                                            <center><a href="{{ $img['path'] }}" data-toggle="lightbox" data-gallery="feature-gallery"
                                                                class="text-decoration-none"><img
                                                                    src="{{ $img['path']}}"
                                                                    alt="{{ $award->title }}" class="img-fluid awardImg"></a></center>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="swiper-button-prev">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                        <i class="bi bi-chevron-left text-primary fs-12 fa-stack-1x"></i>
                                                    </span>
                                                </div>
                                                <div class="swiper-button-next me-2">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-circle fa-stack-2x text-white"></i>
                                                        <i class="bi bi-chevron-right text-primary fs-12 fa-stack-1x"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </div>
                            @endif
                           @endforeach
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

<script>
    var distance = $('.awardYears').offset().top;
    var bottom_of_element = distance + $(".awardYears").outerHeight();
$(window).scroll(function() {
    // alert($(window).height());
    if ($(this).scrollTop()>= distance  &&
$(this).scrollTop() < $('.footerDiv').offset().top-200)
     {
       $('.awardYears').css('position','fixed');
       $('.awardYears').css('top','60px');
     }
    else
     {
        $('.awardYears').css('position','relative');
        $('.awardYears').css('top','0px');
     }
 });

</script>
@endsection
