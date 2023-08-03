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
@section('header')
    <div class="headerContent">
        <h2 class="headerTitle text-uppercase">Arabian Ranches <span>|</span></h2>
    </div>
@endsection
@section('header_extra')
@endsection
@section('content')
    <section class="gallerySection">
        <div class="container">

            <div class="section-padding">
                <div class="screenshot_slider owl-carousel">
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-1.jpg') }}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-2.jpg') }}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-3.jpg') }}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-6.webp') }}" alt="" title="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend/assets/images/card-img-5.jpg') }}" alt="" title="">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="formSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="formContentBox singleProperty">
                        <h3>VILLA FOR SALE IN LILA, ARABIAN RANCHES 2</h3>
                        <div class="propertyInfoBar">
                            <div class="infoItem">
                                <img src="{{ asset('frontend/assets/images/icons/bed-icon.png') }}" class="proInfoIcon">
                                <p class="proInfoText">4</p>
                            </div>
                            <div class="infoItem">
                                <img src="{{ asset('frontend/assets/images/icons/bath-icon.png') }}" class="proInfoIcon">
                                <p class="proInfoText">5</p>
                            </div>
                            <div class="infoItem">
                                <img src="{{ asset('frontend/assets/images/icons/area-icon.png') }}" class="proInfoIcon">
                                <p class="proInfoText">3000SQFT</p>
                            </div>
                        </div>
                        <h5 class="smTitle">Amenities</h5>
                        <p class="mb-4">Balcony | Built in Wardrobes | Central A/C | Covered Parking </p>
                        <h5 class="smTitle mb-3">Discription</h5>
                        <p>
                            Foreign nationals have many options to become homeowners in Arabian Ranches, a suburban area of
                            Dubai, UAE. Arabian Ranches I, II, and III are three different settlements that make up the
                            area.
                        </p>
                        <span class="mb-3">Property Reference : CL-R-6673</span>
                        <p class="mb-3">
                            The warehouses destial are as follow:
                        </p>
                        <a href="#" class="fillBtn minWdLg  minWdMd capitalText">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="formCard">
                        <div class="formCardHead">
                            <h4>Talk With Our Agents</h4>

                        </div>
                        <form class="formArea">
                            <div class="inputFieldBar">
                                <label>Name</label>
                                <input type="" name="">
                            </div>
                            <div class="inputFieldBar">
                                <label>Email</label>
                                <input type="" name="">
                            </div>
                            <div class="inputFieldBar mb-4">
                                <label>Phone</label>
                                <input type="text" id="mobile_code" name="name">
                            </div>
                            <button class="btn btn-primary btn-lg btn-block subMitBtn">Submite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
