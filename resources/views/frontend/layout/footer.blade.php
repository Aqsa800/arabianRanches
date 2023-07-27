<footer class="footerDiv p-relative">
    <section class="bg-primary py-5 border-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="pcFoot">
                        <div class="row">
                            <div class="col-12 col-lg-3 col-md-12">
                                <div class="mb-1">
                                    <a class="" href="{{ url('/') }}">
                                        <img src="@if ($footer_logo) {{ $footer_logo }} @else {{ asset('frontend/assets/images/logo_foot.svg') }} @endif"
                                            alt="Unique Properties Logo" class="img-fluid" width="120px">
                                    </a>
                                </div>
                                <div class="text-white">
                                    <ul class="socialIcons list-unstyled">
                                        @if ($facebook)
                                            <li class="d-inline">
                                                <a href="{{ $facebook }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-facebook"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($twitter)
                                            <li class="d-inline">
                                                <a href="{{ $twitter }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-twitter"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($instagram)
                                            <li class="d-inline">
                                                <a href="{{ $instagram }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-instagram"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($youtube)
                                            <li class="d-inline">
                                                <a href="{{ $youtube }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="bi bi-youtube"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($linkedin)
                                            <li class="d-inline">
                                                <a href="{{ $linkedin }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-linkedin"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($tiktok)
                                            <li class="d-inline">
                                                <a href="{{ $tiktok }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="bi bi-tiktok"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="d-flex text-white">
                                    <div class="my-auto">
                                        <a href="{{ route('terms-conditions') }}"
                                            class="text-decoration-none text-white fs-14">Terms &
                                            Conditions</a>
                                        &nbsp| &nbsp
                                    </div>
                                    <div class="my-auto">
                                        <a href="{{ route('privacy-policy') }}"
                                            class="text-decoration-none text-white fs-14">Privacy &
                                            Cookies</a>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-white fs-14">Copyright © Unique Properties</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="footLink text-white">
                                    <h5 class="">Insights</h5>
                                    <ul class="list-unstyled">
                                        <li class="">
                                            <a href="{{route('invest-in-dubai')}}" class="text-decoration-none text-white">
                                                Why Invest in Dubai
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('about-dubai')}}" class="text-decoration-none text-white">
                                                About Dubai
                                            </a>
                                        </li>
                                        {{-- <li class="">
                                            <a href="{{route('facts-figures')}}" class="text-decoration-none text-white">
                                                Facts & Figures
                                            </a>
                                        </li> --}}
                                        <li class="">
                                            <a href="{{route('buyers-guide')}}" class="text-decoration-none text-white">
                                                Buyer's Guide
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('sellers-guide')}}" class="text-decoration-none text-white">
                                                Seller's Guide
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('relocating-to-dubai')}}" class="text-decoration-none text-white">
                                                Relocating to Dubai
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('communities') }}"
                                                class="text-decoration-none text-white">
                                                Area Guide
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('floorplans') }}"
                                                class="text-decoration-none text-white">
                                                Floor Plans
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('faqs') }}"
                                                class="text-decoration-none text-white">
                                                FAQ
                                            </a>
                                        </li>
                                    </ul>
                                    <h5 class="">Sell / Rent</h5>
                                    <ul class="list-unstyled">
                                        <li class="">
                                            <a href="{{route('sell-your-property')}}" class="text-decoration-none text-white">
                                                Sell Your Property
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('lease-your-property')}}" class="text-decoration-none text-white">
                                                Lease Your Property
                                            </a>
                                        </li>
                                        {{-- <li class="">
                                            <a href="{{route('property-valuation')}}" class="text-decoration-none text-white">
                                                Free Valuation
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('rent-property')}}" class="text-decoration-none text-white">
                                                Rent a Property
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="footLink text-white">
                                    <h5 class="">Services</h5>
                                    <ul class="list-unstyled">
                                        {{-- <li class="">
                                            <a href="{{ route('services') }}"
                                                class="text-decoration-none text-white">
                                                Services Overview
                                            </a>
                                        </li> --}}
                                        @foreach ($serviceFoot as $service)
                                            @if(count($service->childServies)>0)
                                            <li class="">
                                                <a data-bs-toggle="collapse" href="#collapseExample_{{ $service->id }}" role="button" aria-expanded="false" aria-controls="collapseExample_{{ $service->id }}"
                                                    class="text-decoration-none text-white">
                                                    {{ $service->name }}
                                                </a>
                                                @if ($service->childServies)
                                                <ul  class="collapse" id="collapseExample_{{ $service->id }}">
                                                    @foreach ($service->childServies as $child)

                                                        <li class="">
                                                            <a href="{{ url('service/' . $child->slug) }}"
                                                                class="text-decoration-none text-white">
                                                                {{ $child->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @else
                                            <li class="">
                                                <a href="{{ url('service/' . $service->slug) }}"
                                                    class="text-decoration-none text-white">
                                                    {{ $service->name }}
                                                </a>
                                            </li>
                                            @endif
                                        @endforeach
                                        {{-- <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                Property Investment
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                Property Rentals
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                Property Management
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                Interior Designs & Fit Outs
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                Conveyancing & PRO Services
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                VIP Concierge Services
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                Golden Visa
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="text-decoration-none text-white">
                                                Mortgage & Financing
                                            </a>
                                        </li> --}}
                                    </ul>
                                    <h5 class="">About Us</h5>
                                    <ul class="list-unstyled">
                                        <li class="">
                                            <a href="{{ url('about-us/#overview') }}"
                                                class="text-decoration-none text-white">
                                                Company Overview
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ url('about-us/#awards') }}"
                                                class="text-decoration-none text-white">
                                                Awards
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ url('about-us/#ceo') }}"
                                                class="text-decoration-none text-white">
                                                Message from CEO
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ url('about-us/#team') }}"
                                                class="text-decoration-none text-white">
                                                Meet The Team
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ url('about-us/#mission') }}"
                                                class="text-decoration-none text-white">
                                                Mission & Vision
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="footLink text-white">
                                    <h5 class="">Featured Communities</h5>
                                    <ul class="list-unstyled">
                                        <li class="">
                                            <a href="{{ route('properties') }}"
                                                class="text-decoration-none text-white">
                                                Property Search
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('dubai-offplans') }}"
                                                class="text-decoration-none text-white">
                                                Off-Plan
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('dubai-offplans') }}"
                                                class="text-decoration-none text-white">
                                                Latest Projects
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('developers') }}"
                                                class="text-decoration-none text-white">
                                                Developers
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('resale') }}" class="text-decoration-none text-white">
                                                Resale Property
                                            </a>
                                        </li>
                                        {{-- <li class="">
                                            <a href="{{route('luxury-homes')}}" class="text-decoration-none text-white">
                                                Luxury Homes
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('commercial-real-estate') }}" class="text-decoration-none text-white">
                                                Commercial Real Estate
                                            </a>
                                        </li> --}}
                                    </ul>
                                    <h5 class="">Media</h5>
                                    <ul class="list-unstyled">
                                        {{-- <li class="">
                                            <a href="{{ url('media/news') }}"
                                                class="text-decoration-none text-white">
                                                Latest News
                                            </a>
                                        </li> --}}
                                        <li class="">
                                            <a href="{{ url('media/blogs') }}"
                                                class="text-decoration-none text-white">
                                                Blogs
                                            </a>
                                        </li>
                                        {{-- <li class="">
                                            <a href="{{ url('media/videos') }}"
                                                class="text-decoration-none text-white">
                                                Video Gallery
                                            </a>
                                        </li> --}}

                                    </ul>
                                    <h5 class="">Contact Us</h5>
                                    <ul class="list-unstyled">
                                        <li class="">
                                            <a href="{{ route('contact-us') }}"
                                                class="text-decoration-none text-white">
                                                Reach Out
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('careers') }}" class="text-decoration-none text-white">
                                                Careers
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mobFoot">
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <div class="mb-1">
                                    <a class="" href="{{ url('/') }}">
                                        <center><img
                                                src="@if ($footer_logo) {{ $footer_logo }} @else {{ asset('frontend/assets/images/logo_foot.svg') }} @endif"
                                                alt="Unique Properties Logo" class="img-fluid" width="120px">
                                        </center>
                                    </a>
                                </div>
                                <div class="text-white mb-4">
                                    <ul class="socialIcons d-flex list-unstyled justify-content-center">
                                        @if ($facebook)
                                            <li class="d-inline">
                                                <a href="{{ $facebook }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-facebook"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($twitter)
                                            <li class="d-inline">
                                                <a href="{{ $twitter }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-twitter"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($instagram)
                                            <li class="d-inline">
                                                <a href="{{ $instagram }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-instagram"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($youtube)
                                            <li class="d-inline">
                                                <a href="{{ $youtube }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="bi bi-youtube"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($linkedin)
                                            <li class="d-inline">
                                                <a href="{{ $linkedin }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="fa fa-linkedin"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($tiktok)
                                            <li class="d-inline">
                                                <a href="{{ $tiktok }}" class="text-decoration-none text-white"
                                                    target="_blank">
                                                    <span class="socialBorder"><i class="bi bi-tiktok"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="accordion footAccordion accordion-flush" id="accordionExample">
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="foot1">
                                            <button class="accordion-button bg-transparent p-0 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#foot1Link"
                                                aria-expanded="true" aria-controls="foot1Link">
                                                <h6 class="">Insights</h6>
                                            </button>
                                        </h2>
                                        <div id="foot1Link" class="accordion-collapse collapse"
                                            aria-labelledby="foot1" data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <div class="footLink text-white">

                                                    <ul class="list-unstyled">
                                                        <li class="">
                                                            <a href="{{route('invest-in-dubai')}}" class="text-decoration-none text-white">
                                                                Why Invest in Dubai
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('about-dubai')}}" class="text-decoration-none text-white">
                                                                About Dubai
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('facts-figures')}}" class="text-decoration-none text-white">
                                                                Facts & Figures
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('buyers-guide')}}" class="text-decoration-none text-white">
                                                                Buyer's Guide
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('sellers-guide')}}" class="text-decoration-none text-white">
                                                                Seller's Guide
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('relocating-to-dubai')}}" class="text-decoration-none text-white">
                                                                Relocating to Dubai
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('communities') }}"
                                                                class="text-decoration-none text-white">
                                                                Area Guide
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('floorplans') }}"
                                                                class="text-decoration-none text-white">
                                                                Floor Plans
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('faqs') }}"
                                                                class="text-decoration-none text-white">
                                                                FAQ
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="foot2">
                                            <button class="accordion-button bg-transparent p-0 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#foot2Link"
                                                aria-expanded="false" aria-controls="foot2Link">
                                                <h6 class="">Sell / Rent</h6>
                                            </button>
                                        </h2>
                                        <div id="foot2Link" class="accordion-collapse collapse"
                                            aria-labelledby="foot2" data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <div class="footLink text-white">
                                                    <ul class="list-unstyled">
                                                        <li class="">
                                                            <a href="{{route('sell-your-property')}}" class="text-decoration-none text-white">
                                                                Sell Your Property
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('lease-your-property')}}" class="text-decoration-none text-white">
                                                                Lease Your Property
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('property-valuation')}}" class="text-decoration-none text-white">
                                                                Free Valuation
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('rent-property')}}" class="text-decoration-none text-white">
                                                                Rent a Property
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="foot3">
                                            <button class="accordion-button bg-transparent p-0 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#foot3Link"
                                                aria-expanded="false" aria-controls="foot3Link">
                                                <h6 class="">Our Services</h6>
                                            </button>
                                        </h2>
                                        <div id="foot3Link" class="accordion-collapse collapse"
                                            aria-labelledby="foot3" data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <div class="footLink text-white">

                                                    <ul class="list-unstyled">
                                                        <li class="">
                                                            <a href="{{ route('services') }}"
                                                                class="text-decoration-none text-white">
                                                                Services Overview
                                                            </a>
                                                        </li>
                                                        @foreach ($serviceFoot as $service)
                                                            <li class="">
                                                                <a href="{{ url('service/' . $service->slug) }}"
                                                                    class="text-decoration-none text-white">
                                                                    {{ $service->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                        {{-- <li class="">
                                                            <a href="" class="text-decoration-none text-white">
                                                                Property Rentals
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="" class="text-decoration-none text-white">
                                                                Property Management
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="" class="text-decoration-none text-white">
                                                                Interior Designs & Fit Outs
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="" class="text-decoration-none text-white">
                                                                Conveyancing & PRO Services
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="" class="text-decoration-none text-white">
                                                                VIP Concierge Services
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="" class="text-decoration-none text-white">
                                                                Golden Visa
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="" class="text-decoration-none text-white">
                                                                Mortgage & Financing
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="foot4">
                                            <button class="accordion-button bg-transparent p-0 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#foot4Link"
                                                aria-expanded="false" aria-controls="foot4Link">
                                                <h6 class="">About Us</h6>
                                            </button>
                                        </h2>
                                        <div id="foot4Link" class="accordion-collapse collapse"
                                            aria-labelledby="foot4" data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <div class="footLink text-white">

                                                    <ul class="list-unstyled">
                                                        <li class="">
                                                            <a href="{{ url('about-us/#overview') }}"
                                                                class="text-decoration-none text-white">
                                                                Company Overview
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('about-us/#awards') }}"
                                                                class="text-decoration-none text-white">
                                                                Awards
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('about-us/#ceo') }}"
                                                                class="text-decoration-none text-white">
                                                                Message from CEO
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('about-us/#team') }}"
                                                                class="text-decoration-none text-white">
                                                                Meet The Team
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('about-us/#mission') }}"
                                                                class="text-decoration-none text-white">
                                                                Mission & Vision
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="foot6">
                                            <button class="accordion-button bg-transparent p-0 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#foot6Link"
                                                aria-expanded="false" aria-controls="foot6Link">
                                                <h6 class="">Featured Communities</h6>
                                            </button>
                                        </h2>
                                        <div id="foot6Link" class="accordion-collapse collapse"
                                            aria-labelledby="foot6" data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <div class="footLink text-white">

                                                    <ul class="list-unstyled">
                                                        <li class="">
                                                            <a href="{{ route('properties') }}"
                                                                class="text-decoration-none text-white">
                                                                Property Search
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('dubai-offplans') }}"
                                                                class="text-decoration-none text-white">
                                                                Off-Plan
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('dubai-offplans') }}"
                                                                class="text-decoration-none text-white">
                                                                Latest Projects
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('developers') }}"
                                                                class="text-decoration-none text-white">
                                                                Developers
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('resale') }}"
                                                                class="text-decoration-none text-white">
                                                                Resale Property
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('luxury-homes')}}" class="text-decoration-none text-white">
                                                                Luxury Homes
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('commercial-real-estate') }}" class="text-decoration-none text-white">
                                                                Commercial Real Estate
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="foot5">
                                            <button class="accordion-button bg-transparent p-0 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#foot5Link"
                                                aria-expanded="false" aria-controls="foot5Link">
                                                <h6 class="">Media</h6>
                                            </button>
                                        </h2>
                                        <div id="foot5Link" class="accordion-collapse collapse"
                                            aria-labelledby="foot5" data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <div class="footLink text-white">


                                                    <ul class="list-unstyled">
                                                        <li class="">
                                                            <a href="{{ url('media/news') }}"
                                                                class="text-decoration-none text-white">
                                                                Latest News
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('media/blogs') }}"
                                                                class="text-decoration-none text-white">
                                                                Blogs
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('media/videos') }}"
                                                                class="text-decoration-none text-white">
                                                                Video Gallery
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="accordion-item border-0 pb-2">
                                        <h2 class="accordion-header" id="foot7">
                                            <button class="accordion-button bg-transparent p-0 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#foot7Link"
                                                aria-expanded="false" aria-controls="foot7Link">
                                                <h6 class="">Contact Us</h6>
                                            </button>
                                        </h2>
                                        <div id="foot7Link" class="accordion-collapse collapse"
                                            aria-labelledby="foot7" data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-0">
                                                <div class="footLink text-white">


                                                    <ul class="list-unstyled">
                                                        <li class="">
                                                            <a href="{{ route('contact-us') }}"
                                                                class="text-decoration-none text-white">
                                                                Reach Out
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('careers') }}"
                                                                class="text-decoration-none text-white">
                                                                Careers
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
            </div>
        </div>
    </section>
    <section class="bg-primary copyFoot py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="text-white text-center d-none d-md-block d-lg-block">
                        <p class="mb-0 fs-14">
                            @if ($copyright_description)
                                {{ $copyright_description }}
                            @else
                                {{ "Unique Properties Real Estate Broker Is a company registered in Dubai,
                                                            United Arab Emirates ( License No. 613873), By Square, Building 3, Office 306, business Bay,
                                                            Dubai, PO Box 55720 We are regulated by the Real Estate Regulatory Agency under office
                                                            number 1815." }}
                            @endif
                        </p>
                    </div>
                    <div class="d-block d-md-none d-lg-none">
                        <div class="d-flex justify-content-center text-white">
                            <div class="my-auto">
                                <a href="{{ route('terms-conditions') }}"
                                    class="text-decoration-none text-white fs-14">Terms &
                                    Conditions</a>
                                &nbsp| &nbsp
                            </div>
                            <div class="my-auto">
                                <a href="{{ route('privacy-policy') }}"
                                    class="text-decoration-none text-white fs-14">Privacy &
                                    Cookies</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-white fs-14">Copyright © Unique Properties <?php echo date('Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- navbarMenu Footer fixed  --}}
    <div class="bg-white footNav d-none">
        <div class="row py-1">
            <div class="col-4 my-auto text-center">
                <button class="navbar-toggler text-center border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbarMob" aria-controls="offcanvasNavbarMob">
                    <center><img src="{{ asset('frontend/assets/images/icons/menufoot.png') }}"
                            alt="Unique Properties Logo" class="img-fluid" width="20px"></center>
                    <p class="my-auto text-primary fs-12">Menu</p>
                </button>
                <div class="offcanvas bg-primary offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbarMob"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header border-bottom">
                        <div>
                            <a class="" href="{{ url('/') }}">
                                <center>
                                    <img src="{{ asset('frontend/assets/images/logo.png') }}"
                                        alt="Unique Properties Logo" class="img-fluid" width="90px">
                                </center>
                            </a>
                        </div>
                        <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                            aria-label="Close"><i class="bi bi-x-circle text-white"></i></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav text-start offCanvasNav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dubai-offplans') }}">Off Plan</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resale') }}">Resale</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rent') }}">Rental</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('services') }}">Services</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('media') }}">Media</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#bookAmeeting">Book a Meeting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#findPropModal">Find a Property</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-4 my-auto text-center">

                @if (Route::current()->getName() == "project" || Route::current()->getName()=="property")

                    <button class="navbar-toggler text-center bg-white border-0" type="button"  data-bs-toggle="modal"
                    data-bs-target="#EnquireNowModal">
                        <center><img src="{{ asset('frontend/assets/images/icons/search.png') }}"
                                alt="Unique Properties Logo" class="img-fluid" width="20px"></center>
                        <p class="my-auto text-primary fs-12">Enquire Now</p>
                    </button>
                @else
                    <button class="navbar-toggler text-center border-0" type="button" data-bs-toggle="modal"
                        data-bs-target="#findPropModal">
                        <center><img src="{{ asset('frontend/assets/images/icons/search.png') }}"
                                alt="Unique Properties Logo" class="img-fluid" width="20px"></center>
                        <p class="my-auto text-primary fs-12">Find a Property</p>
                    </button>
                @endif
            </div>
            <div class="col-4 my-auto text-center">
                <button class="text-center border-0 bg-white" type="button" data-bs-toggle="modal"
                    data-bs-target="#bookAmeeting">
                    <center><img src="{{ asset('frontend/assets/images/icons/video.png') }}"
                            alt="Unique Properties Logo" class="img-fluid" width="20px"></center>
                    <p class="my-auto text-primary fs-12">Book a Meeting</p>
                </button>
            </div>
        </div>

    </div>
