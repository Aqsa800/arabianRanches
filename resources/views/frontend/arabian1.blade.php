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
@section('headerId', 'arabianRanches1Header')
@section('header')
    <div class="headerContent">
        <h2 class="headerTitle text-uppercase">Arabian Ranches I</h2>
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
                            Arabian Ranches I, where the allure of the Arabian Desert meets the sophistication of modern living.<br>
                            Imagine waking up to a breathtaking panorama of sun-kissed sands that stretch as far as the eye can see. Arabian Ranches I offers an awe-inspiring landscape, where the golden hues of the desert meld seamlessly with carefully designed homes and lush greenery.
                        </p>
                        <p class="pText smText text-justify">
                            Strolling through this remarkable oasis, you'll find yourself enchanted by the winding pathways adorned with vibrant flora. As you wander, the gentle breeze whispers soothingly, transporting you to a state of tranquility.<br>
                            Yet, it's not just the landscape that makes Arabian Ranches I exceptional; it's the embodiment of luxury and exclusivity. Enclosed within a secure gated community, residents enjoy a sense of privacy and safety, fostering an environment where families can flourish and create cherished memories.

                        </p>
                        <p class="pText smText text-justify">
                            Step inside the homes of Arabian Ranches I, and you'll be captivated by the exquisite architecture and meticulous attention to detail. Each residence boasts a blend of traditional Arabian design elements and contemporary finishes, creating an ambiance that is both timeless and sophisticated. From cozy villas to spacious townhouses, every property exudes an aura of elegance, providing the perfect backdrop for your dreams to unfold.
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
