@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Off Plan Projects | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{ asset('frontend/assets/images/banner/homeBg.webp') }}');min-height:60vh;justify-content:end;padding-top:100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    <div class="row py-5">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center">
                                <h1 class="text-white">Off Plan Properties in Dubai</h1>
                            </div>
                            <div class="d-none d-lg-flex d-md-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Off Plan</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="bg-white p-3 rounded-3">
                                <div class="agentSearch">
                                    <div class="pcAgentForm">
                                        <form action="" method="post" id="projectSearchForm">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col my-auto">
                                                    <div class="input-group input-group-solid flex-nowrap">
                                                        <span class="input-group-text border-end-0 bg-transparent pe-1"><i
                                                                class="bi bi-search fs-13"></i></span>
                                                        <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                            <select
                                                                class="form-control propertySelect1 fs-14 form-select-solid border-start-0 rounded-start-0"
                                                                data-control="select2" id="keywords" name="keywords[]"
                                                                data-placeholder="Enter Project" multiple>
                                                                @foreach ($search as $item)
                                                                    <option value="{{ $item }}"
                                                                        @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                                            {{ $keyword == $item ? 'selected' : '' }}
                                                                        @endforeach @endif>
                                                                        {{ $item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                                    </div>
                                                </div>
                                                <div class="col my-auto">
                                                    <select class="form-select" name="community" id="community">
                                                        <option value="">Community Name</option>
                                                        @foreach ($allCommunities as $comm)
                                                            <option value="{{ $comm->id }}" @if(isset($data['community']))
                                                                {{$data['community'] == $comm->id ? 'selected' : ''}}
                                                           @endif>{{ $comm->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col my-auto">
                                                    <select class="form-select" name="developer" id="developer">
                                                        <option value="">Developer</option>
                                                        @foreach ($developers as $dev)
                                                            <option value="{{ $dev->id }}" @if(isset($data['developer']))
                                                                {{$data['developer'] == $dev->id ? 'selected' : ''}}
                                                           @endif>{{ $dev->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col my-auto">
                                                    <select class="form-select" name="accomodation" id="accomodation">
                                                        <option value="">Property Type</option>
                                                        @foreach ($accomodation as $acc)
                                                            <option value="{{ $acc->id }}" @if(isset($data['accomodation']))
                                                                {{$data['accomodation'] == $acc->id ? 'selected' : ''}}
                                                           @endif>{{ $acc->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-auto my-auto">
                                                    <button type="submit" class="btn btn-primary btnPropSearch">Find Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mobAgentForm">
                                        <form action="" method="post" id="projectSearchFormMob">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-7">
                                                    <div class="input-group input-group-solid flex-nowrap">
                                                        <span class="input-group-text  border-end-0 bg-transparent pe-1"><i
                                                                class="bi bi-search fs-13"></i></span>
                                                        <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                            <input type="hidden" name="hidden_pageMob" id="hidden_pageMob"
                                                    value="1" />
                                                            <select
                                                                class="form-control  form-control-lg propertySelect1 border-start-0 fs-14 form-select-solid rounded-start-0"
                                                                data-control="select2" id="keywordsMob" name="keywordsMob[]"
                                                                data-placeholder="Enter Project" multiple>
                                                                @foreach ($search as $item)
                                                                    <option value="{{ $item }}"
                                                                        @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                                            {{ $keyword == $item ? 'selected' : '' }}
                                                                        @endforeach @endif>
                                                                        {{ $item }}</option>
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
                                                    <button type="submit" class="btn w-100 btn-primary btnPropSearchMob">Find Now</button>
                                                </div>
                                                <div class="col-12 col-lg-4 my-auto">
                                                    <div class="advAgentMobForm d-none">
                                                        <div class="row g-1">
                                                            <div class="col-6">
                                                                <select class="form-select my-1" name="communityMob" id="communityMob">
                                                                    <option value="">Community Name</option>
                                                                    @foreach ($allCommunities as $comm)
                                                                        <option value="{{ $comm->id }}" @if(isset($data['community']))
                                                                            {{$data['community'] == $comm->id ? 'selected' : ''}}
                                                                       @endif>{{ $comm->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <select class="form-select my-1" name="developerMob" id="developerMob">
                                                                    <option value="">Developer</option>
                                                                    @foreach ($developers as $dev)
                                                                        <option value="{{ $dev->id }}" @if(isset($data['developer']))
                                                                            {{$data['developer'] == $dev->id ? 'selected' : ''}}
                                                                       @endif>{{ $dev->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12">
                                                                <select class="form-select my-1" name="accomodationMob" id="accomodationMob">
                                                                    <option value="">Property Type</option>
                                                                    @foreach ($accomodation as $acc)
                                                                        <option value="{{ $acc->id }}" @if(isset($data['accomodation']))
                                                                            {{$data['accomodation'] == $acc->id ? 'selected' : ''}}
                                                                       @endif>{{ $acc->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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
        </div>
    </section>
    {{-- projects --}}

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="d-block d-md-none d-lg-none">
                        <ul class="breadcrumbBlue text-start ps-0 mb-0">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a>Projects</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="showPropList">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="py-3 propTagDiv d-none d-lg-block d-md-block">
                            <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTab " name="tags" id="all" autocomplete="off" value="all"
                                @if(isset($data['tag']))
                                    {{$data['tag'] == 'all' ? 'checked' : ''}}
                               @endif>
                                <label class="btn btn-primary btn-darkBlue" for="all">All</label>
                            </div>

                            @foreach ($tags as $key => $tag)
                            <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTab" name="tags"
                                    id="tag{{ $key + 1 }}" autocomplete="off" value="{{ $tag->id }}" @if(isset($data['tag']))
                                    {{$data['tag'] == $tag->id ? 'checked' : ''}}
                               @endif>
                                <label class="btn btn-primary btn-darkBlue"
                                    for="tag{{ $key + 1 }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach

                        </div>
                        <div class="py-3 propTagDiv d-block d-md-none d-lg-none">
                            <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTabMob" name="tags" id="all" autocomplete="off" value="all"
                                @if(isset($data['tag']))
                                    {{$data['tag'] == 'all' ? 'checked' : ''}}
                               @endif>
                                <label class="btn btn-primary btn-darkBlue" for="all">All</label>
                            </div>

                            @foreach ($tags as $key => $tag)
                            <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTabMob" name="tagsMob"
                                    id="tagMob{{ $key + 1 }}" autocomplete="off" value="{{ $tag->id }}" @if(isset($data['tag']))
                                    {{$data['tag'] == $tag->id ? 'checked' : ''}}
                               @endif>
                                <label class="btn btn-primary btn-darkBlue"
                                    for="tagMob{{ $key + 1 }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach

                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="d-none d-lg-block d-md-block">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <ul class="nav nav-pills mb-3 viewTab" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active viewBtn" id="gridTab" data-bs-toggle="pill"
                                                data-bs-target="#gridView" tabId="grid" type="button" role="tab"
                                                aria-controls="gridView" aria-selected="true">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-grid fIcon fa-stack-1x fa-inverse"></i>
                                                </span><span class="fs-14"> Grid View</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link viewBtn" id="listTab" data-bs-toggle="pill"
                                                data-bs-target="#listView" tabId="list" type="button" role="tab"
                                                aria-controls="listView" aria-selected="false">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-list-ul fIcon fa-stack-1x fa-inverse"></i>
                                                </span><span class="fs-14"> List View</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <div class="d-flex justify-content-end">
                                        <div class="my-auto pe-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input newSwitch" type="checkbox" role="switch"
                                                    id="newSwitch" name="newSwitch" value="0">
                                                <label class="form-check-label" for="newSwitch">New Launches</label>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortBy rounded-1 pe-5"
                                                aria-label="" id="sortBy" name="sortBy">
                                                <option value="">Sort By</option>
                                                <option value="Newest">Newest</option>
                                                <option value="Lowest">Price(Lowest)</option>
                                                <option value="Highest">Price(Highest)</option>
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
                                            <label class="form-check-label" for="newSwitchMob"><input class="form-check-input newSwitchMob" type="checkbox" role="switch"
                                                id="newSwitchMob" value="0"> New Launches</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9 my-auto">
                                    <div class="">
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortByMob rounded-1 pe-5"
                                                aria-label="" id="sortByMob">
                                                <option selected>Sort By</option>
                                                <option value="Newest">Newest</option>
                                                <option value="Lowest">Price(Lowest)</option>
                                                <option value="Highest">Price(Highest)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 my-auto">
                                    <ul class="nav nav-pills d-flex justify-content-end viewTab" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active viewBtn" id="gridTab" data-bs-toggle="pill"
                                                data-bs-target="#gridView" tabId="grid" type="button" role="tab"
                                                aria-controls="gridView" aria-selected="true">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-grid fIcon fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link viewBtn" id="listTab" data-bs-toggle="pill"
                                                data-bs-target="#listView" tabId="list" type="button" role="tab"
                                                aria-controls="listView" aria-selected="false">
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
                                <div class="tab-pane fade show active" id="gridView" tabId="grid" role="tabpanel"
                                    aria-labelledby="gridTab" tabindex="0">
                                    @if (count($projects) > 0)
                                    <div class="row g-4">
                                        @foreach ($projects as $project)
                                        <div class="col-12 col-lg-3 col-md-4">
                                            <div>
                                                <a href="{{ url('dubai-offplan' . '/' . $project->slug) }}" class="text-decoration-none">
                                                    <div class="devContainer rounded-3"
                                                        style="background-image: url('{{ $project->mainImage }}')">
                                                        <div class="devLogo p-3">
                                                            <div class="d-flex justify-content-between">
                                                                @if($project->developer)
                                                                <div>
                                                                    <img src="{{ $project->developer->logo }}"
                                                                        alt="{{ $project->developer->name }}" class="img-fluid">
                                                                </div>
                                                                @endif
                                                                <div>
                                                                    @if ($project->is_new_launch == 1)
                                                                        <span
                                                                            class="badge bg-warning fw-normal text-white fs-12"><i
                                                                                class="bi bi-patch-check-fill"></i> New</span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="devDetails p-3">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="my-auto">
                                                                    <p class="mb-0 text-white">{{$project->title}}</p>
                                                                </div>

                                                                <div class="text-white border rounded-3 py-1 px-2 my-auto">
                                                                    <i class="bi bi-chevron-right"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12 col-lg-12">
                                            <nav aria-label="Page navigation example">
                                                <div class="mobPagination justify-content-center">
                                                    {{ $projects->withQueryString()->links() }}
                                                </div>
                                                <div class="pcPagination justify-content-center">
                                                    {{ $projects->withQueryString()->links() }}
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                    @else
                                        <div class="text-center">
                                            <p class="text-primary">No Project Found</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="listView" tabId="list" role="tabpanel" aria-labelledby="listTab"
                                    tabindex="0">
                                    @if (count($projects) > 0)
                                    <div class="row g-4">
                                        @foreach ($projects as $row)
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <div>
                                                <div class="card shadow rounded-3 propCard border-0">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <div class="swiper swiperPropList">
                                                                <div class="swiper-wrapper">
                                                                    @if (count($row->exteriorGallery) > 0)
                                                                    @foreach ($row->exteriorGallery as $key => $imgs)
                                                                        @if ($key < 3)
                                                                            <div class="swiper-slide">
                                                                                <div class="">
                                                                                    <center>
                                                                                        <a href="{{ url('dubai-offplan' . '/' . $row->slug) }}"
                                                                                            class="text-decoration-none">
                                                                                            <img src="{{ $imgs['path'] }}"
                                                                                                class="img-fluid propImgList  rounded-end-0 rounded-3"
                                                                                                alt="{{ $row->title }}">
                                                                                        </a>
                                                                                    </center>
                                                                                </div>
                                                                            </div>

                                                                        @else
                                                                            @break
                                                                        @endif
                                                                    @endforeach
                                                                    @elseif(count($row->interiorGallery) > 0)
                                                                    @foreach ($row->interiorGallery as $key => $imgs)
                                                                        @if ($key < 3)
                                                                            <div class="swiper-slide">
                                                                                <div class="">
                                                                                    <center>
                                                                                        <a href="{{ url('dubai-offplan' . '/' . $row->slug) }}"
                                                                                            class="text-decoration-none">
                                                                                            <img src="{{ $imgs['path'] }}"
                                                                                                class="img-fluid propImgList rounded-end-0 rounded-3"
                                                                                                alt="{{ $row->title }}">
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
                                                                                <a href="{{ url('dubai-offplan' . '/' . $row->slug) }}"
                                                                                    class="text-decoration-none">
                                                                                    <img src="{{ $row->mainImage }}"
                                                                                        class="img-fluid propImgList rounded-end-0 rounded-3"
                                                                                        alt="{{ $row->title }}">
                                                                                </a>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                    @endif

                                                                </div>
                                                                <div class="swiper-button-prev">
                                                                    <span class="fa-stack fa-lg">
                                                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                        <i
                                                                            class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="swiper-button-next me-2">
                                                                    <span class="fa-stack fa-lg">
                                                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                        <i
                                                                            class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                    </span>
                                                                </div>
                                                                @if ($row->is_new_launch == 1)
                                                                    <div
                                                                        class="badge bg-warning fw-normal text-white newBadge fs-12">
                                                                        <i class="bi bi-patch-check-fill"></i> New</div>
                                                                @endif
                                                                @if ($row->developer)
                                                                <div class="devTopLeft">
                                                                    <img src="{{ $row->developer->logo }}"
                                                                        alt="{{ $row->developer->name }}" class="img-fluid">
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="p-relative h-100">
                                                                <div class="card-body pb-5 pt-3">
                                                                    @if($row->completion_date)
                                                                    <span
                                                                        class="badge text-primary fw-normal bg-lightOlive fs-12">Delivery
                                                                        date {{$row->completion_date}}</span>
                                                                        @endif
                                                                    <a href="{{ url('dubai-offplan' . '/' . $row->slug) }}" class="text-decoration-none">
                                                                        <h5 class="text-primary fw-semibold mt-1 mb-0">{{$row->title}}
                                                                        </h5>
                                                                    </a>
                                                                    <small>Starting Price : AED {{$row->starting_price}}</small>
                                                                    <ul class="list-unstyled">
                                                                        <li class=""><small>Bed : {{ $row->bedrooms  ? $row->bedrooms : '' }} </small></li>
                                                                        <li class=""><small>Size : {{ $row->area ? $row->area : '' }}
                                                                            {{ $row->area_unit ? $row->area_unit : 'sqft' }}</small>
                                                                        </li>
                                                                        @if(count($row->accommodations) > 0)
                                                                        <li class=""><small>Type : {{$row->accommodations->implode('name', ', ')}}</small>
                                                                        </li>
                                                                        @endif
                                                                        @if($row->mainCommunity)
                                                                        <li class=""><small>Location : {{$row->mainCommunity->name}}</small>
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                    @if($row->developer)
                                                                    <small class="text-secondary">{{ $row->developer->name }}</small>
                                                                    @endif
                                                                </div>
                                                                <div
                                                                    class="card-footer border-0 bg-white rounded-0 rounded-oneCorner">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="my-auto">
                                                                            <ul class="list-unstyled  mb-0">
                                                                                <li class="d-inline propOpt">
                                                                                    <a href="tel:{{ $row->agent ? $row->agent->contact_number : $telephone_number }}"
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
                                                                                    <a href="{{ $row->agent ? 'https://wa.me/'.$row->agent->whatsapp_number : $whatsapp}}"
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
                                                                                    <a href="mailto:{{ $row->agent ? $row->agent->email : $email }}"
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
                                                                            @if ($row->is_new_launch == 1)
                                                                                <button type="button" data-bs-toggle="modal"
                                                                                    data-bs-target="#preRegister" propertyUrl="{{ url('dubai-offplan' . '/' . $row->slug) }}" formName="Pre-Register Now"
                                                                                    class="btn btn-sm fs-12 btn-primary rounded-1 bookpreRegisterBtn text-uppercase px-3">Pre-Register</button>
                                                                            @else
                                                                                <button type="button" data-bs-toggle="modal"
                                                                                    data-bs-target="#preRegister"  propertyUrl="{{ url('dubai-offplan' . '/' . $row->slug) }}" formName="Enquire Now"
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
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center">
                                                    <div class="mobPagination justify-content-center">
                                                        {{ $projects->withQueryString()->links() }}
                                                    </div>
                                                    <div class="pcPagination justify-content-center">
                                                        {{ $projects->withQueryString()->links() }}
                                                    </div>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    @else
                                        <div class="text-center">
                                            <p class="text-primary">No Project Found</p>
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
    @if(count($contents) > 0)
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    @foreach ($contents as $key => $content)
                        @if(($key + 1) % 2 == 0)
                        <div class="row colRev">
                            <div class="col-12 col-lg-12 col-md-12 my-auto">
                                <div class="mb-3">
                                    <div class="my-auto">
                                        <h5 class="mb-0 text-primary">{{$content->title}}</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="propDesc">
                                        @if($content->image)
                                            <img class="img-fluid rounded-3  float-start  widthImg100 me-3 mb-2"
                                                src="{{ $content->image }}" alt="unique properties" width="50%">
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
                                        <h5 class="mb-0 text-primary">{{$content->title}}</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="propDesc">
                                        @if($content->image)
                                            <img class="img-fluid rounded-3  float-start  widthImg100 me-3 mb-2"
                                                src="{{ $content->image }}" alt="unique properties" width="50%">
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
                                    <h2 class="accordion-header" id="faq{{$key+1}}Q">
                                        <button class="accordion-button @if($loop->first) @else collapsed @endif bg-transparent p-0 " type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{$key+1}}Ans" aria-expanded="@if($loop->first)true @else false @endif"
                                            aria-controls="faq{{$key+1}}Ans">
                                            <h6 class="text-primary">{{$faq->question}}</h6>
                                        </button>
                                    </h2>
                                    <div id="faq{{$key+1}}Ans" class="accordion-collapse collapse @if($loop->first)show @endif"
                                        aria-labelledby="faq{{$key+1}}Q" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                            <p>{{$faq->answer}}</p>
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

    <!-- Pre Register modal -->
    <div class="modal fade" id="preRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h2 class="text-white text-uppercase formName">PRE-BOOK NOW</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 col-md-5">
                            <div class="modalViewFormCont">
                                <form action="{{route('enquireForm')}}" id="modalViewForm" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Full Name*</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Full Name*" required>
                                                <input type="hidden" class="form-control" id="formName" name="formName"
                                            value="" required>
                                        <input type="hidden" class="form-control" id="propName" name="propName" value="" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Email*</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email*" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mobile" class="form-label">Mobile*</label>
                                            <input id="fullNumber" type="hidden" name="fullNumber">
                                            <input type="tel"   onkeyup="numbersOnly(this)" class="form-control contField" id="telephone"
                                                name="phone" placeholder="Mobile*" required>

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
        $(document).on('click', '.bookpreRegisterBtn', function() {
            //alert('check');
            var propName = $(this).attr("propertyUrl");
            var formName = $(this).attr("formName");
            $("#propName").val(propName);
            $("#formName").val(formName);
            $(".formName").html(formName);
        });
    </script>

<script>
    function fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/dubai-offplans?page=" + page,
            type: "POST",
            dataType: 'json',

            data: {
                page: page,
                community: community,
                developer: developer,
                accomodation: accomodation,
                tag: tag,
                exclusive: exclusive,
                sort: sort,
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
        var community = $('#community').val();
            var developer = $('#developer').val();
            var accomodation = $('#accomodation').val();
            var exclusive = $('#newSwitch').val();
            var sort = $('#sortBy').val();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTab:checked").val();
            var page = $('#hidden_page').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);
    });
    $(document).on('change', '.sortByMob', function(event) {
        var community = $('#communityMob').val();
            var developer = $('#developerMob').val();
            var accomodation = $('#accomodationMob').val();
            var exclusive = $('#newSwitchMob').val();
            var sort = $('#sortByMob').val();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTabMob:checked").val();
            var page = $('#hidden_pageMob').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);
    });
    $(document).on('change', '.btnCheckTab', function(event) {

        if (this.checked) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
        var community = $('#community').val();
            var developer = $('#developer').val();
            var accomodation = $('#accomodation').val();
            var exclusive = $('#newSwitch').val();
            var sort = $('#sortBy').val();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTab:checked").val();
            var page = $('#hidden_page').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);

    });
    $(document).on('change', '.btnCheckTabMob', function(event) {

        if (this.checked) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
        var community = $('#communityMob').val();
            var developer = $('#developerMob').val();
            var accomodation = $('#accomodationMob').val();
            var exclusive = $('#newSwitchMob').val();
            var sort = $('#sortByMob').val();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTabMob:checked").val();
            var page = $('#hidden_pageMob').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);

    });
    $(document).on('change', '.newSwitch', function(event) {
        if (this.checked) {
            $(this).attr('value', 1);
            $(this).prop('checked', true);
        } else {
            $(this).attr('value', 0);
            $(this).prop('checked', false);
        }
        var community = $('#community').val();
            var developer = $('#developer').val();
            var accomodation = $('#accomodation').val();
            var exclusive = $('#newSwitch').val();
            var sort = $('#sortBy').val();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTab:checked").val();
            var page = $('#hidden_page').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);
    });
    $(document).on('change', '.newSwitchMob', function(event) {
        if (this.checked) {
            $(this).attr('value', 1);
            $(this).prop('checked', true);
        } else {
            $(this).attr('value', 0);
            $(this).prop('checked', false);
        }
        var community = $('#communityMob').val();
            var developer = $('#developerMob').val();
            var accomodation = $('#accomodationMob').val();
            var exclusive = $('#newSwitchMob').val();
            var sort = $('#sortByMob').val();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTabMob:checked").val();
            var page = $('#hidden_pageMob').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);
    });
    $(document).ready(function() {

        $("#projectSearchForm").submit(function(e) {

            e.preventDefault();
            $("#btnPropSearch").prop("disabled", true);
            $('#hidden_page').val('1');
            var community = $('#community').val();
            var developer = $('#developer').val();
            var accomodation = $('#accomodation').val();
            var exclusive = $('#newSwitch').val();
            var sort = $('#sortBy').val();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTab:checked").val();
            var page = $('#hidden_page').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            // alert(tabId);
            fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);
        });
        $("#projectSearchFormMob").submit(function(e) {

            e.preventDefault();
            $("#btnPropSearchMob").prop("disabled", true);
            $('#hidden_pageMob').val('1');
            var community = $('#communityMob').val();
            var developer = $('#developerMob').val();
            var accomodation = $('#accomodationMob').val();
            var exclusive = $('#newSwitchMob').val();
            var sort = $('#sortByMob').val();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTabMob:checked").val();
            var page = $('#hidden_pageMob').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            // alert(tabId);
            fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);
        });
        $(document).on('click', '.mobPagination nav .pagination a', function(event) {

            event.preventDefault();
            var community = $('#communityMob').val();
            var developer = $('#developerMob').val();
            var accomodation = $('#accomodationMob').val();
            var exclusive = $('#newSwitchMob').val();
            var sort = $('#sortByMob').val();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTabMob:checked").val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            var page = $(this).attr('href').split('page=')[1];

            $('#hidden_pageMob').val(page);

            $('li').removeClass('active');

            $(this).parent().addClass('active');

            fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);

        });
        $(document).on('click', '.pcPagination nav .pagination a', function(event) {

            event.preventDefault();
            var community = $('#community').val();
            var developer = $('#developer').val();
            var accomodation = $('#accomodation').val();
            var exclusive = $('#newSwitch').val();
            var sort = $('#sortBy').val();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var tag = $(".btnCheckTab:checked").val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            var page = $(this).attr('href').split('page=')[1];

            $('#hidden_page').val(page);

            $('li').removeClass('active');

            $(this).parent().addClass('active');

            fetch_data(page, community, developer, accomodation, tag, exclusive,
                sort, keywords, tabId);

        });


    });
</script>
@endsection
