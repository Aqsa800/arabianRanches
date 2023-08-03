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
@section('headerClass', 'tabHtAuto')
@section('header')
    <div class="headerContent">
        <h2 class="headerTitle">Arabian Ranches </h2>
        <a href="#" class="fillBtn minWdLg  centerAuto mb-5">DOWNLOAD BROCHURE</a>
        <div class="headFormArea">
            <div class="formRow">
                <div class="columBox maxWd">
                    <label class="headLabel">Purpose</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Rent</option>
                        <option value="1">Buy</option>
                        <option value="2">Sale</option>
                    </select>
                </div>
            <div class="columBox">
                    <label class="headLabel">Community</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Choose the area</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="columBox">
                    <label class="headLabel">Community</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Arabian Ranches</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="columBox">
                    <input type="submit" name="" value="Search" class="headFrmBtn">
                </div>

            </div>
            <div class="AdvanceSearchArea">
                <button class="frmTabBtn">Advance Search</button>
            </div>
        </div>
    </div>
@endsection
@section('header_extra')
@endsection
@section('content')
    <section class="section pad-60-auto sectionMarBtm">
        <div class="container">
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-md-4">
                        <a href="{{ url('property/'.$property->slug) }}" class="propertyCard">
                            <figure>
                                <img src="{{ $property->mainImage}}" class="propertyImg">
                            </figure>
                            <div class="propertyCardContent">
                                <div class="priceBar">
                                    @if ($property->offerType)
                                    <button class="proPlanBtn">{{ $property->offerType->name }}</button>
                                    @endif
                                    @if ($property->price )
                                    <h4 class="priceText">AED {{ number_format($property->price) }}</h4>
                                    @endif

                                </div>
                                <h5 class="proTitle">{{ $property->name }}</h5>
                                <div class="propetyInfoBar">
                                    @if($property->bedrooms)
                                    <div class="proInfoItem">
                                        <span>Beds: {{ $property->bedrooms }}</span>
                                    </div>
                                    @endif
                                    @if ($property->bathrooms)
                                    <div class="proInfoItem">
                                        <span>Baths: {{ $property->bathrooms }}</span>
                                    </div>
                                    @endif
                                    @if ($property->area)
                                    <div class="proInfoItem">
                                        <span>SqFt: {{ $property->area }}</span>
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
