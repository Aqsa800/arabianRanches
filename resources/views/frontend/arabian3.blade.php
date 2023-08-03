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
@section('headerClass', '')
@section('headerId', 'arabianRanches3Header')
@section('header')
    <div class="headerContent">
        <h2 class="headerTitle text-uppercase">Arabian Ranches III</h2>
        <a href="#" class="fillBtn minWdLg  centerAuto mb-5">DOWNLOAD BROCHURE</a>
    </div>
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
                        Embrace the new day with joy and live in the moment at Arabian Ranches III. Our community encourages you to nurture your creativity and let your imagination roam free. Rediscover the magic of life by releasing your inner child and experiencing pure, unfiltered happiness.
                    </p>
                    <p class="pText smText text-justify">
                        A place where dreams take flight, where every day is a canvas for your aspirations. Arabian Ranches III invites you to explore a world of endless possibilities, where vibrant neighborhoods and lush landscapes provide the perfect backdrop for a life well-lived.

                    </p>
                    <p class="pText smText text-justify">
                        Unleash your potential and discover a community designed to inspire and uplift. With a focus on modern living, Arabian Ranches III offers a harmonious blend of contemporary comforts and the timeless charm of the Arabian Desert. Step into a haven of tranquility, where the pace of life slows down, allowing you to savor every moment. Unwind along winding pathways surrounded by nature's beauty, and let the stresses of the outside world fade away.

                    </p>
                    <p class="pText smText text-justify">
                        Whether it's bonding with family and friends in secure surroundings or engaging in a host of recreational activities, Arabian Ranches III provides the ideal setting to create lasting memories and forge meaningful connections.

                    </p>
                    <p class="pText smText text-justify">
                        We invite you to be a part of Arabian Ranches III, a place where happiness thrives, creativity flourishes, and the joy of living knows no bounds. Embrace a life of fulfillment and seize each day with a sense of wonder. Welcome home to Arabian Ranches III, where a world of inspiration and happiness awaits.
                    </p>
                    <a href="#" class="fillBtn minWdLg centerAuto minWdMd capitalText btnEnquire" id="enquire">For more Enquires</a>
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
