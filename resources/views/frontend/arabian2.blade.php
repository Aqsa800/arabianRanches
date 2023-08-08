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
@section('header')
    <header class="header overlayClr"  id="arabianRanches2Header">
        <div class="container">
            @include('frontend.layout.nav')
            <div class="headerContent">
                <h2 class="headerTitle text-uppercase">Arabian Ranches II</h2>
                <a href="#" class="fillBtn minWdLg  centerAuto mb-5">DOWNLOAD BROCHURE</a>
                <div class="counterRow d-flex justify-center">
                    <div class="countBox">
                            <h5 class="countTitle">1,902</h5>
                            <p class="CountText">Homes</p>
                    </div>
                    <div class="countBox">
                            <h5 class="countTitle">91</h5>
                            <p class="CountText">Nationalities</p>
                    </div>
                    <div class="countBox">
                            <h5 class="countTitle">6,000</h5>
                            <p class="CountText">Residents</p>
                    </div>
                    <div class="countBox">
                            <h5 class="countTitle">6,200.000</h5>
                            <p class="CountText">Sq.Ft. Total Area</p>
                    </div>
           </div>
            </div>
        </div>
    </header>
@endsection
@section('header_extra')
@endsection
@section('content')
<section class="section pad-60-auto sectionMarBtm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="secContentBox text-center ">
                    <p class="pText smText text-justify">
                        Arabian Ranches II is a timeless and family-centric neighborhood that has been thriving since its launch in 2013. Embracing a modern lifestyle with a focus on outdoor leisure, this community offers a contemporary interpretation of the serene desert landscape. The residential areas are inspired by Spanish, Moroccan, and Arabian architecture, creating a unique and charming ambiance.
                    </p>
                    <p class="pText smText text-justify">
                        Explore the picturesque pathways and parks adorned with natural greenery as you walk through the neighborhood's inviting trails. At Arabian Ranches II, you will find an unparalleled range of entertainment options right at your doorstep, including restaurants, cafes, football, basketball, and tennis courts, swimming pools, barbecue stations, children's play areas, cycling tracks, outdoor gymnasiums, and retail centers.
                    </p>
                    <p class="pText smText text-justify">
                        In addition to these amenities, Arabian Ranches II benefits from its close proximity to the Arabian Ranches Golf Club, Dubai Polo & Equestrian Club, and Global Village, offering even more leisure choices for residents. At the heart of Arabian Ranches II lies a strong sense of community, fueled by vibrant events and celebrations that bring people together, transcending cultural boundaries. Here, "home" extends far beyond your four walls, creating a thriving microcosm that embraces togetherness.
                    </p>
                    <a href="#" id="enquire" class="fillBtn minWdLg centerAuto minWdMd capitalText btnEnquire">For more Enquires</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="gallerySection">
        <div class="container">
            <h2 class="secTitle text-center">GALLERY</h2>
            <div class="section-padding">
                <div class="screenshot_slider owl-carousel">
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-1.jpg')}}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-2.jpg')}}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-3.jpg')}}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-6.webp')}}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-5.jpg')}}" alt="" title="">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="sectDarkPrimery pd-Y-60">
        <div class="container">
            <h2 class="secTitle text-center title-3 capitalText">Amenities</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="iconTextBox">
                        <img src="{{ asset('frontend/assets/images/icons/central-park-2.png')}}" class="iconImg">
                        <p>Central Park</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iconTextBox">
                        <img src="{{ asset('frontend/assets/images/icons/bar-2.png')}}" class="iconImg">
                        <p>Clubhouse</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iconTextBox">
                        <img src="{{ asset('frontend/assets/images/icons/fitness-2.png')}}" class="iconImg">
                        <p>Fully Equipped Gym</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iconTextBox">
                        <img src="{{ asset('frontend/assets/images/icons/sports-2.png')}}" class="iconImg">
                        <p>Multipurpose Hall</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iconTextBox">
                        <img src="{{ asset('frontend/assets/images/icons/sports-hall-2.png')}}" class="iconImg">
                        <p>Sports Facility</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iconTextBox">
                        <img src="{{ asset('frontend/assets/images/icons/gate-2.png')}}" class="iconImg">
                        <p>Gated Community</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
