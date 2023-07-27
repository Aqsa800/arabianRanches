@extends('frontend.layout.master')
@if ($agent->meta_title != '')
    @section('title', $agent->meta_title)
@else
    @section('title', $agent->name)
@endif
@if ($agent->meta_description != '')
    @section('pageDescription', $agent->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($agent->meta_keyword != '')
    @section('pageKeyword', $agent->meta_keyword)
@else
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">
    </section>

    {{-- search & breadcrumps --}}
    <section class="mt-5 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ route('agents') }}">Agents</a></li>
                                    <li><a>{{ $agent->name }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Agent Details --}}
    <section class="mb-5 mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11 col-md-12">
                    <div class="row g-3">
                        <div class="col-12 col-lg-3 col-md-3">
                            <div class="">
                                <center><img src="{{ $agent->image }}" alt="{{ $agent->name }}"
                                        class="img-fluid rounded-3 shadow">
                                </center>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 col-md-12">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="px-0 px-md-0 px-lg-4">
                                        <div class="text-primary border-bottom pb-3">
                                            <h3 class="mb-0 fw-semibold">{{ $agent->name }}</h4>
                                                <p class="mb-0 fs-18">{{ $agent->designation }}</p>
                                        </div>
                                        <div class="pt-3">
                                            <table class="table fs-14 table-borderless table-sm align-middle">
                                                <tbody>
                                                    @if ($agent->experience)
                                                        <tr>
                                                            <td class="w-35">Experience :</td>
                                                            <td>{{ $agent->experience }}</td>
                                                        </tr>
                                                    @endif
                                                    @if ($agent->specialization)
                                                        <tr>
                                                            <td>Specialization :</td>
                                                            <td>{{ $agent->specialization }}</td>
                                                        </tr>
                                                    @endif
                                                    @if (count($agent->languages) > 0)
                                                        <tr>
                                                            <td>Language :</td>
                                                            <td>{{ $agent->languages->implode('name', ',') }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="py-3 mt-0 mt-lg-3 mt-md-3 border-bottom">

                                        <p class="mb-0 fs-18">Personal Informations</p>
                                    </div>
                                    <div class="pt-3">
                                        <table class="table fs-14 table-borderless table-sm align-middle">
                                            <tbody>
                                                @if (count($agent->properties) > 0)
                                                    <tr>
                                                        <td class="w-35">Active Listing :</td>
                                                        <td>{{ count($agent->properties) }} Properties</td>
                                                    </tr>
                                                @endif
                                                @if ($agent->start_working)
                                                    <tr>
                                                    <tr>
                                                        <td>Experiece Since :</td>
                                                        <td>{{ $agent->start_working }}</td>
                                                    </tr>
                                                    </tr>
                                                @endif
                                                @if ($agent->linkedin_profile)
                                                    <tr>
                                                        <td>Linkedin :</td>
                                                        <td><a href="{{ $agent->linkedin_profile }}" target="_blank"
                                                                class="text-decoration-none text-dark">View Profile</a></td>
                                                    </tr>
                                                @endif
                                                @if (count($agent->properties) > 0)
                                                    <tr>
                                                        <td>Areas :</td>
                                                        <td>
                                                            @php
                                                                $items = [];
                                                            @endphp
                                                            @foreach ($agent->properties as $community)
                                                                @php
                                                                    $items[] = $community->communities->name;
                                                                @endphp
                                                            @endforeach
                                                            {{ implode(',', $items) }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 col-md-12  offset-lg-3">
                            <div class="bg-lightBlue px-4 py-3 rounded-3" id="agentStickyPcCont">
                                <div class="agentTitle d-none me-1 me-md-3 me-lg-3 my-auto">
                                    <h6 class="text-primary">Contact {{ $agent->firstName }} </h6>
                                </div>
                                <div class="row g-2 g-md-3 g-lg-4">
                                    <div class="col-4 col-lg-2  col-md-3">
                                        <div class="d-none d-lg-block d-md-block my-1">
                                            <a href="tel:{{ $agent->contact_number }}"
                                                class="btn btn-primary w-100 rounded-2 text-decoration-none"><i
                                                    class="fa fa-phone"></i></a>
                                        </div>
                                        <div class="d-block d-lg-none d-md-none my-1">
                                            <a href="tel:{{ $agent->contact_number }}"
                                                class="btn btn-primary w-100 rounded-2 text-decoration-none"><i
                                                    class="fa fa-phone"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-4 col-lg-2  col-md-3">
                                        <div class="d-none d-lg-block d-md-block  my-1">
                                            <a href="https://wa.me/{{ $agent->whatsapp_number }}" target="_blank"
                                                class="btn btn-success  w-100 rounded-2 text-decoration-none"><i
                                                    class="fa fa-whatsapp"></i></a>
                                        </div>
                                        <div class="d-block d-lg-none d-md-none  my-1">
                                            <a href="https://wa.me/{{ $agent->whatsapp_number }}" target="_blank"
                                                class="btn btn-success  w-100 rounded-2 text-decoration-none"><i
                                                    class="fa fa-whatsapp"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-2  col-md-3">
                                        <div class="d-none d-lg-block d-md-block my-1">
                                            <a href="mailto:{{ $agent->email }}"
                                                class="btn btn-primary    w-100 rounded-2 text-decoration-none"><i
                                                    class="fa fa-envelope"></i></a>
                                        </div>
                                        <div class="d-block d-lg-none d-md-none my-1">
                                            <a href="mailto:{{ $agent->email }}"
                                                class="btn btn-primary    w-100 rounded-2 text-decoration-none"><i
                                                    class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-3">
                                        <div class="d-none d-lg-block d-md-none my-1">
                                            <button class="btn btn-primary  w-100 rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#bookView"><i class="fa fa-calendar"></i>
                                                Book A Meeting</button>
                                        </div>
                                        <div class="d-block d-lg-none d-md-none my-1">
                                            <button class="btn btn-primary  w-100 rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#bookView"><i class="fa fa-calendar"></i> Book A Meeting
                                            </button>
                                        </div>
                                        <div class="d-none d-lg-none d-md-block my-1">
                                            <button class="btn btn-primary  w-100 rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#bookView"><i class="fa fa-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-lightBlue p-2 rounded-bottom shadow d-none d-md-none d-lg-none "
                                id="agentStickySearch">
                                <div class="my-auto text-center">
                                    <h6 class="text-primary">Contact {{ $agent->firstName }} </h6>
                                </div>
                                <div class="row g-1">
                                    <div class="col-md-12">
                                        <div class="my-1 text-center">
                                            <a href="tel:{{ $agent->contact_number }}"
                                                class="btn btn-primary rounded-2 text-decoration-none"><i
                                                    class="fa fa-phone"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="my-1 text-center">
                                            <a href="https://wa.me/{{ $agent->whatsapp_number }}" target="_blank"
                                                class="btn btn-success rounded-2 text-decoration-none"><i
                                                    class="fa fa-whatsapp"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-1 text-center">
                                            <a href="mailto:{{ $agent->email }}"
                                                class="btn btn-primary rounded-2 text-decoration-none"><i
                                                    class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-1 text-center">
                                            <button class="btn btn-primary rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#bookView"><i class="fa fa-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Agent Properties  --}}
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11 col-md-12">
                    <div class="bg-white shadow rounded-3 p-3">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <ul class="nav latestTabs nav-pills pb-3 border-bottom" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-capitalize active " id="properties-tab"
                                            data-bs-toggle="pill" data-bs-target="#properties" type="button"
                                            role="tab" aria-controls="properties" aria-selected="true">My
                                            Properties</button>
                                    </li>
                                    @if(strlen($agent->message) > 77)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-capitalize" id="aboutme-tab" data-bs-toggle="pill"
                                            data-bs-target="#aboutme" type="button" role="tab"
                                            aria-controls="aboutme" aria-selected="false">About Me</button>
                                    </li>
                                    @endif
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-capitalize" id="projects-tab" data-bs-toggle="pill"
                                            data-bs-target="#projects" type="button" role="tab"
                                            aria-controls="project" aria-selected="false">My Projects</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="properties" role="tabpanel"
                                        aria-labelledby="properties-tab" tabindex="0">
                                        <div class="row g-4">
                                            <div class="col-12 col-lg-12 col-md-12">
                                                <div class=" py-4 border-bottom">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6 col-md-6 my-auto">

                                                            <form action="{{ url(Request::path()) }}" method="post">
                                                                @csrf
                                                                <div
                                                                    class="d-flex justify-content-center justify-content-lg-start ">
                                                                    <div class="my-auto pe-3">
                                                                        <span class="fs-14">Sort By</span>
                                                                    </div>
                                                                    <div class="my-auto pe-3">
                                                                        <select
                                                                            class="form-select  form-select-sm  rounded-1 pe-5"
                                                                            id="categoryBy" name="category"
                                                                            onchange="this.form.submit()">
                                                                            <option value="">Status</option>
                                                                            @foreach ($category as $cat)
                                                                                <option value="{{ $cat->id }}"
                                                                                    {{ isset($data['category']) ? ($data['category'] == $cat->id ? 'selected' : '') : '' }}>
                                                                                    {{ $cat->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="my-auto">
                                                                        <select
                                                                            class="form-select  form-select-sm rounded-1 pe-5"
                                                                            id="sortBy" name="sort"
                                                                            onchange="this.form.submit()">
                                                                            <option value="">Sort</option>
                                                                            <option value="Exclusive"
                                                                                {{ isset($data['sort']) ? ($data['sort'] == 'Exclusive' ? 'selected' : '') : '' }}>
                                                                                Exclusive</option>
                                                                            <option value="Newest"
                                                                                {{ isset($data['sort']) ? ($data['sort'] == 'Newest' ? 'selected' : '') : '' }}>
                                                                                Newest</option>
                                                                            <option value="Lowest"
                                                                                {{ isset($data['sort']) ? ($data['sort'] == 'Lowest' ? 'selected' : '') : '' }}>
                                                                                Price(Lowest)</option>
                                                                            <option value="Highest"
                                                                                {{ isset($data['sort']) ? ($data['sort'] == 'Highest' ? 'selected' : '') : '' }}>
                                                                                Price(Highest)</option>
                                                                            <option value="Least"
                                                                                {{ isset($data['sort']) ? ($data['sort'] == 'Least' ? 'selected' : '') : '' }}>
                                                                                Beds(Least)</option>
                                                                            <option value="Most"
                                                                                {{ isset($data['sort']) ? ($data['sort'] == 'Most' ? 'selected' : '') : '' }}>
                                                                                Beds(Most)</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div
                                                            class="col-12 col-lg-6 col-md-6 text-center text-lg-end text-md-end my-auto">
                                                            <small class="fs-14">Total Properties :
                                                                {{ count($agent->properties) }}</small>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            @if (count($agent->properties) > 0)
                                                @foreach ($agent->properties as $property)
                                                    <div class="col-12 col-lg-12 col-md-12 agentProperty">
                                                        <div>
                                                            <div class="card shadow rounded-3 propCard border-0">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <div class="swiper swiperPropList">
                                                                            <div class="swiper-wrapper">
                                                                                @if (count($property->subImages) > 0)
                                                                                    @foreach ($property->subImages as $key => $imgs)
                                                                                        @if ($key < 3)
                                                                                            <div class="swiper-slide">
                                                                                                <div class="">
                                                                                                    <center>
                                                                                                        <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                                                            class="text-decoration-none">
                                                                                                            <img src="{{ $imgs['path'] }}"
                                                                                                                class="img-fluid agentPropImg rounded-3 "
                                                                                                                alt="{{ $property->name }}">
                                                                                                        </a>
                                                                                                    </center>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @else
                                                                                    <div class="swiper-slide">
                                                                                        <div class="">
                                                                                            <center>
                                                                                                <a href="{{ url('property' . '/' . $property->slug) }}"
                                                                                                    class="text-decoration-none">
                                                                                                    <img src="{{ $property->mainImage }}"
                                                                                                        class="img-fluid agentPropImg rounded-3 "
                                                                                                        alt="{{ $property->name }}">
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
                                                                            @if ($property->developer_id != '')
                                                                                <div class="devTopLeft">
                                                                                    <img src="{{ $property->developer->image }}"
                                                                                        alt="{{ $property->developer->name }}"
                                                                                        class="img-fluid">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="p-relative h-100">
                                                                            <div class="card-body pb-5 pt-2">
                                                                                <div class="d-flex">
                                                                                    <div class="my-auto mb-1">
                                                                                        <a href=""
                                                                                            class="text-decoration-none">
                                                                                            <h5
                                                                                                class="text-primary fw-semibold mt-1 mb-0">
                                                                                                {{ $property->name }}
                                                                                            </h5>
                                                                                        </a>
                                                                                        <a href=""
                                                                                            class="text-decoration-none"
                                                                                            target="_blank"><small
                                                                                                class="text-secondary">{{ $property->developer_id != '' ? $property->developer->name : $property->sub_title }}</small></a>
                                                                                    </div>
                                                                                </div>

                                                                                <ul class="list-unstyled mb-0">
                                                                                    <li class=""><a
                                                                                            href="https://maps.google.com/maps?q={{ $property->address_latitude ? $property->address_latitude : '' }},{{ $property->address_longitude ? $property->address_longitude : '' }}"
                                                                                            target="_blank"
                                                                                            class="text-decoration-none text-black"><small><i
                                                                                                    class="bi bi-geo-alt"></i>
                                                                                                {{ $property->community_id != '' ? $property->communities->name : $property->address }}</small></a>
                                                                                    </li>
                                                                                </ul>
                                                                                <ul
                                                                                    class="list-unstyled propListSmall mb-0 lh-1 pb-2">
                                                                                    <li class="d-inline"><small><i
                                                                                                class="bi bi-wallet2"
                                                                                                aria-hidden="true"></i>
                                                                                            {{ $property->currency ? $property->currency : 'AED' }}
                                                                                            {{ number_format($property->price) }}</small>
                                                                                    </li>
                                                                                    <li class="d-inline"><small><i
                                                                                                class="fa fa-bed"
                                                                                                aria-hidden="true"></i>
                                                                                            {{ $property->bedrooms > 0 ? $property->bedrooms . 'Bedroom' : 'Studio' }}
                                                                                        </small></li>
                                                                                    <li class="d-inline"><small><i
                                                                                                class="bi bi-aspect-ratio"
                                                                                                aria-hidden="true"></i>
                                                                                            {{ $property->area > 0 ? $property->area : '' }}
                                                                                            sqft</small>
                                                                                    </li>
                                                                                    <li class="d-inline"><small><i
                                                                                                class="bi bi-buildings"></i>
                                                                                            {{ $property->accommodations->name }}</small>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="card-footer border-0 bg-lightOlive rounded-0 rounded-oneCorner">
                                                                                <div
                                                                                    class="d-flex justify-content-between">
                                                                                    <div
                                                                                        class="my-auto d-none d-md-block d-lg-block">
                                                                                        <div class="d-flex">
                                                                                            <div class="my-auto">
                                                                                                <img src="{{ $property->agent->image }}"
                                                                                                    class="img-fluid agentImageListing rounded-circle border border-primary"
                                                                                                    alt="{{ $property->agent->name }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="my-auto">
                                                                                        <ul class="list-unstyled  mb-0">
                                                                                            <li class="d-inline propOpt">
                                                                                                <a href="tel:{{ $property->agent->contact_number }}"
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
                                                                                                <a href="https://wa.me/{{ $property->agent->whatsapp_number }}"
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
                                                                                                <a href="{{ $property->agent->email }}"
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
                                                    <div class="text-center py-3 viewMoreBtnWrapper">
                                                        <button class="btn btn-primary  rounded-pill viewMoreBtn px-3">View
                                                            More
                                                            Properties</button>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-center text-primary">
                                                    <p>No Properties Found</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="aboutme" role="tabpanel"
                                        aria-labelledby="aboutme-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 col-md-12">
                                                <div class="py-5">

                                                    {!! $agent->message !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="projects" role="tabpanel"
                                        aria-labelledby="projects-tab" tabindex="0">
                                        <div class="row g-4">
                                            <div class="col-12 col-lg-12 col-md-12">
                                                <div class=" py-4 border-bottom">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6 col-md-6 my-auto">
                                                            {{-- <form action="{{url(Request::path())}}" method="post">
                                                                    @csrf
                                                                <div
                                                                    class="d-flex justify-content-center justify-content-lg-start ">
                                                                    <div class="my-auto pe-3">
                                                                        <span class="fs-14">Sort By</span>
                                                                    </div>
                                                                    <div class="my-auto pe-3">
                                                                        <select
                                                                            class="form-select  form-select-sm  rounded-1 pe-5"
                                                                            id="categoryBy" name="category" onchange="this.form.submit()">
                                                                            <option value="">Status</option>
                                                                            @foreach ($category as $cat)
                                                                                <option value="{{ $cat->id }}" {{ isset($data['category']) ? ($data['category'] == $cat->id ? 'selected' : '') : '' }}>
                                                                                    {{ $cat->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="my-auto">
                                                                        <select
                                                                            class="form-select  form-select-sm rounded-1 pe-5"
                                                                            id="sortBy" name="sort" onchange="this.form.submit()">
                                                                            <option value="">Sort</option>
                                                                            <option value="Exclusive"  {{ isset($data['sort']) ? ($data['sort'] == "Exclusive" ? 'selected' : '') : '' }}>Exclusive</option>
                                                                            <option value="Newest" {{ isset($data['sort']) ? ($data['sort'] == "Newest" ? 'selected' : '') : '' }}>Newest</option>
                                                                            <option value="Lowest" {{ isset($data['sort']) ? ($data['sort'] == "Lowest" ? 'selected' : '') : '' }}>Price(Lowest)</option>
                                                                            <option value="Highest" {{ isset($data['sort']) ? ($data['sort'] == "Highest" ? 'selected' : '') : '' }}>Price(Highest)</option>
                                                                            <option value="Least" {{ isset($data['sort']) ? ($data['sort'] == "Least" ? 'selected' : '') : '' }}>Beds(Least)</option>
                                                                            <option value="Most" {{ isset($data['sort']) ? ($data['sort'] == "Most" ? 'selected' : '') : '' }}>Beds(Most)</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </form> --}}
                                                        </div>

                                                        <div
                                                            class="col-12 col-lg-6 col-md-6 text-center text-lg-end text-md-end my-auto">
                                                            <small class="fs-14">Total Projects :
                                                                {{ count($agent->projects) }}</small>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            @if (count($agent->projects) > 0)
                                                @foreach ($agent->projects as $project)
                                                    <div class="col-12 col-lg-12 col-md-12 agentProject">
                                                        <div>
                                                            <div class="card shadow rounded-3 propCard border-0">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <div class="swiper swiperPropList">
                                                                            <div class="swiper-wrapper">
                                                                                @if (count($project->exteriorGallery) > 0)
                                                                                    @foreach ($project->exteriorGallery as $key => $imgs)
                                                                                        @if ($key < 3)
                                                                                            <div class="swiper-slide">
                                                                                                <div class="">
                                                                                                    <center>
                                                                                                        <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                                            class="text-decoration-none">
                                                                                                            <img src="{{ $imgs['path'] }}"
                                                                                                                class="img-fluid propImgList  rounded-end-0 rounded-3"
                                                                                                                alt="{{ $project->title }}">
                                                                                                        </a>
                                                                                                    </center>
                                                                                                </div>
                                                                                            </div>
                                                                                        @else
                                                                                        @break
                                                                                    @endif
                                                                                @endforeach
                                                                            @elseif(count($project->interiorGallery) > 0)
                                                                                @foreach ($project->interiorGallery as $key => $imgs)
                                                                                    @if ($key < 3)
                                                                                        <div class="swiper-slide">
                                                                                            <div class="">
                                                                                                <center>
                                                                                                    <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                                        class="text-decoration-none">
                                                                                                        <img src="{{ $imgs['path'] }}"
                                                                                                            class="img-fluid propImgList rounded-end-0 rounded-3"
                                                                                                            alt="{{ $project->title }}">
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
                                                                                        <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                            class="text-decoration-none">
                                                                                            <img src="{{ $project->mainImage }}"
                                                                                                class="img-fluid propImgList rounded-end-0 rounded-3"
                                                                                                alt="{{ $project->title }}">
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
                                                                    @if ($project->is_new_launch == 1)
                                                                        <div
                                                                            class="badge bg-warning fw-normal text-white newBadge fs-12">
                                                                            <i class="bi bi-patch-check-fill"></i>
                                                                            New
                                                                        </div>
                                                                    @endif
                                                                    @if ($project->developer)
                                                                        <div class="devTopLeft">
                                                                            <img src="{{ $project->developer->logo }}"
                                                                                alt="{{ $project->developer->name }}"
                                                                                class="img-fluid">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="p-relative h-100">
                                                                    <div class="card-body pb-5 pt-3">
                                                                        @if ($project->completion_date)
                                                                            <span
                                                                                class="badge text-primary fw-normal bg-lightOlive fs-12">Delivery
                                                                                date
                                                                                {{ $project->completion_date }}</span>
                                                                        @endif
                                                                        <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                            class="text-decoration-none">
                                                                            <h5
                                                                                class="text-primary fw-semibold mt-1 mb-0">
                                                                                {{ $project->title }}
                                                                            </h5>
                                                                        </a>
                                                                        <small>Starting Price : AED
                                                                            {{ $project->starting_price }}</small>
                                                                        <ul class="list-unstyled">
                                                                            <li class=""><small>Bed :
                                                                                    {{ $project->bedrooms ? $project->bedrooms : '' }}
                                                                                </small></li>
                                                                            <li class=""><small>Size :
                                                                                    {{ $project->area ? $project->area : '' }}
                                                                                    {{ $project->area_unit ? $project->area_unit : 'sqft' }}</small>
                                                                            </li>
                                                                            @if (count($project->accommodations) > 0)
                                                                                <li class=""><small>Type :
                                                                                        {{ $project->accommodations->implode('name', ', ') }}</small>
                                                                                </li>
                                                                            @endif
                                                                            @if ($project->mainCommunity)
                                                                                <li class=""><small>Location
                                                                                        :
                                                                                        {{ $project->mainCommunity->name }}</small>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                        @if ($project->developer)
                                                                            <small
                                                                                class="text-secondary">{{ $project->developer->name }}</small>
                                                                        @endif
                                                                    </div>
                                                                    <div
                                                                        class="card-footer border-0 bg-white rounded-0 rounded-oneCorner">
                                                                        <div
                                                                            class="d-flex justify-content-between">
                                                                            <div class="my-auto">
                                                                                <ul class="list-unstyled  mb-0">
                                                                                    <li class="d-inline propOpt">
                                                                                        <a href="tel:{{ $project->agent ? $project->agent->contact_number : $telephone_number }}"
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
                                                                                        <a href="{{ $project->agent ? 'https://wa.me/' . $project->agent->whatsapp_number : $whatsapp }}"
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
                                                                                        <a href="mailto:{{ $project->agent ? $project->agent->email : $email }}"
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
                                                                                @if ($project->is_new_launch == 1)
                                                                                    <button type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#preRegister"
                                                                                        propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                        formName="Pre-Register Now"
                                                                                        class="btn btn-sm fs-12 btn-primary rounded-1 bookpreRegisterBtn text-uppercase px-3">Pre-Register</button>
                                                                                @else
                                                                                    <button type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#preRegister"
                                                                                        propertyUrl="{{ url('dubai-offplan' . '/' . $project->slug) }}"
                                                                                        formName="Enquire Now"
                                                                                        class="btn btn-sm fs-12 btn-primary rounded-1 bookpreRegisterBtn text-uppercase px-3">Enquire
                                                                                        Now <i
                                                                                            class="bi bi-chevron-right"></i></button>
                                                                                @endif
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
                                            <div class="text-center py-3 viewMoreProjectBtnWrapper">
                                                <button class="btn btn-primary  rounded-pill viewMoreProjectBtn px-3">View
                                                    More Projects</button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center text-primary">
                                            <p>No Project Found</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
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
                        <h2 class="text-white text-uppercase">Book A Meeting</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-5">
                    <div class="modalViewFormCont">
                        <form action="" id="modalViewForm" method="post">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Full Name*</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Full Name*">
                                    <input type="hidden" class="form-control" id="formName"
                                        value="Book A Meeting Agent">
                                </div>

                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Email*">
                                </div>

                                <div class="col-md-12">
                                    <label for="mobile" class="form-label">Mobile*</label>
                                    <input id="fullNumber" type="hidden" name="fullNumber">
                                    <input type="tel" class="form-control contField" id="telephone"
                                        name="phone" placeholder="Mobile*">

                                </div>
                                <div class="col-md-12">
                                    <label for="date" class="form-label">Prefered Date*</label>
                                    <input type="date" class="form-control" id="date"
                                        placeholder="Prefered Date*">
                                </div>
                                <div class="col-md-12">
                                    <label for="time" class="form-label">Prefered Time*</label>
                                    <input type="time" class="form-control" id="time"
                                        placeholder="Prefered Time**">
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
    $(document).ready(function() {
        var x, size_li, project_size_li;

        function changeLoadCount(media) {
            if (media.matches) {
                x = 4; // no. of items per click mobile <= 767
                $(".agentProperty").hide();
                $(".agentProject").hide();
                $(".agentProperty:lt(" + x + ")").show();
                $(".agentProject:lt(" + x + ")").show();
                size_li = $(".agentProperty").length;
                if (x => size_li) {
                    $(".viewMoreBtnWrapper").hide();
                } else {
                    $(".viewMoreBtnWrapper").show();
                }
                project_size_li = $(".agentProject").length;
                if (x => project_size_li) {
                    $(".viewMoreProjectBtnWrapper").hide();
                } else {
                    $(".viewMoreProjectBtnWrapper").show();
                }


            } else {
                x = 8; // no. of items per click in desktop >= 768
                $(".agentProperty").hide();
                $(".agentProject").hide();
                $(".agentProperty:lt(" + x + ")").show();
                $(".agentProject:lt(" + x + ")").show();
                size_li = $(".agentProperty").length;
                //   alert(size_li);
                if (x == size_li || x > size_li) {
                    $(".viewMoreBtnWrapper").hide();
                } else {
                    $(".viewMoreBtnWrapper").show();
                }
                project_size_li = $(".agentProject").length;
                if (x == project_size_li || x > project_size_li) {
                    $(".viewMoreProjectBtnWrapper").hide();
                } else {
                    $(".viewMoreProjectBtnWrapper").show();
                }
            }
        }

        var media = window.matchMedia("(max-width: 767px)");
        changeLoadCount(media);
        media.addListener(changeLoadCount);
        window.addEventListener("load resize", function() {
            changeLoadCount(media);
            media.addListener(changeLoadCount);
        });

        function loadMore() {
            $(".agentProperty").hide();
            size_li = $(".agentProperty").length;
            $(".agentProperty:lt(" + x + ")").show();
            $(".viewMoreBtn").click(function() {
                if (media.matches) {
                    x = x + 4 <= size_li ? x + 4 : size_li;
                } else {
                    x = x + x <= size_li ? x + x : size_li;
                }
                $(".agentProperty:lt(" + x + ")").show();
                if (x == size_li) {
                    $(".viewMoreBtnWrapper").hide();
                } else {
                    $(".viewMoreBtnWrapper").show();
                }
            });
        }

        // For projecat
        function loadMoreProjects() {
            $(".agentProject").hide();
            size_li = $(".agentProject").length;
            $(".agentProject:lt(" + x + ")").show();
            $(".viewMoreProjectBtn").click(function() {
                if (media.matches) {
                    x = x + 4 <= size_li ? x + 4 : size_li;
                } else {
                    x = x + x <= size_li ? x + x : size_li;
                }
                $(".agentProject:lt(" + x + ")").show();
                if (x == size_li) {
                    $(".viewMoreProjectBtnWrapper").hide();
                } else {
                    $(".viewMoreProjectBtnWrapper").show();
                }
            });
        }
        loadMore();
        loadMoreProjects();



    });
</script>
@endsection