</footer>
<div class="social-sticky">
    <div class="d-flex">
        <div class="socialDivFoot d-none">
            <ul class="list-unstyled mb-0">
                <li class="d-inline me-2">
                    <a href="tel:{{ $telephone_number ? $telephone_number : $contact_number }}" rel="noreferrer"
                        class="text-decoration-none">
                        <img src="{{ asset('frontend/assets/images/icons/phone.png') }}" class="img-fluid"
                            alt="Unique Peoperties" width="65">
                    </a>
                </li>
                <li class="d-inline me-2">
                    <a href="{{ $whatsapp ? $whatsapp : '' }}" target="_blank" rel="noreferrer"
                        class="text-decoration-none">
                        <img src="{{ asset('frontend/assets/images/icons/whatsapp.webp') }}" class="img-fluid"
                            alt="Unique Peoperties" width="65">
                    </a>
                </li>
            </ul>

        </div>
        <div class="expandFoot">
            <img src="{{ asset('frontend/assets/images/icons/chat.png') }}" class="img-fluid cursor-pointer"
                alt="Unique Peoperties" width="65">
        </div>
        <div class="hideFoot d-none">
            <img src="{{ asset('frontend/assets/images/icons/cancel.png') }}" class="img-fluid cursor-pointer"
                alt="Unique Peoperties" width="65">
        </div>

    </div>


