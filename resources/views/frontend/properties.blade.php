@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title', 'Properties | ' . $name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">
    </section>

    {{-- search & breadcrumps --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>{{ Request::is('rent') ? 'Rent' : (Request::is('resale') ? 'Resale' : 'Properties') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="agentSearch bg-white" id="singlePropertySearch">
                                <div class="pcAgentForm">
                                    <form action="" method="post" id="propSearchForm">
                                        @csrf
                                        <div class="row g-3 justify-content-center">
                                            <div class="col">

                                                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                                <div class="input-group input-group-solid flex-nowrap">
                                                    <span class="input-group-text  border-end-0 bg-transparent pe-1"><i
                                                            class="bi bi-search fs-13"></i></span>
                                                    <div class="overflow-hidden noSideBorder flex-grow-1">
                                                        {{-- @dd($searchKey); --}}
                                                        <select name="keywords[]" id="keywords"
                                                            class="form-control form-control-lg propertySelect form-select-solid rounded-start-0 border-start-0"
                                                            multiple="multiple" data-placeholder="Put any keyword...">

                                                            @foreach ($searchKey as $key => $item)
                                                                <option value="{{ $item }}"
                                                                    @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                            @if ($keyword == $item) selected @endif
                                                                    @endforeach
                                                            @endif>{{ $key }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select form-select-lg" name="status_id" id="status_id"
                                                    {{ Request::is('rent') || Request::is('resale') ? 'disabled' : '' }}>
                                                    <option value="">Status</option>
                                                    @foreach ($category as $cat)
                                                        @if ($cat->name == 'Off Plan')
                                                        @else
                                                            <option value="{{ $cat->id }}"
                                                                {{ Request::is('rent') ? ($cat->id == 1 ? 'selected' : '') : (Request::is('resale') ? ($cat->id == 2 ? 'selected' : '') : '') }}
                                                                @if (isset($data['status'])) {{ $data['status'] == $cat->id ? 'selected' : '' }} @endif>
                                                                {{ $cat->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select  form-select-lg" name="accom_id" id="accom_id">
                                                    <option value="">Property Type</option>
                                                    @foreach ($accom as $acc)
                                                        <option value="{{ $acc->id }}"
                                                            @if (isset($data['accomodation'])) {{ $data['accomodation'] == $cat->id ? 'selected' : '' }} @endif>
                                                            {{ $acc->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown">
                                                    <a class="form-control form-control-lg text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false" data-bs-auto-close="outside">
                                                        Beds & Baths
                                                    </a>

                                                    <div class="dropdown-menu">
                                                        <div class="p-2">
                                                            <h6 class="text-primary">
                                                                Bedrooms
                                                            </h6>
                                                            <div class=" propTagDiv d-flex text-start">
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" id="bedroom0" value="0"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary btn-lightBlue"
                                                                        for="bedroom0">Studio</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" id="bedroom1" value="1"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary btn-lightBlue"
                                                                        for="bedroom1">1</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" id="bedroom2" value="2"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bedroom2">2</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" id="bedroom3" value="3"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bedroom3">3</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" id="bedroom4" value="4"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bedroom4">4</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" id="bedroom5" value="5"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bedroom5">5</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" id="bedroom6" value="6"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bedroom6">6</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bedrooms" value="7" id="bedroom7"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bedroom7">7+</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="p-2">
                                                            <h6 class="text-primary">
                                                                Bathrooms
                                                            </h6>
                                                            <div class=" propTagDiv d-flex text-start">
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bathrooms" id="bathroom1" value="1"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary btn-lightBlue"
                                                                        for="bathroom1">1</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bathrooms" id="bathroom2" value="2"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bathroom2">2</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bathrooms" id="bathroom3" value="3"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bathroom3">3</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bathrooms" id="bathroom4" value="4"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bathroom4">4</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bathrooms" id="bathroom5" value="5"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bathroom5">5</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bathrooms" id="bathroom6" value="6"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bathroom6">6</label>
                                                                </div>
                                                                <div class="propTag">
                                                                    <input type="checkbox" class="btn-check btnCheckTab"
                                                                        name="bathrooms" id="bathroom7" value="7"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-secondary  btn-lightBlue"
                                                                        for="bathroom7">7+</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown">
                                                    <a class="form-control form-control-lg text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false" data-bs-auto-close="outside">
                                                        Price
                                                    </a>

                                                    <div class="dropdown-menu">
                                                        <div class="p-2">
                                                            <div class="row g-2">
                                                                <div class="col-lg-6 my-auto">
                                                                    <div class="">
                                                                        <label for="min-price">Min Price</label>
                                                                        <input type="text"
                                                                            class="form-control  form-control-sm"
                                                                            id="min-price" name="min-price"
                                                                            placeholder=" ">


                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 my-auto">
                                                                    <div class="">
                                                                        <label for="max-price">Max Price</label>
                                                                        <input type="text"
                                                                            class="form-control  form-control-sm"
                                                                            id="max-price" name="max-price"
                                                                            placeholder=" ">


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-lg btn-primary"
                                                    id="btnPropSearch">Find Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="mobAgentForm">
                                    <form action="" method="post" id="propSearchFormMob">
                                        @csrf
                                        <div class="row g-1">
                                            <div class="col-7">
                                                <input type="hidden" name="hidden_pageMob" id="hidden_pageMob"
                                                    value="1" />
                                                <div class="input-group input-group-solid flex-nowrap">
                                                    <span class="input-group-text  border-end-0 bg-transparent pe-1"><i
                                                            class="bi bi-search fs-13"></i></span>
                                                    <div class="overflow-hidden noSideBorder flex-grow-1">

                                                        <select name="keywordsMob[]" id="keywordsMob"
                                                            class="form-control form-control-lg propertySelect1 form-select-solid rounded-start-0 border-start-0"
                                                            multiple="multiple" data-placeholder="Put any keyword...">

                                                            @foreach ($searchKey as $key => $item)
                                                                <option value="{{ $item }}"
                                                                    @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                            @if ($keyword == $item) selected @endif
                                                                    @endforeach
                                                            @endif>{{ $key }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn w-100 btn-lightBlue px-1 my-auto fs-14" type="button"
                                                    id="button-addon2">
                                                    <i class="bi bi-plus agentAdvbtn text-primary"></i>
                                                    <i class="bi bi-dash-lg agentAdvMinbtn text-primary d-none"></i>
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn w-100 btn-primary"
                                                    id="btnPropSearchMob">Find Now</button>
                                            </div>
                                            <div class="col-12 col-lg-4 my-auto">
                                                <div class="advAgentMobForm d-none">
                                                    <div class="row g-1">
                                                        <div class="col-6">
                                                            <select class="form-control my-1 form-control-lg"
                                                                name="status_idMob" id="status_idMob"
                                                                {{ Request::is('rent') || Request::is('resale') ? 'disabled' : '' }}>
                                                                <option value="">Status</option>
                                                                @foreach ($category as $cat)
                                                                    <option value="{{ $cat->id }}"
                                                                        {{ Request::is('rent') ? ($cat->id == 1 ? 'selected' : '') : (Request::is('resale') ? ($cat->id == 2 ? 'selected' : '') : '') }}>
                                                                        {{ $cat->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <select class="form-control my-1  form-control-lg"
                                                                name="accom_idMob" id="accom_idMob">
                                                                <option value="">Property Type</option>
                                                                @foreach ($accom as $acc)
                                                                    <option value="{{ $acc->id }}">
                                                                        {{ $acc->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="dropdown my-1">
                                                                <a class="form-control form-control-lg text-decoration-none dropdown-toggle"
                                                                    href="#" role="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    data-bs-auto-close="outside">
                                                                    Beds & Baths
                                                                </a>

                                                                <div class="dropdown-menu">
                                                                    <div class="p-2">
                                                                        <h6 class="text-primary">
                                                                            Bedrooms
                                                                        </h6>
                                                                        <div class=" propTagDiv d-flex text-start">
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" id="bedroom0Mob"
                                                                                    value="0" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary btn-lightBlue"
                                                                                    for="bedroom0Mob">Studio</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" id="bedroom1Mob"
                                                                                    value="1" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary btn-lightBlue"
                                                                                    for="bedroom1Mob">1</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" id="bedroom2Mob"
                                                                                    value="2" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bedroom2Mob">2</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" id="bedroom3Mob"
                                                                                    value="3" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bedroom3Mob">3</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" id="bedroom4Mob"
                                                                                    value="4" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bedroom4Mob">4</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" id="bedroom5"
                                                                                    value="5" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bedroom5Mob">5</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" id="bedroom6Mob"
                                                                                    value="6" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bedroom6Mob">6</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bedroomsMob" value="7"
                                                                                    id="bedroom7Mob" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bedroom7Mob">7+</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="p-2">
                                                                        <h6 class="text-primary">
                                                                            Bathrooms
                                                                        </h6>
                                                                        <div class=" propTagDiv d-flex text-start">
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bathroomsMob" id="bathroom1Mob"
                                                                                    value="1" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary btn-lightBlue"
                                                                                    for="bathroom1Mob">1</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bathroomsMob" id="bathroom2Mob"
                                                                                    value="2" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bathroom2Mob">2</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bathroomsMob" id="bathroom3Mob"
                                                                                    value="3" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bathroom3Mob">3</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bathroomsMob" id="bathroom4Mob"
                                                                                    value="4" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bathroom4Mob">4</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bathroomsMob" id="bathroom5Mob"
                                                                                    value="5" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bathroom5Mob">5</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bathroomsMob" id="bathroom6Mob"
                                                                                    value="6" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bathroom6Mob">6</label>
                                                                            </div>
                                                                            <div class="propTag">
                                                                                <input type="checkbox"
                                                                                    class="btn-check btnCheckTab"
                                                                                    name="bathroomsMob" id="bathroom7Mob"
                                                                                    value="7" autocomplete="off">
                                                                                <label
                                                                                    class="btn btn-secondary  btn-lightBlue"
                                                                                    for="bathroom7Mob">7+</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="dropdown my-1">
                                                                <a class="form-control form-control-lg text-decoration-none dropdown-toggle"
                                                                    href="#" role="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    data-bs-auto-close="outside">
                                                                    Price
                                                                </a>

                                                                <div class="dropdown-menu">
                                                                    <div class="p-2">
                                                                        <div class="row g-2">
                                                                            <div class="col-lg-6 my-auto">
                                                                                <div class="">
                                                                                    <label for="min-price">Min
                                                                                        Price</label>
                                                                                    <input type="text"
                                                                                        class="form-control  form-control-sm"
                                                                                        id="min-priceMob"
                                                                                        name="min-priceMob"
                                                                                        placeholder=" ">


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 my-auto">
                                                                                <div class="">
                                                                                    <label for="max-price">Max
                                                                                        Price</label>
                                                                                    <input type="text"
                                                                                        class="form-control  form-control-sm"
                                                                                        id="max-priceMob"
                                                                                        name="max-priceMob"
                                                                                        placeholder=" ">


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- properties view  --}}
    <section class="my-5">
        <div class="container">
            <div class="showPropList">


                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <p class="text-primary mb-1">Property
                            {{ Request::is('rent') ? 'for Rent' : (Request::is('resale') ? 'for Sale' : '') }} in Dubai
                            ({{ count($propCount) }})</p>
                        <h5 class="text-primary fw-semibold text-uppercase mb-3 mb-lg-5 mb-md-5">Search Result</h5>
                    </div>

                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="d-none d-lg-block d-md-block">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <ul class="nav nav-pills mb-3 viewTab" id="pills-tab" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active viewBtn" id="listTab" data-bs-toggle="pill"
                                                data-bs-target="#listView" tabId="list" type="button" role="tab"
                                                aria-controls="listView" aria-selected="false">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-list-ul fIcon fa-stack-1x fa-inverse"></i>
                                                </span><span class="fs-14"> List View</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link  viewBtn" id="gridTab" data-bs-toggle="pill"
                                                data-bs-target="#gridView" tabId="grid" type="button" role="tab"
                                                aria-controls="gridView" aria-selected="true">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-grid fIcon fa-stack-1x fa-inverse"></i>
                                                </span><span class="fs-14"> Grid View</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <div class="d-flex justify-content-end">
                                        <div class="my-auto pe-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input exclusiveSwitch" type="checkbox"
                                                    role="switch" id="exclusiveSwitch" name="exclusiveSwitch"
                                                    value="0">
                                                <label class="form-check-label" for="exclusiveSwitch">Exclusive</label>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortBy rounded-1 pe-5"
                                                aria-label="" id="sortBy" name="sortBy">
                                                <option value="">Sort By</option>
                                                <option value="Newest">Newest</option>
                                                <option value="Lowest">Price(Lowest)</option>
                                                <option value="Highest">Price(Highest)</option>
                                                <option value="Least">Beds(Least)</option>
                                                <option value="Most">Beds(Most)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-block d-lg-none d-md-none">
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input exclusiveSwitchMob" type="checkbox"
                                                role="switch" id="exclusiveSwitchMob" name="exclusiveSwitchMob"
                                                value="0">
                                            <label class="form-check-label" for="exclusiveSwitchMob">Exclusive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 my-auto">
                                    <div class="">
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortByMob rounded-1 pe-5"
                                                aria-label="" id="sortByMob">
                                                <option selected>Sort By</option>
                                                <option value="Newest">Newest</option>
                                                <option value="Lowest">Price(Lowest)</option>
                                                <option value="Highest">Price(Highest)</option>
                                                <option value="Least">Beds(Least)</option>
                                                <option value="Most">Beds(Most)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 my-auto">
                                    <ul class="nav nav-pills d-flex justify-content-end viewTab" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active viewBtn" tabId="list" id="listTab"
                                                data-bs-toggle="pill" data-bs-target="#listView" type="button"
                                                role="tab" aria-controls="listView" aria-selected="false">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-list-ul fIcon fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="py-3">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="gridView" tabId="grid" role="tabpanel"
                                    aria-labelledby="gridTab" tabindex="0">
                                    @if (count($properties) > 0)
                                        <div class="row g-4">
                                            @foreach ($properties as $property)
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div>
                                                        <div class="card shadow propCard rounded-3 border-0">
                                                            <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                class="text-decoration-none">
                                                                <img src="{{ $property->mainImage }}"
                                                                    class="card-img-top img-fluid propImg rounded-3 rounded-bottom-0"
                                                                    alt="{{ $property->name }}">
                                                            </a>
                                                            <div class="card-body rounded-3 rounded-top-0">
                                                                <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                    class="text-decoration-none">
                                                                    <h6 class="text-primary fw-semibold mb-0">
                                                                        {{ substr(strip_tags($property->name), 0, 30) . '...' }}
                                                                    </h6>
                                                                </a>
                                                                <ul class="list-unstyled propListSmall lh-1 mb-2">
                                                                    <li class="d-inline">
                                                                        <small>{{ $property->bedrooms > 0 ? $property->bedrooms . ' Bed' : 'Studio' }}
                                                                        </small>
                                                                    </li>
                                                                    <li class="d-inline">
                                                                        <small>{{ $property->bathrooms > 0 ? $property->bathrooms : '' }}
                                                                            Bath</small>
                                                                    </li>
                                                                    <li class="d-inline">
                                                                        <small>{{ $property->area > 0 ? $property->area : '' }}
                                                                            SQ.FT</small>
                                                                    </li>
                                                                </ul>
                                                                <small
                                                                    class="fw-semibold">{{ $property->currency ? $property->currency : 'AED' }}
                                                                    {{ number_format($property->price) }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="col-12 col-lg-12">
                                                <nav aria-label="Page navigation example">
                                                    <div class="mobPagination justify-content-center">
                                                        {{ $properties->withQueryString()->links() }}
                                                    </div>
                                                    <div class="pcPagination justify-content-center">
                                                        {{ $properties->withQueryString()->links() }}
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <p class="text-primary">No Property Found</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade  show active" tabId="list" id="listView" role="tabpanel"
                                    aria-labelledby="listTab" tabindex="0">
                                    @if (count($properties) > 0)
                                        <div class="row g-4">
                                            @foreach ($properties as $row)
                                                <div class="col-12 col-lg-6 col-md-12 p-2">
                                                    <div>
                                                        <div class="card shadow rounded-3 propCard border-0">
                                                            <div class="row g-0">
                                                                <div class="col-md-5">
                                                                    <div class="swiper swiperPropList">
                                                                        <div class="swiper-wrapper">
                                                                            @if (count($row->subImages) > 0)
                                                                                @foreach ($row->subImages as $key => $imgs)
                                                                                    @if ($key < 3)
                                                                                        <div class="swiper-slide">
                                                                                            <div class="">
                                                                                                <center>
                                                                                                    <a href="{{ url('property' . '/' . $row->slug) }}"
                                                                                                        class="text-decoration-none">
                                                                                                        <img src="{{ $imgs['path'] }}"
                                                                                                            class="img-fluid propImgListNew  rounded-3  rounded-end-0"
                                                                                                            alt="{{ $row->name }}">
                                                                                                    </a>
                                                                                                </center>
                                                                                            </div>
                                                                                        </div>
                                                                                    @else
                                                                                    @break

                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="swiper-slide">
                                                                                <div class="">
                                                                                    <center>
                                                                                        <a href="{{ url('property' . '/' . $row->slug) }}"
                                                                                            class="text-decoration-none">
                                                                                            <img src="{{ $row->mainImage }}"
                                                                                                class="img-fluid propImgListNew  rounded-3  rounded-end-0"
                                                                                                alt="{{ $row->name }}">
                                                                                        </a>
                                                                                    </center>
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="swiper-button-prev">
                                                                        <span class="fa-stack fa-lg">
                                                                            <i
                                                                                class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                            <i
                                                                                class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="swiper-button-next me-2">
                                                                        <span class="fa-stack fa-lg">
                                                                            <i
                                                                                class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                            <i
                                                                                class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                        </span>
                                                                    </div>
                                                                    @if ($row->exclusive == 1)
                                                                        <div
                                                                            class="badge bg-warning fw-normal text-white newBadge fs-12">
                                                                            Exclusive</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="p-relative h-100">
                                                                    <div class="card-body pb-5 pt-1">
                                                                        <small
                                                                            class="text-secondary">{{ $row->accommodations ? $row->accommodations->name : '' }}</small>
                                                                        <a href="{{ url('property' . '/' . $row->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <h5 class="text-primary fw-semibold mb-0">
                                                                                {{ $row->currency ? $row->currency : 'AED' }}
                                                                                {{ number_format($row->price) }}
                                                                            </h5>

                                                                            <small
                                                                                class="text-black">{{ substr(strip_tags($row->name), 0, 40) . '...' }}</small>
                                                                        </a>
                                                                        <div class=" mt-0 mt-md-5 mt-lg-5">
                                                                            <small><i
                                                                                    class="fa fa-map-marker"></i>&nbsp;
                                                                                {{ $row->address ? substr(strip_tags($row->address), 0, 40) . '...' : $row->communities->name . ' - ' . $row->emirate }}</small>
                                                                        </div>
                                                                        <ul
                                                                            class="list-unstyled propListSmall lh-1 my-2">
                                                                            <li class="d-inline"><small><i
                                                                                        class="fa fa-bed"
                                                                                        aria-hidden="true"></i>
                                                                                    {{ $row->bedrooms > 0 ? $row->bedrooms . ' Bed' : 'Studio' }}
                                                                                </small></li>
                                                                            <li class="d-inline"><small><i
                                                                                        class="fa fa-bath"
                                                                                        aria-hidden="true"></i>
                                                                                    {{ $row->bathrooms > 0 ? $row->bathrooms : '' }}
                                                                                    Bath</small>
                                                                            </li>
                                                                            <li class="d-inline"><small><i
                                                                                        class="bi bi-arrows-fullscreen"></i>
                                                                                    {{ $row->area > 0 ? $row->area : '' }}
                                                                                    SQ.FT</small></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="card-footer bg-white border-0 rounded-oneCorner rounded-0">
                                                                        <div class="d-flex justify-content-between">
                                                                            <div class="my-auto">
                                                                                <ul class="list-unstyled  mb-0">
                                                                                    <li class="d-inline propOpt">
                                                                                        <a href="tel:{{ $row->agent->contact_number }}"
                                                                                            class="text-decoration-none"
                                                                                            target="_blank">
                                                                                            <span class="fa-stack">
                                                                                                <i
                                                                                                    class="fa fa-circle-0  fa-stack-2x"></i>
                                                                                                <i
                                                                                                    class="bi bi-telephone fIconWhite fa-stack-1x fa-inverse"></i>
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="d-inline propOpt">
                                                                                        <a href="https://wa.me/{{ $row->agent->whatsapp_number }}"
                                                                                            class="text-decoration-none"
                                                                                            target="_blank">
                                                                                            <span class="fa-stack">
                                                                                                <i
                                                                                                    class="fa fa-circle-0  fa-stack-2x"></i>
                                                                                                <i
                                                                                                    class="bi bi-whatsapp fIconGreen fa-stack-1x fa-inverse"></i>
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="d-inline propOpt">
                                                                                        <a href="mailto:{{ $row->agent->email }}"
                                                                                            class="text-decoration-none"
                                                                                            target="_blank">
                                                                                            <span class="fa-stack">
                                                                                                <i
                                                                                                    class="fa fa-circle-0  fa-stack-2x"></i>
                                                                                                <i
                                                                                                    class="bi bi-envelope fIconWhite fa-stack-1x fa-inverse"></i>
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="my-auto">
                                                                                <button type="button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#bookView"
                                                                                    propertyUrl="{{ url('property' . '/' . $row->slug) }}"
                                                                                    class="btn btn-sm fs-12 btn-primary rounded-1 text-uppercase px-3 bookViewingBtn">Book
                                                                                    A Viewing</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-12 col-lg-12">
                                            <nav aria-label="Page navigation example">
                                                <div class="mobPagination justify-content-center">
                                                    {{ $properties->withQueryString()->links() }}
                                                </div>
                                                <div class="pcPagination justify-content-center">
                                                    {{ $properties->withQueryString()->links() }}
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <p class="text-primary">No Property Found</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Content --}}
@if (count($contents) > 0)
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    @foreach ($contents as $key => $content)
                        @if (($key + 1) % 2 == 0)
                            <div class="row colRev">
                                <div class="col-12 col-lg-12 col-md-12 my-auto">
                                    <div class="mb-3">
                                        <div class="my-auto">
                                            <h5 class="mb-0 text-primary">{{ $content->title }}</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="propDesc">
                                            @if ($content->image)
                                                <img class="img-fluid rounded-3  float-start  widthImg100 me-3 mb-2"
                                                    src="{{ $content->image }}" alt="unique properties"
                                                    width="50%">
                                            @endif
                                            {!! $content->description !!}
                                        </div>

                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="row  mb-5">
                                <div class="col-12 col-lg-12 col-md-12 my-auto">
                                    <div class="mb-3">
                                        <div class="my-auto">
                                            <h5 class="mb-0 text-primary">{{ $content->title }}</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="propDesc">
                                            @if ($content->image)
                                                <img class="img-fluid rounded-3  float-start  widthImg100 me-3 mb-2"
                                                    src="{{ $content->image }}" alt="unique properties"
                                                    width="50%">
                                            @endif
                                            {!! $content->description !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
                <div class="row">

                    <div class="col-12 col-lg-12 col-md-12 my-auto">
                        <div class="">
                            <div class="my-auto">
                                <h5 class="text-primary mb-3">Frequently Asked Questions</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 my-auto">

                        <div>
                            <div class="accordion accordion-flush" id="accordionExample">
                                @foreach ($faqs as $key => $faq)

                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="faq{{ $key + 1 }}Q">
                                            <button
                                                class="accordion-button @if ($loop->first) @else collapsed @endif bg-transparent p-0 "
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faq{{ $key + 1 }}Ans"
                                                aria-expanded="@if ($loop->first) true @else false @endif"
                                                aria-controls="faq{{ $key + 1 }}Ans">
                                                <h6 class="text-primary">{{ $faq->question }}</h6>
                                            </button>
                                        </h2>
                                        <div id="faq{{ $key + 1 }}Ans"
                                            class="accordion-collapse collapse @if ($loop->first) show @endif"
                                            aria-labelledby="faq{{ $key + 1 }}Q"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <p>{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<!-- Book Viewing modal -->
<div class="modal fade" id="bookView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-primary">
            <div class="modal-header border-0 bg-primaryLight justify-content-center">
                <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                        class="bi bi-x-circle text-white fa-2x"></i></button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="secHead text-center mb-3">
                            <h2 class="text-white text-uppercase">Arrange a viewing</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 col-md-5">
                        <div class="modalViewFormCont">
                            <form action="{{ route('bookViewing') }}" id="modalViewForm" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Full Name*</label>
                                        <input type="text" class="form-control" id="name" name="nameCon2"
                                            placeholder="Full Name*" required>
                                        <input type="hidden" class="form-control" id="formName" name="formFrom"
                                            value="Book A Viewing Properties" required>
                                        <input type="hidden" class="form-control" id="propName" name="propName"
                                            value="" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control" id="email" name="emailCon2"
                                            required placeholder="Email*">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="mobile" class="form-label">Mobile*</label>
                                        <input id="fullNumber" type="hidden" name="fullNumber">
                                        <input type="tel" onkeyup="numbersOnly(this)"
                                            class="form-control contField" id="telephone" name="phone"
                                            placeholder="Mobile*" required>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="date" class="form-label">Prefered Date*</label>
                                        <input type="date" class="form-control" id="date" name="ths_date"
                                            placeholder="Prefered Date*" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="time" class="form-label">Prefered Time*</label>
                                        <input type="time" class="form-control" id="time" name="ths_time"
                                            placeholder="Prefered Time*" required>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid ">
                                            <button type="submit" class="btn btn-lightBlue text-uppercase">Submit
                                                Details</button>
                                        </div>
                                        <div class="form-text text-white text-center">By clicking submit, you agree to
                                            our Terms & Privacy Policy</div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.bookViewingBtn', function() {
        //alert('check');
        var formName = $(this).attr("propertyUrl");
        $("#propName").val(formName);
    });

    
</script>
<script>
    function fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
        sort, bathrooms, bedrooms, keywords, tabId) {
        if (window.location.pathname == "/rent") {
            var path = "rent";
        } else if (window.location.pathname == "/resale") {
            var path = "resale";
        } else {
            var path = "properties";
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/" + path + "?page=" + page,
            type: "POST",
            dataType: 'json',

            data: {
                page: page,
                status_id: status_id,
                accommodataion_id: accommodataion_id,
                price_from: price_from,
                price_to: price_to,
                exclusive: exclusive,
                sort: sort,
                bathrooms: bathrooms,
                bedrooms: bedrooms,
                keywords: keywords,
                tab: tabId
            },
            success: function(response) {

                $('.showPropList').html('');
                $('.showPropList').html(response.html);
                $("#btnPropSearch").prop("disabled", false);
                $("#btnPropSearchMob").prop("disabled", false);
                initSwiper();
                // $(".tab-content .tab-pane").removeClass("active");
                // $('.viewTab li .viewBtn').removeClass("active");
                // $('.viewTab li .viewBtn[tabId='"+tabId+"']').addClass("active");
                // $(".tab-content .tab-pane[tabId='"+tabId+"']").addClass("active");
                $('html, body').animate({
                    scrollTop: 400
                }, 'smooth');
            }
        })

    }
    $(document).on('change', '.sortBy', function(event) {
        var status_id = $('#status_id').val();
        var accommodataion_id = $('#accom_id').val();
        var price_from = $('#min-price').val();
        var price_to = $('#max-price').val();
        var exclusive = $('#exclusiveSwitch').val();
        var sort = $(this).val();
        var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_page').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).on('change', '.sortByMob', function(event) {
        var status_id = $('#status_idMob').val();
        var accommodataion_id = $('#accom_idMob').val();
        var price_from = $('#min-priceMob').val();
        var price_to = $('#max-priceMob').val();
        var exclusive = $('#exclusiveSwitchMob').val();
        var sort = $(this).val();
        var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_pageMob').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).on('change', '.exclusiveSwitch', function(event) {
        if (this.checked) {
            $(this).attr('value', 1);
            $(this).prop('checked', true);
        } else {
            $(this).attr('value', 0);
            $(this).prop('checked', false);
        }
        var status_id = $('#status_id').val();
        var accommodataion_id = $('#accom_id').val();
        var price_from = $('#min-price').val();
        var price_to = $('#max-price').val();
        var exclusive = $('#exclusiveSwitch').val();
        var sort = $('#sortBy').val();
        var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_page').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).on('change', '.exclusiveSwitchMob', function(event) {
        if (this.checked) {
            $(this).attr('value', 1);
            $(this).prop('checked', true);
        } else {
            $(this).attr('value', 0);
            $(this).prop('checked', false);
        }
        var status_id = $('#status_idMob').val();
        var accommodataion_id = $('#accom_idMob').val();
        var price_from = $('#min-priceMob').val();
        var price_to = $('#max-priceMob').val();
        var exclusive = $('#exclusiveSwitchMob').val();
        var sort = $('#sortByMob').val();
        var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_pageMob').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).ready(function() {

        $("#propSearchForm").submit(function(e) {

            e.preventDefault();
            $("#btnPropSearch").prop("disabled", true);
            $('#hidden_page').val('1');
            var status_id = $('#status_id').val();
            var accommodataion_id = $('#accom_id').val();
            var price_from = $('#min-price').val();
            var price_to = $('#max-price').val();
            var exclusive = $('#exclusiveSwitch').val();
            var sort = $('#sortBy').val();
            var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var page = $('#hidden_page').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            // alert(tabId);
            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);
        });
        $("#propSearchFormMob").submit(function(e) {

            e.preventDefault();
            $("#btnPropSearchMob").prop("disabled", true);
            $('#hidden_pageMob').val('1');
            var status_id = $('#status_idMob').val();
            var accommodataion_id = $('#accom_idMob').val();
            var price_from = $('#min-priceMob').val();
            var price_to = $('#max-priceMob').val();
            var exclusive = $('#exclusiveSwitchMob').val();
            var sort = $('#sortByMob').val();
            var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var page = $('#hidden_pageMob').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            // alert(tabId);
            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);
        });
        $(document).on('click', '.mobPagination nav .pagination a', function(event) {

            event.preventDefault();
            var status_id = $('#status_idMob').val();
            var accommodataion_id = $('#accom_idMob').val();
            var price_from = $('#min-priceMob').val();
            var price_to = $('#max-priceMob').val();
            var exclusive = $('#exclusiveSwitchMob').val();
            var sort = $('#sortByMob').val();
            var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            var page = $(this).attr('href').split('page=')[1];

            $('#hidden_pageMob').val(page);

            $('li').removeClass('active');

            $(this).parent().addClass('active');

            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);

        });
        $(document).on('click', '.pcPagination nav .pagination a', function(event) {

            event.preventDefault();
            var status_id = $('#status_id').val();
            var accommodataion_id = $('#accom_id').val();
            var price_from = $('#min-price').val();
            var price_to = $('#max-price').val();
            var exclusive = $('#exclusiveSwitch').val();
            var sort = $('#sortBy').val();
            var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            var page = $(this).attr('href').split('page=')[1];

            $('#hidden_page').val(page);

            $('li').removeClass('active');

            $(this).parent().addClass('active');

            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);

        });


    });
</script>
@endsection
