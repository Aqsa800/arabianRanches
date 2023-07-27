@extends('frontend.layout.master')
@if ($property->meta_title != '')
    @section('title', $property->meta_title)
@else
    @section('title', $property->name)
@endif
@if ($property->meta_description != '')
    @section('pageDescription', $property->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($property->meta_keyword != '')
    @section('pageKeyword', $property->meta_keyword)
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
                                    <li><a href="{{ route('properties') }}">Properties</a></li>
                                    <li><a>{{ $property->name }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Property Gallery --}}
    @if (count($property->subImages) > 0)
        <section class="mb-3 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="d-block d-lg-none d-md-none">
                            <div class="swiper swiperPropList">
                                <div class="swiper-wrapper">
                                    @foreach ($property->subImages as $imgs)
                                        <div class="swiper-slide">
                                            <div class="">
                                                <center>
                                                    <a href="{{ $imgs['path'] }}" class="text-decoration-none"
                                                        data-toggle="lightbox" data-gallery="feat2-gallery">
                                                        <img src="{{ $imgs['path'] }}" alt="{{ $property->name }}"
                                                            class="img-fluid rounded-3">
                                                    </a>
                                                </center>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                    </span>
                                </div>
                                <div class="swiper-button-next me-2">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                    </span>
                                </div>
                                @if ($property->exclusive == 1)
                                    <div class="newBadge">
                                        <span class="badge bg-warning fw-normal text-white fs-12">
                                            Exclusive</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-none d-lg-block d-md-block">
                            <div class="gallerContentSingle">
                                <div class="gallery-img">
                                    @foreach ($property->subImages as $key => $imgs)
                                        @if ($loop->first)
                                            <div class="firstImg">
                                                <a href="{{ $imgs['path'] }}" class="text-decoration-none"
                                                    data-toggle="lightbox" data-gallery="feat-gallery">
                                                    <img src="{{ $imgs['path'] }}" alt="{{ $property->name }}"
                                                        class="img-fluid rounded-3">
                                                </a>
                                                <div class="image_count_content">
                                                    <div class="me-3">
                                                        <a href="{{ $imgs['path'] }}"
                                                            class="text-decoration-none text-black" data-toggle="lightbox"
                                                            data-gallery="feat-gallery">
                                                            <i class="bi bi-camera2 me-2 fs-18 lh-sm"><span
                                                                    class="image_count ms-2 fs-14">Show
                                                                    {{ count($property->subImages) }} photos</span></i>

                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a data-bs-toggle="modal" data-bs-target="#viewMap" class="text-decoration-none cursor-pointer text-black">
                                                            <i class="bi bi-geo-alt fs-18 lh-sm"><span
                                                                    class="image_count ms-2 fs-14">View on map</span></i>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($key == 1)
                                            <div class="sideImg">
                                                <a href="{{ $imgs['path'] }}" class="text-decoration-none"
                                                    data-toggle="lightbox" data-gallery="feat-gallery">
                                                    <img src="{{ $imgs['path'] }}" alt="{{ $property->name }}"
                                                        class="img-fluid rounded-3">
                                                </a>
                                            </div>
                                        @endif
                                        @if ($key == 2)
                                            <div class="sideImg">
                                                <a href="{{ $imgs['path'] }}" class="text-decoration-none"
                                                    data-toggle="lightbox" data-gallery="feat-gallery">
                                                    <img src="{{ $imgs['path'] }}" alt="{{ $property->name }}"
                                                        class="img-fluid rounded-3">
                                                </a>
                                            </div>
                                        @endif
                                        @if ($key != 1 && $key != 2 && !$loop->first)
                                            <div class="d-none">
                                                <?php for($i=1; $i<=8; $i++){ ?>
                                                <a href="{{ $imgs['path'] }}" class="text-decoration-none"
                                                    data-toggle="lightbox" data-gallery="feat-gallery">
                                                </a>
                                                <?php } ?>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- Property Details --}}
    <section class="my-3">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-lg-8 col-md-12">
                    <div class="d-flex justify-content-between py-3 border-bottom">
                        <div>
                            <div class="secHead text-center text-md-start text-lg-start mb-3">
                                <h4 class="text-primary mb-1">{{ $property->name }} {{ $property->sub_title ? ' - '.$property->sub_title : '' }}</h4>
                                <h6 class="mb-1">{{ $property->reference_number }}</h6>
                                    <small>{{ $property->address ? $property->address : $property->communities->name . ' - ' . $property->emirate }}</small>
                            </div>
                            <div>
                                <ul
                                    class="list-unstyled text-center text-md-start text-lg-start propListSmall fs-18 lh-1 my-2">
                                    <li class="d-inline"><small class="pe-1 pe-md-3 pe-lg-3"><i class="fa fa-bed"
                                                aria-hidden="true"></i>
                                            {{ $property->bedrooms > 0 ? $property->bedrooms : 'Studio' }} </small>
                                    </li>
                                    <li class="d-inline"><small class="px-1 px-md-3 px-lg-3"><i class="fa fa-bath"
                                                aria-hidden="true"></i>
                                            {{ $property->bathrooms > 0 ? $property->bathrooms : '' }}
                                        </small>
                                    </li>
                                    <li class="d-inline"><small class="px-1 px-md-3 px-lg-3"><i
                                                class="bi bi-arrows-fullscreen"></i>
                                            {{ $property->area > 0 ? $property->area : '' }}
                                            SQ.FT</small></li>
                                    <li class="d-inline"><small class="px-1 px-md-3 px-lg-3"><i class="bi bi-tag"></i>
                                            {{ $property->currency ? $property->currency : 'AED' }}
                                            {{ number_format($property->price) }}</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if ($property->exclusive == 1)
                            <div class="d-none d-md-block d-lg-bolck">
                                <p><span class="badge bg-warning fs-14 px-1 px-md-3 px-lg-3 fw-normal">Exclusive</span></p>
                            </div>
                        @endif
                    </div>
                    <div class="py-4 border-bottom">
                        <h6 class="text-primary">Description</h6>
                        <div class="propDesc">
                            <span class="textLessProp d-block">
                            {!! substr(nl2br((preg_replace('/<\/?div[^>]*\>/i', '', $property->description))), 0, 600) !!}
                            </span>
                            <span class="textExtraProp d-none">
                                {!! nl2br((preg_replace('/<\/?div[^>]*\>/i', '', $property->description))) !!}
                            </span>
                        </div>

                        <a class="text-primary readMorePropBtn cursor-pointer">View All Details</a>
                        <a class="text-primary readLessPropBtn cursor-pointer  d-none">View
                            Less</a>

                        <div class="py-3">
                            @if($property->qr)
                            <img src="{{ $property->qr }}"
                            alt="{{ $property->name }}"
                            class="img-fluid" width="100px">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12">
                    <div class="bg-lightBlue p-4 rounded-3">
                        <div class="row g-2 border-bottom pb-3">
                            <div class="col-7 col-lg-8 my-auto">
                                <div class="agentDesc">
                                    <h5 class="text-primary text-capitalize mb-0">
                                        {{ $property->agent->name }}</h5>
                                    <p class="mb-0">{{ $property->agent->designation }}</p>
                                </div>
                            </div>
                            @if ($property->agent->image)
                                <div class="col-5 col-lg-4 my-auto">
                                    <div class="agntImage">
                                        <center><img src="{{ $property->agent->image }}"
                                                alt="{{ $property->agent->name }}"
                                                class="img-fluid rounded-circle agentImageSingle">
                                        </center>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row g-1">
                            <div class="col-12 col-lg-12">
                                <div class="pt-3">
                                    @if (count($property->agent->languages) > 0)
                                        <div class="d-flex">
                                            <div class="my-auto me-3"><i class="bi bi-translate fs-18"></i></div>
                                            <div class="my-auto fs-14">
                                                {{ $property->agent->languages->implode('name', ',') }}</div>
                                        </div>
                                    @endif
                                    <div class="d-flex">
                                        <div class="my-auto me-3"><i class="bi bi-clock fs-18"></i></div>
                                        <div class="my-auto fs-14">Arrange a Viewing, 24/7</div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="my-auto me-3"><i class="bi bi-calendar fs-18"></i></div>
                                        <div class="my-auto fs-14">Choose a Date & Time</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-lg-4  col-md-4 my-auto">
                                <div class="d-none d-lg-block d-md-block mt-3">
                                    <a href="tel:{{ $property->agent->contact_number }}"
                                        class="btn btn-primary w-100 rounded-2 text-decoration-none"><i
                                            class="fa fa-phone"></i></a>
                                </div>
                                <div class="d-block d-lg-none d-md-none mt-3">
                                    <a href="tel:{{ $property->agent->contact_number }}"
                                        class="btn btn-primary w-100 rounded-2 text-decoration-none"><i
                                            class="fa fa-phone"></i></a>
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 col-md-4  col-md-4  my-auto">
                                <div class="d-none d-lg-block d-md-block mt-3">
                                    <a href="mailto:{{ $property->agent->email }}"
                                        class="btn btn-primary    w-100 rounded-2 text-decoration-none"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                                <div class="d-block d-lg-none d-md-none mt-3">
                                    <a href="mailto:{{ $property->agent->email }}"
                                        class="btn btn-primary    w-100 rounded-2 text-decoration-none"><i
                                            class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 col-md-4  my-auto">
                                <div class="d-none d-lg-block d-md-block mt-3">
                                    <a href="https://wa.me/{{ $property->agent->whatsapp_number }}" target="_blank"
                                        class="btn btn-success  w-100 rounded-2 text-decoration-none"><i
                                            class="fa fa-whatsapp"></i></a>
                                </div>
                                <div class="d-block d-lg-none d-md-none mt-3">
                                    <a href="https://wa.me/{{ $property->agent->whatsapp_number }}" target="_blank"
                                        class="btn btn-success  w-100 rounded-2 text-decoration-none"><i
                                            class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12  my-auto">
                                <div class="mt-3">
                                    <button data-bs-toggle="modal" data-bs-target="#bookView"
                                        propertyUrl="{{ url('property' . '/' . $property->slug) }}"
                                        class="btn btn-primary  w-100 rounded-2 bookViewingBtn"><i
                                            class="fa fa-calendar"></i> Book A Viewing</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12  my-auto">
                                <div class="mt-4">
                                    <iframe
                                        src="https://maps.google.com/maps?q={{ $property->address_latitude ? $property->address_latitude : '' }},{{ $property->address_longitude ? $property->address_longitude : '' }}&z=17&ie=UTF8&iwloc=&output=embed"
                                        width="100%" height="200" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="">
                                    <a data-bs-toggle="modal" data-bs-target="#viewMap"
                                        class="btn btn-primary rounded-bottom rounded-0  w-100 cursor-pointer  text-decoration-none">View
                                        Location Map</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Amenities --}}
    @if (count($property->amenities) > 0)
        <section class="my-5" id="Amenities">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="row ">

                            <div class="col-12 col-lg-12 col-md-12  my-auto">

                                <div class="mb-3">
                                    <div class="my-auto">
                                        <h5 class="mb-0 text-primary">Amenities</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="row g-3">
                                        @foreach ($property->amenities as $item)
                                            <div class="col-4 col-lg-2 col-md-3">
                                                <div class="d-flex justify-content-start h-100 shadow-sm p-2 rounded-3">
                                                    <div class="mb-1 me-3">
                                                        <center>
                                                            <img src="{{ !empty($item->image) ? asset($item->image) : asset('frontend/assets/images/icons/home.png') }}"
                                                                alt="{{ $property->name }}" class="img-fluid amenityImg">
                                                        </center>
                                                    </div>
                                                    <div class="text-primary my-auto">
                                                        <p class="fs-12 text-primary  fw-semibold mb-0">
                                                            {{ $item->name }}</p>
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
            </div>
        </section>
    @endif
    {{-- Mortgage Calculator --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="secHead text-start mb-3">
                        <h4 class="text-primary text-uppercase mb-0">Mortgage Calculator</h2>
                            <small>Get an estimation of how much you will pay</small>
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-md-12">
                    <div class="bg-lightOlive p-2 p-lg-4 p-md-4 rounded-3">
                        <div class="row">
                            <div class="col-12 col-lg-7 col-md-7 my-auto borderEnd">
                                <div class="p-2 p-lg-4 p-md-4">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 my-auto">
                                                <label for="" class="fs-14 mb-2">Property
                                                    Price({{ $property->currency ? $property->currency : 'AED' }})</label>
                                                <input type="text"
                                                    class="form-control border-0 form-control-lg  fs-14 mb-3"
                                                     onkeyup="formatCurrency(this)" name="prop_price" id="prop_price" maxlength="11" value="{{ number_format($property->price) }}" readonly>
                                            </div>
                                            <div class="col-12 col-lg-6 my-auto">
                                                <label for="" class="fs-14 mb-2">Down
                                                    Payment({{ $property->currency ? $property->currency : 'AED' }})</label>
                                                <div class="input-group input-group-solid flex-nowrap">
                                                    <input type="text" class="form-control w-100 mb-3  fs-14 border-0 border-end" id="downpayment" onkeyup="formatCurrency(this)" name="downpayment" value="{{number_format((20 / 100) * $property->price)}}" style="border-right:0px;">
                                                        <div class="input-group-addon">
                                                            <input type="number" class="bg-white form-control   border-0 ps-1 pe-0 rounded-0  mb-3 custom-range" min="20" step="1" name="down_pay" max="80" id="down_pay" value="20">
                                                        </div>
                                                        <div class="input-group-addon">
                                                                <span class=" form-control bg-white ps-0 rounded-0 rounded-end border-0 mb-3 fs-16">%</span>
                                                        </div>
                                                   
                                                </div>
                                                <small class="feedback text-danger fs-12"></small>
                                            </div>
                                            <div class="col-12 col-lg-6 my-auto">
                                                <label for="" class="fs-14 mb-2">Loan Duration</label>
                                                <div class="input-group">
                                                    <input type="number"
                                                        class="form-control border-0 form-control-lg  fs-14 mb-3"
                                                        id="loan_duration" name="loan_duration" value="25" min="1" max="25"
                                                        style="border-right:0px;">
                                                    <div class="input-group-text bg-white  border-0 ps-0 mb-3">
                                                        <span class="fs-14">Years</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 my-auto">
                                                <label for="" class="fs-14 mb-2">Interest Rate</label>
                                                <div class="input-group">
                                                    <input type="number"
                                                        class="form-control border-0 form-control-lg  fs-14 mb-3"
                                                        name="rate" id="rate" value="4.99" 
                                                        style="border-right:0px;">
                                                    <div class="input-group-text bg-white  border-0 ps-0 mb-3">
                                                        <span class="fs-14">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 col-md-5 my-auto">
                                <div class="p-2 p-lg-4 p-md-4">
                                    <div class=" mb-3">
                                        <p class="mb-0">Monthly Repayments</p>
                                        <h3 class="text-primary">AED <span class="prop_price">12,000</span> </h3>
                                        <small class="fs-12">*Estimated initial monthly payments based on a AED
                                            1,000,000 purchase price with a 4.8% fixed interest rate.</small>
                                    </div>
                                    <div>
                                        <button type="submit" data-bs-toggle="modal"
                                            data-bs-target="#mortgageConsultation"
                                            class="btn btn-md w-100 btn-primary">Get
                                            Consultation</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Properties --}}
    @if (count($similarProp) > 0)
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="secHead text-start mb-3">
                                    <h4 class="text-primary">Other properties which may interest you</h2>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="swiper swiperThumpLatest py-3 px-1">
                                    <div class="swiper-wrapper">
                                        @foreach ($similarProp as $row)
                                            <div class="swiper-slide">
                                                <div>
                                                    <div class="card border-0 shadow">
                                                        <a href="{{ url('property' . '/' . $row->slug) }}"
                                                            class="text-decoration-none"><img src="{{ $row->mainImage }}"
                                                            class="card-img-top" alt="Unique Properties"></a>
                                                        <div class="card-body">
                                                            <a href="{{ url('property' . '/' . $row->slug) }}"
                                                                class="text-decoration-none"><h5 class="text-primary mb-1">
                                                                {{ substr(strip_tags($row->name), 0, 25) . '...' }}</h5></a>
                                                            <ul class="list-unstyled propListSmall lh-1 my-2">
                                                                <li class="d-inline">
                                                                    <small>{{ $row->bedrooms > 0 ? $row->bedrooms : '' }}
                                                                        Beds</small></li>
                                                                <li class="d-inline">
                                                                    <small>{{ $row->bathrooms > 0 ? $row->bathrooms : '' }}
                                                                        Baths</small>
                                                                </li>
                                                                <li class="d-inline">
                                                                    <small>{{ $row->area > 0 ? $row->area : '' }}
                                                                        SQ.FT</small></li>
                                                            </ul>
                                                            <small>{{ $row->currency ? $row->currency : 'AED' }}
                                                                {{ number_format($row->price) }}</small>
                                                            <div class="d-flex justify-content-between pt-2">
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
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#bookView"
                                                                        propertyUrl="{{ url('property' . '/' . $row->slug) }}"
                                                                        class="btn  fs-12 btn-primary rounded-1 text-uppercase px-3 bookViewingBtn">Book
                                                                        A Viewing</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        @endforeach


                                    </div>
                                    <div class="swiper-button-prev">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                            <i class="bi bi-chevron-left text-primary mx-1 fs-14 fa-stack-1x"></i>
                                        </span>
                                    </div>
                                    <div class="swiper-button-next me-2">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                                            <i class="bi bi-chevron-right text-primary mx-1 fs-14 fa-stack-1x"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- View Map-->
    <div class="modal fade" id="viewMap" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-primary">
                <div class="modal-header border-0 bg-primaryLight justify-content-center">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-circle text-white fa-2x"></i></button>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="">
                                <iframe
                                        src="https://maps.google.com/maps?q={{ $property->address_latitude ? $property->address_latitude : '' }},{{ $property->address_longitude ? $property->address_longitude : '' }}&z=17&ie=UTF8&iwloc=&output=embed"
                                        width="100%" height="600" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Mortgage Consultation-->
    <div class="modal fade" id="mortgageConsultation" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                                <h2 class="text-white text-uppercase">Get Free Consultation</h2>
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
                                                value="Mortgage Consultation">
                                            <input type="hidden" class="form-control" id="propName"  name="propName"
                                                value="{{ url('property' . '/' . $property->slug) }}">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Email*</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email*" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mobile" class="form-label">Mobile*</label>
                                            <input id="fullNumber" type="hidden" name="fullNumber">
                                            <input type="tel" class="form-control contField" id="telephone"
                                                name="phone" placeholder="Mobile*" required>

                                        </div>
                                        <div class="col-md-12">
                                            <label for="date" class="form-label">Message</label>
                                            <textarea name="message" id="message" rows="4" class="form-control contField rounded-3"></textarea>
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
                                <form action="{{route('bookViewing')}}" id="modalViewForm" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Full Name*</label>
                                            <input type="text" class="form-control" id="name" name="nameCon2"
                                                placeholder="Full Name*" required>
                                            <input type="hidden" class="form-control" id="formName" name="formFrom"
                                                value="Book A Viewing Properties" required>
                                            <input type="hidden" class="form-control" id="propName" name="propName" value="" required>
                                        </div>
    
                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Email*</label>
                                            <input type="email" class="form-control" id="email" name="emailCon2" required
                                                placeholder="Email*">
                                        </div>
    
                                        <div class="col-md-12">
                                            <label for="mobile" class="form-label">Mobile*</label>
                                            <input id="fullNumber" type="hidden" name="fullNumber">
                                            <input type="tel"   onkeyup="numbersOnly(this)"  class="form-control contField" id="telephone"
                                                name="phone" placeholder="Mobile*" required>
    
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
        $( document ).ready(function() {
            
            calculate();
});
        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function formatCurrency(input) {
            var input_val = input.value;
            // don't validate empty input
            if (input_val === "") {
                return;
            }

            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.selectionStart;

            // check for decimal
            if (input_val.indexOf(".") >= 0) {
                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);



                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;
            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;

            }

            // send updated string to input
            input.value = input_val;

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input.setSelectionRange(caret_pos, caret_pos);
        }

        function formatDown(input) {
            var input_val = input;
            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = input_val;;

            return input_val;
        }
        $("#prop_price").on("input", function() {
            var price = parseInt($(this).val().replace(/,/g, ''));

            if (isNaN(price)) {
                var down = 0;
                var perc = 20;
            } else if (price > 0 && price < 50000000) {
                var down2 = (20 / 100) * price;
                var downpay = down2;
                var perc = 20;
                var down = formatDown(down2.toString());
            } else {

                var down1 = (30 / 100) * price;
                var downpay = down1;
                var perc = 30;
                var down = formatDown(down1.toString());
            }
            // alert("hi");
            
            $("#downpayment").val(down);
            $("#down_pay").attr("min", perc);
            $("#down_pay").val(perc);
            calculate();
        });
        $("#rate").on("input", function() {
            var perc = $(this).val();
            calculate();
        });

        $(document).on('input ', '#loan_duration', function() {
            var newval = $(this).val();
            calculate();
        });
        $(document).on('input ', '#down_pay', function() {
            
            var newval = $(this).val();
            var price = parseInt($("#prop_price").val().replace(/,/g, ''));
            var down2 = (newval / 100) * price;
            var downpay = down2;
            var down = formatDown(down2.toString());
            $("#downpayment").val(down);
            calculate();
        });
        $(document).on('input', '#downpayment', function() {
            var newPerc = parseInt($(this).val().replace(/,/g, ''));
            
            var priceNew = parseInt($("#prop_price").val().replace(/,/g, ''));
            minPrice = (20 / 100) * priceNew;
            maxPrice = (80 / 100) * priceNew;
           
            if(newPerc < maxPrice && newPerc > minPrice){
                alert("hi");
                var perc = (newPerc/priceNew ) * 100;
                $("#down_pay").val(perc);
                calculate();
            }else{
            //    $(".feedback").html("Downpayment should be between 20% to 80% of price");
            }
            
        });

        function calculate() {
            
            //Look up the input and output elements in the document
            var price = parseInt($("#prop_price").val().replace(/,/g, ''));
            var rate = $("#rate").val();
           
            var downPay =  parseInt($("#downpayment").val().replace(/,/g, ''));
           
            var term = $("#loan_duration").val();
            
            var amountBorrowed = price - downPay;
            var pmt = calculateMortgage(amountBorrowed, rate, term);
            $(".prop_price").html(pmt);
            // var priceMonth = ((price - downPay)  * ( Math.pow(rate *(1 + rate), month) ) )/ ( (Math.pow(1 + rate,month) ) - 1 );
            
        }

        function calculateMortgage(p, r, n) {
            r = percentToDecimal(r);
            n = yearsToMonths(n);
            var pmt = (r * p) / (1 - (Math.pow((1 + r), (-n))));
            return parseFloat(pmt.toFixed(2));
        }

        function percentToDecimal(percent) {
            return (percent / 12) / 100;
        }

        function yearsToMonths(year) {
            return year * 12;
        }
    </script>
@endsection