</div>
<!-- Book A Meeting Modal -->

<div class="modal fade" id="bookAmeeting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg modalBookMeet ">
        <div class="modal-content">
            <div class="modal-header border-0 justify-content-end p-1">
                <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                        class="bi bi-x-circle text-primary"></i></button>
            </div>
            <div class="modal-body border p-0 rounded-4 m-2">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-md-12 border-end">
                        <div class="border-bottom">
                            <div class="p-3">
                                <center><img src="{{ asset('frontend/assets/images/logo.png') }}"
                                        alt="Unique Properties" class="img-fluid" width="150"></center>
                            </div>
                        </div>
                        <div class="p-3">
                            <p class="fw-semibold mb-0">Unique Properties</p>
                            <h2 class="text-primary fw-semibold">Live meeting with Sales Team</h2>
                            <small class="text-secondary"><i class="bi bi-clock-fill"></i> 30 min</small>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-md-12">
                        <div class="calenderDiv p-4">
                            <form id="bookAviewing" action="{{route('bookViewing')}}" method="POST">
                                @csrf
                                <input id="formFrom" name="formFrom" type="hidden" value="Book A Viewing" required>
                                <div class="step-1">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <h5 class="text-start">Select a Date & Time</h5>
                                        </div>

                                        <div class="col-md-12 newcol py-2">
                                            <div id="calendar"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="timepic">
                                                <b>
                                                    <p class="ths_date"><?php echo date('D M Y'); ?></p>
                                                </b>
                                                <input type="hidden" name="id" value="">
                                                <input type="hidden" name="ths_date" id="ths_date" required>
                                                <input type="hidden" name="ths_time" id="ths_time" required>
                                                <div class="listitem">
                                                    <?php
                                            $start_time         = date('Y-m-d')." 09:00";
                                            $end_time           = date('Y-m-d')." 18:00";
                                            $start_timestamp    = strtotime($start_time);
                                            $end_timestamp      = strtotime($end_time);
                                            $cur_date_time      = date('Y-m-d H:i');
                                            //echo date('Y-m-d H:i');
                                            for($i=$start_timestamp; $i<=$end_timestamp;){
                                                //if($i>strtotime($cur_date_time)){
                                                $cur_time = date('H:i A',$i);
                                            ?>
                                                    <div class="pickitem">
                                                        <button type="button" class="timeitem"
                                                            value="{{ $cur_time }}">{{ $cur_time }}</button>
                                                        <button class="confirm-button" type="button"
                                                            value="{{ $cur_time }}">Confirm</button>
                                                    </div>
                                                    <?php
                                                //}
                                                $i = strtotime('+30 minutes', $i);
                                            }
                                            ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="step-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-primary">Enter Details</h6>
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input type="text" name="nameCon2" id="nameCon2"
                                                    class="form-control mb-2" placeholder="Enter your name"
                                                    autocomplete="off" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input type="email" name="emailCon2" id="emailCon2"
                                                    class="form-control mb-2" placeholder="Enter your email"
                                                    autocomplete="off" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number*</label>
                                                <input id="fullNumber3" type="hidden" name="fullNumber">
                                                    <input type="tel" class="form-control mb-2" id="telephoneNew3"
                                                        name="phone" onkeyup="numbersOnly(this)"  placeholder="Enter your Phone Number" autocomplete="off"
                                                        required>
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <input type="text" name="messageCon2" id="messageCon2"
                                                    class="form-control mb-2" onkeyup="lettersOnly(this)" placeholder="Message" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary rounded-pill px-5 float-end btnContact2">Book A
                                            Meeting</button>
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

