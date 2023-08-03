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
                wander. Release your inner child and just be incredibly, unabasehasdly, happy. Welcome to ARABIAN
                RANCHES
            </p>
        </div>
        <a href="{{ asset('frontend/assets/images/arabianRanches.mp4') }}" class="youtube videoLink">
            <img src="{{ asset('frontend/assets/images/video-thumnail-img-1.jpg') }}">
        </a>
        <a href="#" class="fillBtn minWdLg positionBtmC btnEnquire">For more Enquires</a>
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
                            Discover one of Dubai's most established and beloved communities, Arabian Ranches. Nestled opposite Dubai Studio City on Al Qudra Road, this upscale gated community spans over 1,650 acres of leafy landscapes. Its serene out-of-city location offers a sense of privacy and tranquility, earning it the affectionate nickname of 'The Ranches.' With a variety of traditional-style properties in different shapes and sizes, Arabian Ranches boasts an impressive pool-per-villa ratio. The community is also home to the renowned Dubai Equestrian & Polo Club and the Arabian Ranches Golf Club, both of which are vibrant hubs for sports and social activities. Whether you're an equestrian enthusiast or a golf aficionado, these world-class facilities cater to your passions.
                        </p>
                        <a href="#" class="fillBtn minWdLg btnEnquire">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ asset('frontend/assets/images/arabianRanches.mp4') }}" class="youtube secVideo">
                        <img src="{{ asset('frontend/assets/images/light1.webp') }}" alt="arabianRanches">
                    </a>
                </div>
            </div>
            <div class="row align-items-center pd-Y-60">

                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/light2.webp') }}" alt="arabianRanches" class="secClmImg">
                </div>
                <div class="col-md-6">
                    <div class="secContentBox pd-l-50">
                        <h2 class="secTitle">Where Exclusivity Meets Green, Spacious, and Secure Living</h2>
                        <p class="pText text-justify">
                            These five words encapsulate the essence of Arabian Ranches, portraying a community that offers exclusivity, ample green spaces, spacious residences, enhanced security, and a wide array of sports and recreational activities.
                        </p>
                        <a href="#" class="fillBtn minWdLg btnEnquire">For more Enquires</a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pd-Y-60">
                <div class="col-md-6">
                    <div class="secContentBox pd-r-50">
                        <h2 class="secTitle">A Fusion of Arabian and Mediterranean Elegance
                            Exquisite Townhouses and Villas in Arabian Ranches
                             </h2>
                        <p class="pText text-justify">
                            Arabian Ranches is an exclusive community comprising solely townhouses and villas. With over 4,000 properties, each residence embraces an Arabian and Mediterranean-inspired design aesthetic. From cozy two-bedroom townhouses to luxurious six-bedroom Golf and Polo Homes, Arabian Ranches offers a variety of styles and layouts to suit different preferences. Some homes are conveniently situated next to parks, while others boast private swimming pools. Residents in sub-areas such as Saheel, Savannah, Hattan, and Mirador are fortunate to enjoy scenic views over the fairways.
                        </p>
                        <a href="#" class="fillBtn minWdLg btnEnquire">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/light3.webp') }}" alt="arabianRanches" class="secClmImg">
                </div>
            </div>
        </div>
    </section>
    <section class="sectDarkPrimery pd-Y-60">
        <div class="container">
            <div class="row align-items-center pd-Y-60">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/dark1.webp') }}" alt="arabianRanches" class="secClmImg">
                </div>
                <div class="col-md-6">
                    <div class="secContentBox pd-l-50">
                        <h2 class="secTitle text-white">Embrace an Active Lifestyle & Wellness Retreat at Arabian Ranches</h2>
                        <p class="pText text-white text-justify">
                            At Arabian Ranches, you can embrace an active lifestyle and enjoy the community's outstanding amenities. The specially built 150km Dubai Cycle Track is a haven for those seeking serene rides through the desert. For equestrians, the Polo Club offers opportunities for polo, riding lessons, show jumping lessons and invigorating exercise classes. Indulge in relaxation and pampering at the rejuvenating spa, where a range of treatments awaits, including the not-to-be-missed Balinese Massage. Meanwhile, the Arabian Ranches Golf Club presents a pristine 18-hole course, catering to beginners and seasoned players alike, ensuring golf enthusiasts can perfect their game.

                        </p>
                        <a href="#" class="darkfillBtn minWdLg btnEnquire">For more Enquires</a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pd-Y-60">


                <div class="col-md-6">
                    <div class="secContentBox pd-l-50">
                        <h2 class="secTitle text-white">Nurture Your Child's Potential with Premier Schools and Nurseries in Arabian Ranches</h2>
                        <p class="pText text-white text-justify">
                            Arabian Ranches is a preferred choice for families due to its proximity to high-quality nurseries and schools. The community offers a range of educational options, including The Ranches Nursery and Primary School, Raffles Nursery, and JESS (Jumeirah English Speaking School) for both primary and secondary education. Additionally, Raffles International School, Gems World Academy, American School of Dubai, and the new Kings School in Al Barsha are easily accessible by car or school bus.

                        </p>
                        <a href="#" class="darkfillBtn minWdLg btnEnquire">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/dark2.webp') }}" alt="arabianRanches" class="secClmImg">
                </div>
            </div>
        </div>
    </section>
    <section class="section pd-Y-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="secContentBox pd-r-50">
                        <h2 class="secTitle">Indulge in Culinary Delights and Retail Therapy at Arabian Ranches</h2>
                        <p class="pText text-justify">
                            Socializing and satisfying your culinary cravings are effortless at Arabian Ranches. The Dubai Equestrian & Polo Club and Arabian Ranches Golf Club feature stylish bars and restaurants, providing ideal settings for gathering with friends. Additionally, the heart of the community is home to the Arabian Ranches Community Centre, a vibrant hub offering approximately 20 retail outlets, a Geant supermarket, a pharmacy, a pet shop, a travel agent, a beauty salon, and a range of top-notch eateries, including Maison Mathis and The Hamptons Cafe.
                        </p>
                        <a href="#" class="fillBtn minWdLg btnEnquire">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">

                    <img src="{{ asset('frontend/assets/images/light4.webp') }}" alt="arabianRanches" class="secClmImg">

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
    <section class="secLight">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="NewsBox">
                        <img src="{{ asset('frontend/assets/images/icons/subcribe_mail.webp') }}" alt="email">
                        <div class="newsContent">
                            <h5>Sign Up For Our Newsletter.</h5>
                            <p>Enter your email and get new updates & news.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputBar">
                        <form method="post" action="{{ route('subscribeForm') }}" id="subscribeForm">
                            @csrf
                            <input type="hidden" name="formName" value="subscribeForm">
                            <input type="email" name="email" class="fillInput" placeholder="Enter Your Email Address....">
                        </form>
                        <button id="" class="mailIcon subscribeFormButton" style="background: none; border:none">
                            <img src="{{ asset('frontend/assets/images/icons/mail.webp') }}" alt="email" >
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>
@endsection
