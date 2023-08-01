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
    <div class="headerContentBox">
        <div>
            <h2 class="text-uppercase">discover Arabian Ranches </h2>
            <p>
                Wake up to a new days and lives in a moments. Nurture your creative and let your imagination
                wander. Release your inner child and just be incredibly, unabasehasdly, happy.Welcome to ARABIAN
                RANCHES
            </p>
        </div>
        <a href="{{ asset('frontend/assets/images/2f-properties-video.mp4') }}" class="youtube videoLink">
            <img src="{{ asset('frontend/assets/images/video-thumnail-img-1.jpg') }}">
        </a>
        <a href="#" class="fillBtn minWdLg positionBtmC">For more Enquires</a>
    </div>
@endsection
@section('header_extra')
<section class="sectionDark secMxHt">
    <div class="container">
        <div class="row">
        </div>
    </div>
</section>
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="secContentBox pd-r-50">
                        <h2 class="secTitle">About Arabian Ranches</h2>
                        <p class="pText text-justify">
                            Discover one of Dubai's most established and beloved communities, Arabian Ranches. Nestled
                            opposite Dubai Studio City on Al Qudra Road, this upscale gated community spans over 1,650 acres
                            of leafy landscapes. Its serene out-of-city location offers a sense of privacy and tranquility,
                            earning it the affectionate nickname of 'The Ranches.' With a variety of traditional-style
                            properties in different shapes and sizes, Arabian Ranches boasts an impressive pool-per-villa
                            ratio. The community is also home to
                        </p>
                        <a href="#" class="fillBtn minWdLg ">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ asset('frontend/assets/images/2f-properties-video.mp4') }}" class="youtube secVideo">
                        <img src="{{ asset('frontend/assets/images/video-thumnail-img-2.jpg') }}">
                    </a>
                </div>
            </div>
            <div class="row align-items-center pd-Y-60">

                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/card-img-1.jpg') }}" class="secClmImg">
                </div>
                <div class="col-md-6">
                    <div class="secContentBox pd-l-50">
                        <h2 class="secTitle">Where Exclusivity Meets Green,
                            Spacious, and Secure Living</h2>
                        <p class="pText text-justify">
                            These five words encapsulate the essence of Arabian Ranches, portraying a community that offers
                            exclusivity, ample green spaces, spacious residences, enhanced security, and a wide array of
                            sports and recreational activities.
                        </p>
                        <a href="#" class="fillBtn minWdLg ">For more Enquires</a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pd-Y-60">
                <div class="col-md-6">
                    <div class="secContentBox pd-r-50">
                        <h2 class="secTitle">An Exclusive Suburban Oasis for
                            Expat Families & Professionals </h2>
                        <p class="pText text-justify">
                            Arabian Ranches is a community that primarily attracts professional expat couples and families.
                            The exclusive ambiance and secluded location contribute to an atmosphere of exclusivity and
                            privacy. However, it's also a place where neighbors come together for barbecues, and children
                            enjoy playing together. The lush green landscaping provides numerous tranquil picnic spots,
                            making it a dog-friendly neighborhood. In essence, Arabian Ranches is a suburban oasis where
                            residents can find the perfect blend of luxury and comfort.
                        </p>
                        <a href="#" class="fillBtn minWdLg ">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ asset('frontend/assets/images/2f-properties-video.mp4') }}" class="youtube secVideo">
                        <img src="{{ asset('frontend/assets/images/video-thumnail-img-2.jpg') }}">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="sectDarkPrimery pd-Y-60">
        <div class="container">
            <div class="row align-items-center pd-Y-60">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/card-img-1.jpg') }}" class="secClmImg">
                </div>
                <div class="col-md-6">
                    <div class="secContentBox pd-l-50">
                        <h2 class="secTitle text-white">Indulge in Culinary Delights and
                            Retai I Therapy at Arabian Ranches</h2>
                        <p class="pText text-white text-justify">
                            These five words encapsulate the essence of Arabian Ranches, portraying a community that offers
                            exclusivity, ample green spaces, spacious residences, enhanced security, and a wide array of
                            sports and recreational activities.
                        </p>
                        <a href="#" class="darkfillBtn minWdLg ">For more Enquires</a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pd-Y-60">


                <div class="col-md-6">
                    <div class="secContentBox pd-l-50">
                        <h2 class="secTitle text-white">Indulge in Culinary Delights and
                            RetaiI Therapy at Arabian Ranches</h2>
                        <p class="pText text-white text-justify">
                            Socializing and satisfying your culinary cravings are effortless at Arabian Ranches. The Dubai
                            Equestrian & Polo Club and Arabian Ranches Golf Club feature stylish bars and restaurants,
                            providing ideal settings for gathering with friends. Additionally, the heart of the community is
                            home to the Arabian Ranches Community Centre, a vibrant hub offering approximately 20 retail
                            outlets, a Geant supermarket, a pharmacy, a pet shop, a travel agent, a beauty salon, and a
                            range of top-notch eateries, including
                        </p>
                        <a href="#" class="darkfillBtn minWdLg ">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/card-img-1.jpg') }}" class="secClmImg">
                </div>
            </div>
        </div>
    </section>
    <section class="section pd-Y-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="secContentBox pd-r-50">
                        <h2 class="secTitle">Indulge in Culinary Delights and
                            RetaiI Therapy at Arabian Ranches</h2>
                        <p class="pText text-justify">
                            Socializing and satisfying your culinary cravings are effortless at Arabian Ranches. The Dubai
                            Equestrian & Polo Club and Arabian Ranches Golf Club feature stylish bars and restaurants,
                            providing ideal settings for gathering with friends. Additionally, the heart of the community is
                            home to the Arabian Ranches Community Centre, a vibrant hub offering approximately 20 retail
                            outlets, a Geant supermarket, a pharmacy, a pet shop, a travel agent, a beauty salon, and a
                            range of top-notch eateries, including
                        </p>
                        <a href="#" class="fillBtn minWdLg ">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ asset('frontend/assets/images/2f-properties-video.mp4') }}" class="youtube secVideo">
                        <img src="{{ asset('frontend/assets/images/video-thumnail-img-2.jpg') }}">
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="sectDarkPrimery pd-Y-60">
    <div class="container">
        <h2 class="secTitle text-center title-3">Amenities</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="iconTextBox">
                    <img src="{{ asset('frontend/assets/images/icons/central-park-2.png') }}" class="iconImg">
                    <p>Central Park</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iconTextBox">
                    <img src="{{ asset('frontend/assets/images/icons/bar-2.png') }}" class="iconImg">
                    <p>Clubhouse</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iconTextBox">
                    <img src="{{ asset('frontend/assets/images/icons/fitness-2.png') }}" class="iconImg">
                    <p>Fully Equipped Gym</p>
                </div>
            </div>



            <div class="col-md-4">
                <div class="iconTextBox">
                    <img src="{{ asset('frontend/assets/images/icons/sports-2.png') }}" class="iconImg">
                    <p>Multipurpose Hall</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iconTextBox">
                    <img src="{{ asset('frontend/assets/images/icons/sports-hall-2.png') }}" class="iconImg">
                    <p>Sports Facility</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iconTextBox">
                    <img src="{{ asset('frontend/assets/images/icons/gate-2.png') }}" class="iconImg">
                    <p>Gated Community</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    @if (count($testimonials) > 0)
        <section class="pd-Y-60">
            <div class="container">
                <h2 class="secTitle text-center ">Client Review</h2>
                <div id="testiCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#testiCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#testiCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#testiCarousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($testimonials as $value)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="testiSliderCOntent">
                                            <h3 class="tSldrTitle">Seamless experience</h3>
                                            <p class="tSldrText">Foreign nationals have many options to become homeowners
                                                in
                                                Arabian Ranches, a suburban area of Dubai, UAE. Arabian Ranches I, II, and
                                                III
                                                are three different settlements that make up the area. Family-friendly
                                                villas
                                                and townhouses are available in the community, making it ideal for them.
                                                Both
                                                locals and tourists are drawn to the area because of the peaceful lifestyle
                                                and
                                                close proximity to the city center.</p>
                                            <div class="ratingBar">
                                                <img src="{{ asset('frontend/assets/images/icons/start-icon.png') }}">
                                                <img src="{{ asset('frontend/assets/images/icons/start-icon.png') }}">
                                                <img src="{{ asset('frontend/assets/images/icons/start-icon.png') }}">
                                                <img src="{{ asset('frontend/assets/images/icons/start-icon.png') }}">
                                                <img src="{{ asset('frontend/assets/images/icons/start-icon.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="testiSliderImgBox">
                                            <img src="{{ asset('frontend/assets/images/user-img-2.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testiCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testiCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
    @endif
@endsection