<!-- Newsletter Modal -->
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content bg-lightBlue">
            <div class="modal-header border-0 justify-content-end p-1">
                <button type="button" class="bg-transparent newsletterModalBtn border-0 p-0" data-bs-dismiss="modal"
                    aria-label="Close"><i class="bi bi-x-square fa-2x text-primary"></i></button>
            </div>
            <div class="modal-body pb-5 px-5">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 my-auto">
                        <div class="">
                            <div class="">
                                <center><img src="{{ asset('frontend/assets/images/email.png') }}"
                                        alt="Unique Properties" class="img-fluid"></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 my-auto">
                        <div class="">
                            <h2 class="text-primary mb-3 fw-semibold">Subscribe to our Newsletter</h2>
                            <div class="subscribeFormCont">
                                <form action="{{route('subscribeForm')}}" id="subscribeForm" method="post">
                                    @csrf
                                    <div class="">
                                        <input type="email"
                                            class="form-control fs-14 form-control-lg mb-3 rounded-pill" name="email" id="email"
                                            placeholder="Enter Your Email">
                                            <input type="hidden" class="form-control" id="formName" name="formName"
                        value="Subscribe to Newsletter" required>
                                        <button class="btn btn-primary btn-lg fs-14  rounded-pill px-5"
                                            type="submit">Sign
                                            up</button>
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

