@extends('frontend.layout.master')
@if ($property)
    @section('title', $property->meta_title)
    @section('pageDescription', $property->meta_description)
    @section('pageKeyword', $property->meta_keywords)
@else
    @section('title', 'Home | ' . $name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif


@section('header')
    <header class="header overlayClr"  id="" style="background-image: url({{ $property->cover_img }})">
        <div class="container">
            @include('frontend.layout.nav')
            <div class="headerContent">
                <h2 class="headerTitle text-uppercase">{{ $property->name }}</h2>
            </div>
        </div>
    </header>
@endsection

@section('header_extra')
@endsection
@section('content')


    @if (count($property->imagegalleries) > 0)
        <section class="gallerySection">
            <div class="container">

                <div class="section-padding">
                    <div class="screenshot_slider owl-carousel">
                        @foreach ($property->imagegalleries->where('category', 'gallery') as $galler)
                            <div class="item">

                                <a href="{{ asset($galler->image) }}" data-toggle="lightbox"
                                    data-gallery="example-gallery"> <img
                                        src="{{ asset($galler->image) }}" alt=""
                                        class="img-fluid"></a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="formSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="formContentBox singleProperty">
                        <h3>{{ $property->sub_title }}</h3>
                        <div class="propertyInfoBar">
                            @if ($property->bedrooms)
                                <div class="infoItem">
                                    <img src="{{ asset('frontend/assets/images/icons/bed-icon.webp') }}" alt="bed"
                                        class="proInfoIcon">
                                    <p class="proInfoText">{{ $property->bedrooms }}</p>
                                </div>
                            @endif
                            @if ($property->bathrooms)
                                <div class="infoItem">
                                    <img src="{{ asset('frontend/assets/images/icons/bath-icon.webp') }}" alt="bath"
                                        class="proInfoIcon">
                                    <p class="proInfoText">{{ $property->bathrooms }}</p>
                                </div>
                            @endif

                            @if ($property->built_area > 0)
                                <div class="infoItem">
                                    <img src="{{ asset('frontend/assets/images/icons/area-icon.webp') }}" alt="area"
                                        class="proInfoIcon">
                                    <p class="proInfoText"> {{ $property->unit_measure != '' ? $property->unit_measure : 'Sq. Ft.' }}
                                        {{ $property->built_area > 0 ? ' : ' . $property->built_area : '' }}</p>
                                </div>
                            @endif
                        </div>
                        <h5 class="smTitle">Amenities</h5>
                        <p class="mb-4"> {{ $property->amenities ? $property->amenities->implode('name', '  |  ') : '' }} </p>
                        <h5 class="smTitle mb-3">Discription</h5>
                        {!! $property->description !!}
                        @if($property->reference_number)
                        <span class="mb-3">Property Reference : {{ $property->reference_number }}</span>
                        @endif
                        <p class="mb-3">
                            The warehouses destial are as follow:
                        </p>
                        <a href="#" class="fillBtn minWdLg  minWdMd capitalText btnEnquire">For more Enquires</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="formCard">
                        <div class="formCardHead">
                            <h4>Talk With Our Agents</h4>
                        </div>
                        <form class="formArea" method="POST" id="contactusForm" action="{{ url('contactForm') }}">
                            <div class="inputFieldBar">
                                <label>Name</label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="inputFieldBar">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="inputFieldBar">
                                <label>Phone</label>
                                <input class="fullNumber" id="fullNumber" type="hidden" name="fullNumber">
                                <input type="text" onkeyup="numbersOnly(this)" id="telephone" name="phone" required>
                            </div>
                            <div class="inputFieldBar">
                                <label>Message</label>
                                <textarea name="message" rows="5"></textarea>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block subMitBtn contactusFormButton">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
