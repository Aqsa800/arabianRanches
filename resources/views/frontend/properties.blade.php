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
    <header class="header overlayClr tabHtAuto">
        <div class="container">
            @include('frontend.layout.nav')
            <div class="headerContent">
                <h2 class="headerTitle">Arabian Ranches </h2>
                <a href="#" class="fillBtn minWdLg centerAuto mb-5">DOWNLOAD BROCHURE</a>
                <div class="headFormArea">
                    <form method="get" action="{{ url('properties') }}">

                    <div class="formRow">
                        <div class="columBox maxWd">
                            <label class="headLabel">Purpose</label>
                            <select class="form-select" aria-label="Default select example" name="offerType">
                                <option  value="">Select Purpose</option>
                                @foreach ($offerTypes as $offerType)
                                <option value="{{ $offerType->id }}">{{ $offerType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="columBox">
                            <label class="headLabel">Community</label>
                            <select class="form-select" aria-label="Default select example" name="community">
                                <option  value="">Select Community</option>
                                @foreach ($communities as $community)
                                <option value="{{ $community->id }}">{{ $community->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="columBox">
                            <label class="headLabel">Type</label>
                            <select class="form-select" aria-label="Default select example" name="accommodation">
                                <option  value="">Select Type</option>
                                @foreach ($accommodations as $accommodation)
                                <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="columBox">
                            <input type="submit" name="" value="Search" class="headFrmBtn">
                        </div>
                    </div>
                    <div class="AdvanceSearchArea">
                        <div class="collapse" id="collapseExample">
                            <div class="formRow">
                                <div class="columBox ">
                                    <label class="headLabel">Bedrooms</label>
                                    <select class="form-select" aria-label="Default select example" name="bedroom">
                                        <option  value="">Select Bedrooms</option>
                                       @foreach ($bedrooms as $bed)
                                       <option value="{{ $bed }}">{{ $bed }}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <div class="columBox">
                                    <label class="headLabel">Bathrooms</label>
                                    <select class="form-select" aria-label="Default select example" name="bathroom">
                                        <option  value="">Select Bathrooms</option>
                                        @foreach ($bathrooms as $bath)
                                        <option value="{{ $bath }}">{{ $bath }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="columBox">
                                    <label class="headLabel">Price</label>
                                    <input class="form-input" type="text" name="price">
                                </div>

                            </div>
                        </div>
                        <button class="frmTabBtn" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample">Advance Search</button>
                    </div>
                    </form>
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
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-md-4">
                    <a href="{{ url('property/' . $property->slug) }}" class="propertyCard">
                        <figure>
                            <img src="{{ $property->cover_img }}" class="propertyImg">
                        </figure>
                        <div class="propertyCardContent">
                            <div class="priceBar">
                                @if ($property->offerType)
                                    <button class="proPlanBtn">{{ $property->offerType->name }}</button>
                                @endif
                                @if ($property->price)
                                    <h4 class="priceText">AED {{ number_format($property->price) }}</h4>
                                @endif

                            </div>
                            <h5 class="proTitle">{{ $property->name }}</h5>
                            <div class="propetyInfoBar">
                                @if ($property->bedrooms)
                                    <div class="proInfoItem">
                                        <span>Beds: {{ $property->bedrooms }}</span>
                                    </div>
                                @endif
                                @if ($property->bathrooms)
                                    <div class="proInfoItem">
                                        <span>Baths: {{ $property->bathrooms }}</span>
                                    </div>
                                @endif
                                @if ($property->built_area)
                                    <div class="proInfoItem">
                                        <span>SqFt: {{ $property->built_area }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