<!-- Find Property modal -->
<div class="modal fade" id="findPropModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h2 class="text-white text-uppercase">Find A Property</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 col-md-8">
                        <div class="modalViewFormCont">
                            <ul class="nav findPropTab justify-content-center nav-pills mb-3" id="pills-tabFindProp"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pillsFind-offplan-tab" data-bs-toggle="pill"
                                        data-bs-target="#pillsFind-offplan" type="button" role="tab"
                                        aria-controls="pillsFind-offplan" aria-selected="true">Off-plan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pillsFind-resale-tab" data-bs-toggle="pill"
                                        data-bs-target="#pillsFind-resale" type="button" role="tab"
                                        aria-controls="pillsFind-resale" aria-selected="false">Resale</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pillsFind-exclusive-tab" data-bs-toggle="pill"
                                        data-bs-target="#pillsFind-exclusive" type="button" role="tab"
                                        aria-controls="pillsFind-exclusive" aria-selected="false">Exclusive</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pillsFind-rent-tab" data-bs-toggle="pill"
                                        data-bs-target="#pillsFind-rent" type="button" role="tab"
                                        aria-controls="pillsFind-rent" aria-selected="false">Rentals</button>
                                </li>
                            </ul>
                            <div class="tab-content findPropertyTab" id="pills-tabFindProp">
                                <div class="tab-pane  fade show active" id="pillsFind-offplan" role="tabpanel"
                                    aria-labelledby="pillsFind-offplan-tab" tabindex="0">
                                    <form action="{{route('dubai-offplans')}}" id="" method="post">
                                        @csrf
                                        <div class="row g-3 justify-content-center">
                                            <div class="col-md-8">
                                                @php
                                                    $projectName = App\Models\Project::mainProject()->pluck('title')->toArray();
                                                    $search =  $projectName;

                                                @endphp
                                                <select class="form-control  form-control-lg ps-3 propertySelect" id="keySearch" name="keywords[]"
                                                    data-placeholder="Put any Keyword..." multiple>
                                                    @foreach ($search as $item)
                                                        <option value="{{ $item }}">
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-lightBlue text-uppercase px-5">Search</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane  fade" id="pillsFind-resale" role="tabpanel"
                                    aria-labelledby="pillsFind-resale-tab" tabindex="0">
                                    <form action="{{route('resale')}}" id="" method="post">
                                        @csrf
                                        <div class="row g-3 justify-content-center">
                                            <div class="col-md-8">
                                                @php
                                                $community =  App\Models\Community::pluck('id','name')->toArray();
                                                $searchnew =  $community;
                                                @endphp
                                                <select class="form-control  form-control-lg ps-3 propertySelect" id="keySearch2" name="keywords[]"
                                                    data-placeholder="Put any Keyword..." multiple>
                                                    @foreach ($searchnew as $keyNew => $itemNew)
                                                        <option value="{{ $itemNew }}">
                                                            {{ $keyNew }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-lightBlue text-uppercase px-5">Search</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane  fade" id="pillsFind-exclusive" role="tabpanel"
                                    aria-labelledby="pillsFind-exclusive-tab" tabindex="0">
                                    <form action="{{route('properties')}}" id="" method="post">
                                        @csrf
                                        <div class="row g-3 justify-content-center">
                                            <div class="col-md-8">
                                                <input type="hidden" name="exclusive" value="1">
                                                @php
                                                $community =  App\Models\Community::pluck('id','name')->toArray();
                                                $search =  $community;

                                                @endphp
                                                <select class="form-control  form-control-lg ps-3 propertySelect" id="keySearch3" name="keywords[]"
                                                    data-placeholder="Put any Keyword..." multiple>
                                                    @foreach ($search as $key => $item)
                                                        <option value="{{ $item }}">
                                                            {{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-lightBlue text-uppercase px-5">Search</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane  fade" id="pillsFind-rent" role="tabpanel"
                                    aria-labelledby="pillsFind-rent-tab" tabindex="0">
                                    <form action="{{route('rent')}}" id="" method="post">
                                        @csrf
                                        <div class="row g-3 justify-content-center">
                                            <div class="col-md-8">
                                                @php
                                                $community =  App\Models\Community::pluck('id','name')->toArray();
                                                $search =  $community;
                                                @endphp
                                                <select class="form-control  form-control-lg ps-3 propertySelect" id="keySearch4" name="keywords[]"
                                                    data-placeholder="Put any Keyword..." multiple>
                                                    @foreach ($search as $key => $item)
                                                        <option value="{{ $item }}">
                                                            {{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-lightBlue text-uppercase px-5">Search</button>
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
</div>

{{-- Enquire Now  --}}
<div class="modal fade" id="EnquireNowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h2 class="text-white text-uppercase">Enquire Now</h2>
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
                                            placeholder="Full Name*">
                                        <input type="hidden" class="form-control" id="formName" name="formName"
                                            value="Enquire Now Form">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email*">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="mobile" class="form-label">Mobile*</label>
                                        <input id="fullNumber2" type="hidden" name="fullNumber">
                                        <input type="tel"  onkeyup="numbersOnly(this)" class="form-control contField" id="telephoneNew"
                                            name="phone" placeholder="Mobile*">

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
{{-- slider js --}}
{{-- slick --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- SwiperJS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
{{-- country code --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"
    integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- Lightbox --}}
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
{{-- Jivo Chat --}}
{{-- <script src="//code.jivosite.com/widget/aRLIU6qsyb" async></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
    defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>

     $(document).ready(function() {

        const downloadURI = (uri, name) => {
            console.log(uri)
                const link = document.createElement("a");
                link.download = uri.substring(uri.lastIndexOf('/')+1);
                link.href = uri;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }

            toastr.options.timeOut = 10000;
            toastr.options.closeButton = true;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
                @if(Session::has('downloadingFile'))
                var path =  '<?php echo Session::get('downloadingFile') ?>';
                downloadURI(path, 'test')
                @endif
            @endif
        });

        $(document).ready(function() {

        $(".propertySelect").kendoMultiSelect({
            autoClose: false,
            tagMode: "single",
            change: function() {
                var selectedValues = this.value();
                // alert(selectedValues);
                var currentTagMode = this.options.tagMode;
                var newTagMode = currentTagMode;
                if (selectedValues.length <= 2) {
                    newTagMode = "multiple";
                } else {
                    newTagMode = "single"
                }
                if (newTagMode != currentTagMode) {
                    this.value([])
                    this.setOptions({
                        tagMode: newTagMode
                    });
                    this.value(selectedValues);
                }
            }
        });
        $(".propertySelect1").kendoMultiSelect({
            autoClose: false,
            tagMode: "single",
            change: function() {
                var selectedValues = this.value();

                var currentTagMode = this.options.tagMode;
                var newTagMode = currentTagMode;
                if (selectedValues.length <= 1) {
                    newTagMode = "multiple";
                } else {
                    newTagMode = "single"
                }
                if (newTagMode != currentTagMode) {
                    this.value([])
                    this.setOptions({
                        tagMode: newTagMode
                    });
                    this.value(selectedValues);
                }
            }
        });

        $("#optional").kendoMultiSelect({
            autoClose: false
        });
    });

</script>
<script>
    function numbersOnly(input){
	var regex = /[^0-9+]/g;
	input.value = input.value.replace(regex, "");
    }
    function lettersOnly(input){
        var regex = /[^a-zA-Z0-9-|,?.'& !:/()]/g;
        input.value = input.value.replace(regex, "");
    }
    $(document).on('click', '.bookBtn', function() {
        //alert('check');
        $('.timepic').hide();
        $('.newcol').removeClass('col-md-7').addClass('col-md-12');
        $('.step-1').show();
        $('.step-2').hide();
        $('.pickitem ').removeClass('active')

    });
    $('#calendar').datepicker({
        inline: true,
        minDate: new Date(),
        firstDay: 1,
        showOtherMonths: true,
        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        onSelect: function(dateText) {
            $(".modalBookMeet").addClass("modalBookView");
            $('.timepic').show();
            $(".ths_date").text(this.value);
            $("#ths_date").val(this.value);
            $('.newcol').removeClass('col-md-12').addClass('col-md-7');
        }
    });

    $(".notiClose").click(function() {
        $('.notification-top-bar').css('display', 'none');
        $('.contNoti').removeClass('mt-5 mt-lg-2 mt-md-3');
    });
    $(document).on('click', '.timeitem', function() {
        $("#ths_time").val($(this).val());
        $('.pickitem').removeClass('active');
        $(this).parent('.pickitem').addClass('active');
    });
    $(document).on('click', '.confirm-button', function() {
        $("#ths_time").val($(this).val());
        $('.step-1').hide();
        $('.step-2').show();
    });
    $(document).on('click', '.close', function() {
        $('.timepic').hide();
        $('.newcol').removeClass('col-md-7').addClass('col-md-12');
        $('.step-2').hide();
        $('.step-1').show();

    });
    $(document).on('click', '.expandFoot', function() {
        $('.socialDivFoot').removeClass('d-none').addClass('d-block');
        $('.hideFoot').removeClass('d-none').addClass('d-block');
        $('.expandFoot').addClass('d-none');

    });
    $(document).on('click', '.scroll-btn', function() {
        $(".masonryNew").animate({
                scrollTop: $(".masonryNew ").scrollTop() + 200,
            },
            'slow');

    });
    $(document).on('click', '.hideFoot', function() {
        $('.socialDivFoot').removeClass('d-block').addClass('d-none');
        $('.hideFoot').removeClass('d-block').addClass('d-none');
        $('.expandFoot').removeClass('d-none').addClass('d-block');

    });
    let newsletterVal = 0;
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    $(window).on('resize scroll', function() {

        if ($('#newsletterSection').isInViewport() && sessionStorage["PopupShown"] != 'yes') {
            $('#newsletterModal').modal('show');
            newsletterVal = 1;
        } else {
            $('#newsletterModal').modal('hide');
        }
    });
    $(".newsletterModalBtn").click(function(e) {
        $('#newsletterModal').modal('hide');
        e.preventDefault();
        sessionStorage["PopupShown"] = 'yes'; //Save in the sessionStorage if the modal has been shown
    });
</script>
<script>
    var swiper = new Swiper(".awardSlider", {
        slidesPerView: 5,
        spaceBetween: 20,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },
    });

    $('.swiperPropLatest').slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        draggable: true,
        autoplay: true,
        autoplaySpeed: 2000,
    });
    var swiperThumb = new Swiper(".swiperThumpLatest", {
        spaceBetween: 20,
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            750: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            990: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 20,

            },
        },
    });


    var swiper = new Swiper(".gallerySlider", {
        slidesPerView: 1,
        spaceBetween: 10,
        grid: {
            rows: 2,
            fill: "row",
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 20,
                grid: {
                    rows: 2,
                    fill: "row",
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 2,
                spaceBetween: 20,
                grid: {
                    rows: 2,
                    fill: "row",
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },
    });
    var swiper = new Swiper(".amenitySlider", {
        slidesPerView: 1,
        spaceBetween: 10,
        grid: {
            rows: 2,
            fill: "row",
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 10,
                grid: {
                    rows: 2,
                    fill: "row",
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 3,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1000: {
                slidesPerView: 3,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
        },
    });
    var swiper = new Swiper(".communitySlider", {
        slidesPerView: 1,
        spaceBetween: 10,
        grid: {
            rows: 2,
            fill: "row",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                grid: {
                    rows: 1,
                    fill: "row",
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 2,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1000: {
                slidesPerView: 3,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },
    });
    var swiper = new Swiper(".swiperFeatProp", {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
            1200: {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },
    });
    var swiper = new Swiper(".swiperProDet", {
        slidesPerView: 3,
        spaceBetween: 10,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },
    });
    var swiper = new Swiper(".developerSlider", {
        slidesPerView: 3,
        spaceBetween: 10,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 3,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },
    });
    var swiper = new Swiper(".serviceSliderMore", {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
        },
    });
    var swiper = new Swiper(".serviceSlider", {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 20,
        autoplay: {
            delay: 2500
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: false,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    enabled: false,
                },
            },
        },
    });

    function initSwiper() {
        var swiper10 = new Swiper(".swiperPropList", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            grabCursor: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });
    }
    var swiper = new Swiper(".developerProject", {
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 3000,
        },
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 1.2,
        spaceBetween: 100,
        coverflowEffect: {
            rotate: 0,
            stretch: 100,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 1.2,
                spaceBetween: 100,
                navigation: {
                    enabled: false,
                },
            },
            1200: {
                slidesPerView: 1.2,
                spaceBetween: 100,
                navigation: {
                    enabled: false,
                },
            },
        },

    });
    var swiper = new Swiper(".agentSwiperLess", {
        loop: true,
    speed: 1000,
    autoplay: {
        delay: 3000,
    },
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 2,
    slidesPerView: 'auto',

    breakpoints: {
            0: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 30,
                    depth: 20,
                    modifier: 10,
                    slideShadows: false,
                },
            },
            750: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 20,
                    depth: 10,
                    modifier: 10,
                    slideShadows: false,
                },
            },
            990: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 35,
                    depth: 20,
                    modifier: 10,
                    slideShadows: false,
                },
            },
            1200: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 35,
                    depth: 20,
                    modifier: 10,
                    initialSlide: 1,
                    slideShadows: false,
                },
            },
        },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    });
    var swiper = new Swiper(".agentSwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        initialSlide: 2,
        slidesPerGroup: 1,
        loop: true,
    speed: 1000,
    autoplay: {
        delay: 3000,
    },
        arrows: true,

        breakpoints: {
            0: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 30,
                    depth: 20,
                    modifier: 10,
                    slideShadows: false,
                },
            },
            750: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 20,
                    depth: 10,
                    modifier: 10,
                    slideShadows: false,
                },
            },
            990: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 35,
                    depth: 20,
                    modifier: 10,
                    slideShadows: false,
                },
            },
            1200: {
                coverflowEffect: {
                    rotate: 0,
                    stretch: 35,
                    depth: 20,
                    modifier: 10,
                    initialSlide: 1,
                    slideShadows: false,
                },
            },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper7 = new Swiper(".galleryCommunitySlider", {
        spaceBetween: 30,
        slidesPerView: 4,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
             1200: {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },

    });
    var swiper5 = new Swiper(".swiperAwards", {
        spaceBetween: 20,
        slidesPerView: 5,
        slidesPerGroup: 1,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        breakpoints: {
            "@0.00": {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            "@0.75": {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            "@1.00": {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            "@1.50": {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
        },

    });
    var swiper5 = new Swiper(".testiSwiper", {
        spaceBetween: 30,
        slidesPerView: 2,
        slidesPerGroup: 2,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            750: {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            990: {
                slidesPerView: 2,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
            1200: {
                slidesPerView: 2,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },

    });
    var swiper6 = new Swiper(".counterSliderMob", {
        spaceBetween: 30,
        slidesPerView: 1,
        slidesPerGroup: 1,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
    var swiper7 = new Swiper(".counterSlider", {
        spaceBetween: 30,
        slidesPerView: 1,
        slidesPerGroup: 1,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            "@0.00": {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            "@0.75": {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            "@1.00": {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
            "@1.50": {
                slidesPerView: 5,
                spaceBetween: 20,
                navigation: {
                    enabled: false,
                },
            },
        },
    });

</script>
<script>
    var input = document.querySelector("#telephone");

    intlTelInput(input, {
        autoHideDialCode: true,
        autoPlaceholder: "ON",
        dropdownContainer: document.body,
        formatOnDisplay: true,
        hiddenInput: "full_number",
        initialCountry: "auto",
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        preferredCountries: ['UAE'],
        separateDialCode: true,
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                success(countryCode);
            });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });
    var iti = window.intlTelInputGlobals.getInstance(input);

    input.addEventListener('input', function() {
        var fullNumber = iti.getNumber();

        $("#fullNumber").val(fullNumber);
    });
    var input2 = document.querySelector("#telephoneNew");
    intlTelInput(input2, {
        autoHideDialCode: true,
        autoPlaceholder: "ON",
        dropdownContainer: document.body,
        formatOnDisplay: true,
        hiddenInput: "full_number2",
        initialCountry: "auto",
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        preferredCountries: ['UAE'],
        separateDialCode: true,
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode1 = (resp && resp.country) ? resp.country : "";
                success(countryCode1);
            });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });
    var iti2 = window.intlTelInputGlobals.getInstance(input2);

    input2.addEventListener('input', function() {
        var fullNumber2 = iti2.getNumber();

        $("#fullNumber2").val(fullNumber2);
    });
    var input3 = document.querySelector("#telephoneNew3");
    intlTelInput(input3, {
        autoHideDialCode: true,
        autoPlaceholder: "ON",
        dropdownContainer: document.body,
        formatOnDisplay: true,
        hiddenInput: "full_number3",
        initialCountry: "auto",
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        preferredCountries: ['UAE'],
        separateDialCode: true,
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode1 = (resp && resp.country) ? resp.country : "";
                success(countryCode1);
            });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });
    var iti2 = window.intlTelInputGlobals.getInstance(input3);

    input2.addEventListener('input', function() {
        var fullNumber3 = iti2.getNumber();

        $("#fullNumber3").val(fullNumber3);
    });


    var input4= document.querySelector("#telephone4");

    intlTelInput(input4, {
        autoHideDialCode: true,
        autoPlaceholder: "ON",
        dropdownContainer: document.body,
        formatOnDisplay: true,
        hiddenInput: "full_number",
        initialCountry: "auto",
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        preferredCountries: ['UAE'],
        separateDialCode: true,
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                success(countryCode);
            });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });
    var iti4 = window.intlTelInputGlobals.getInstance(input4);

    input4.addEventListener('input', function() {
        console.log('llll')
        var fullNumber4 = iti4.getNumber();

        $("#fullNumber4").val(fullNumber4);
    });
</script>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        // alert("hi");
        var currentScrollPos = window.pageYOffset;
        if (currentScrollPos == 0) {
            document.getElementById("navStickyBar").classList.remove('d-block');
            document.getElementById("navStickyBar").classList.add('d-none');
            if (window.location.pathname.split('/')[1] ==  "/project") {
                document.getElementById("navStickyBarSingle").classList.remove('d-block');
                document.getElementById("navStickyBarSingle").classList.add('d-none');
            }
            if (window.location.pathname == "/properties" || window.location.pathname == "/rent" || window.location.pathname == "/resale") {
                document.getElementById("singlePropertySearch").classList.remove('singlePropertySearch');
            }
            if (window.location.pathname.split('/')[1] == "agent") {
                document.getElementById("agentStickyPcCont").classList.remove('agentStickyPcCont');
                $(".agentStickySearch").removeClass('d-lg-block').addClass('d-lg-none');
                document.getElementById("agentStickySearch").classList.remove('agentStickySearch');

                $(".agentTitle").removeClass('d-block').addClass('d-none');
            }
        } else if (prevScrollpos > currentScrollPos) {
            document.getElementById("mainNav").classList.add('d-none');
            document.getElementById("navStickyBar").classList.add('d-block');
            document.getElementById("navStickyBar").classList.remove('d-none');
            if (window.location.pathname.split('/')[1] ==  "/project") {
                document.getElementById("navStickyBarSingle").classList.remove('d-none');
                document.getElementById("navStickyBarSingle").classList.add('d-block');
            }
            if (window.location.pathname == "/properties" || window.location.pathname == "/rent" || window.location.pathname == "/resale") {
                document.getElementById("singlePropertySearch").classList.add('singlePropertySearch');
            }
            if (window.location.pathname.split('/')[1] == "agent") {
                document.getElementById("agentStickyPcCont").classList.add('agentStickyPcCont');
                document.getElementById("agentStickySearch").classList.add('agentStickySearch');
                $(".agentStickySearch").removeClass('d-lg-none').addClass('d-lg-block');
                $(".agentTitle").removeClass('d-none').addClass('d-block');
            }
        } else {
            document.getElementById("mainNav").classList.remove('d-none');
            document.getElementById("navStickyBar").classList.remove('d-block');
            document.getElementById("navStickyBar").classList.add('d-none');
            if (window.location.pathname.split('/')[1] ==  "/project") {
                document.getElementById("navStickyBarSingle").classList.add('d-none');
                document.getElementById("navStickyBarSingle").classList.remove('d-block');
            }
            if (window.location.pathname == "/properties" || window.location.pathname == "/rent" || window.location.pathname == "/resale") {
                document.getElementById("singlePropertySearch").classList.remove('singlePropertySearch');
            }
            if (window.location.pathname.split('/')[1] == "agent") {
                document.getElementById("agentStickyPcCont").classList.remove('agentStickyPcCont');
                $(".agentStickySearch").removeClass('d-lg-block').addClass('d-lg-none');
                document.getElementById("agentStickySearch").classList.remove('agentStickySearch');

                $(".agentTitle").removeClass('d-block').addClass('d-none');
            }
        }
        prevScrollpos = currentScrollPos;
    };

    if (window.location.pathname == "/" || window.location.pathname.split('/')[1] == "developer") {

        var counted = 0;

        window.onscroll = function() {

        var currentScrollPos = window.pageYOffset;
        if (currentScrollPos == 0) {
            document.getElementById("navStickyBar").classList.remove('d-block');
            document.getElementById("navStickyBar").classList.add('d-none');
        } else if (prevScrollpos > currentScrollPos) {
            document.getElementById("mainNav").classList.add('d-none');
            document.getElementById("navStickyBar").classList.add('d-block');
            document.getElementById("navStickyBar").classList.remove('d-none');

        } else {
            document.getElementById("mainNav").classList.remove('d-none');
            document.getElementById("navStickyBar").classList.remove('d-block');
            document.getElementById("navStickyBar").classList.add('d-none');

        }
        prevScrollpos = currentScrollPos;

            var oTop = $('#counter').offset().top - window.innerHeight;

            if (counted == 0 && $(window).scrollTop() > oTop) {
                $('.counter').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },

                        {

                            duration: 2000,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                                //alert('finished');
                            }

                        });
                });
                counted = 1;

            }

        };
    }
</script>
<script>
    $(".agentAdvbtn").click(function() {
        $(".advAgentMobForm").removeClass("d-none");
        $(".agentAdvbtn").addClass("d-none");
        $(".agentAdvMinbtn").addClass("d-block");
        $(".advAgentMobForm").addClass("d-block");
        $(".agentAdvbtn").removeClass("d-block");
        $(".agentAdvMinbtn").removeClass("d-none");
    });
    $(".agentAdvMinbtn").click(function() {
        $(".advAgentMobForm").removeClass("d-block");
        $(".agentAdvMinbtn").removeClass("d-block");
        $(".agentAdvbtn").removeClass("d-none");
        $(".advAgentMobForm").addClass("d-none");
        $(".agentAdvMinbtn").addClass("d-none");
        $(".agentAdvbtn").addClass("d-block");
    });
    $(".readMoreBtn").click(function(e) {
        e.preventDefault();
        $(this).parent("div").find(".textExtra").removeClass("d-none");
        $(this).parent("div").find(".textExtra").addClass("d-block");
        $(this).addClass("d-none");
        $(this).removeClass("d-block");
        $(this).parent("div").find(".readLessBtn").removeClass("d-none");
        $(this).parent("div").find(".readLessBtn").addClass("d-block");
    });
    $(".readMorePropBtn").click(function(e) {
        e.preventDefault();
        $(".textLessProp").removeClass("d-block").addClass("d-none");
        $(".textExtraProp").removeClass("d-none").addClass("d-content");
        $(this).removeClass("d-block").addClass("d-none");
        $(".readLessPropBtn").removeClass("d-none").addClass("d-block");
    });
    $(".readMoreBtnNew").click(function(e) {
        e.preventDefault();
        $(this).closest(".card").find(".textDiv").removeClass("d-none").addClass("d-block");
        $(this).addClass("d-none");
        $(this).removeClass("d-block");
    });
    $(".readLessBtnNew").click(function(e) {
        e.preventDefault();
        $(this).closest(".card").find(".textDiv").removeClass("d-block").addClass("d-none");
        $(this).closest(".card").find(".readMoreBtnNew").removeClass("d-none").addClass("d-block");
        $(this).addClass("d-block");
        $(this).removeClass("d-none");
    });
    // single project Readmore Description
    $(".readLessBtn").click(function(e) {
        e.preventDefault();
        $(this).parent("div").find(".textExtra").removeClass("d-block");
        $(this).parent("div").find(".textExtra").addClass("d-none");
        $(this).parent("div").find(".readMoreBtn").addClass("d-block");
        $(this).parent("div").find(".readMoreBtn").removeClass("d-none");
        $(this).removeClass("d-block");
        $(this).addClass("d-none");
    });
    $(".readLessPropBtn").click(function(e) {
        e.preventDefault();
        $(".textExtraProp").removeClass("d-content").addClass("d-none");
        $(".textLessProp").removeClass("d-none").addClass("d-block");
        $(".readMorePropBtn").removeClass("d-none").addClass("d-block");
        $(this).removeClass("d-block").addClass("d-none");
    });

    $(".showMoreBtn").click(function() {
        $(".TagExtra").removeClass("d-none");
        $(".TagExtra").addClass("d-inline-flex");
        $(".showMoreBtn").addClass("d-none");
        $(".showMoreBtn").removeClass("d-block");
        $(".showLessBtn").removeClass("d-none");
        $(".showLessBtn").addClass("d-block");
    });
    // single project Readmore Description
    $(".showLessBtn").click(function() {
        $(".TagExtra").removeClass("d-inline-flex");
        $(".TagExtra").addClass("d-none");
        $(".showMoreBtn").addClass("d-block");
        $(".showMoreBtn").removeClass("d-none");
        $(".showLessBtn").removeClass("d-block");
        $(".showLessBtn").addClass("d-none");
    });
    // single project Readmore Description
    $(".navProjectItemMob .nav-item").click(function() {
        setTimeout(function() {
            $(".navStickyBar").removeClass("d-block")
        }, 800);
    });
    $(".navProjectItem .nav-item").click(function() {
        setTimeout(function() {
            $(".navStickyBar").removeClass("d-block")
        }, 800);
    });
</script>
<script>
    // play community video
    if (window.location.pathname.split('/')[1] == "community") {
        const video = document.getElementById("singlePropVideo");
        const circlePlayButton = document.getElementById("circle-play-b");

        function togglePlay() {
            if (video.paused || video.ended) {
                video.play();
            } else {
                video.pause();
            }
        }

        circlePlayButton.addEventListener("click", togglePlay);
        video.addEventListener("playing", function() {
            circlePlayButton.style.opacity = 0;
        });
        video.addEventListener("pause", function() {
            circlePlayButton.style.opacity = 1;
        });
    }
</script>

<script type="text/javascript">
    $(function() {
        $('.masonryCont').infiniteslide({
            'speed': 100, //speed this is px/min
            'direction': 'up', //choose  up/down/left/right
            'pauseonhover': false, //if true,stop onmouseover
            'responsive': true, //width/height recalculation on window resize. child element's width/height define %/vw/vh,this set true.
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        initSwiper();
    });

</script>

