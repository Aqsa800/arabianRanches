<header>
    {{-- Desktop Nav  --}}
    <nav class="navbar mainNav bg-transparent d-none d-md-block d-lg-block" id="mainNav">
        <div class="container  d-block">
            <div class="row py-3 border-bottom">
                <div class="col-12 col-lg-5 col-md-5 my-auto">
                    <div>
                        <button class="navbar-toggler d-flex border-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <img src="{{ asset('frontend/assets/images/icons/menus.png') }}"
                                alt="Unique Properties Logo" class="img-fluid" width="25px">
                            <span class="my-auto text-white">&nbsp; Menu</span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-lg-2 col-md-2 my-auto">
                    <div>
                        <a class="" href="{{ url('/') }}">
                            <center>
                                <img src="@if ($logo) {{ $logo }} @else {{ asset('frontend/assets/images/logo.png') }} @endif" alt="Unique Properties Logo"
                                    class="img-fluid" width="90px">
                            </center>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-5 my-auto">
                    <div class="d-flex justify-content-end">
                        <div class="my-auto text-center">
                            <button type="button" class="btn fs-md-13 btn-sm btn-outline-light rounded-pill px-3 mx-3 mx-lg-3 mx-md-2" data-bs-toggle="modal" data-bs-target="#bookAmeeting">Book A
                                Meeting</button>
                        </div>
                        <div class="my-auto text-center">
                            <a href="" class="text-decoration-none fs-md-13 text-white"   data-bs-toggle="modal"
                            data-bs-target="#findPropModal">
                                <span>
                                    <i class="bi bi-search"></i>
                                </span> Find a Property
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if (Route::current()->getName() == "dubai-offplan")
            <div class="row py-3">
                <div class="col-12 col-lg-12">
                    <div class="nav-project">
                        <div class="bg-transparent">
                            <ul class="navProjectItem list-unstyled mb-0 d-flex justify-content-between">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#factsheets">Factsheets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#features">Features</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#location">Location</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#gallery">Gallery</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#floorplan">Floor Plan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#payment">Payment Plans</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#agent">Contact Agents</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="offcanvas bg-primary offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header border-bottom">
                    <div>
                        <a class="" href="{{ url('/') }}">
                            <center>
                                <img src="@if ($logo) {{ $logo }} @else {{ asset('frontend/assets/images/logo.png') }} @endif" alt="Unique Properties Logo"
                                    class="img-fluid" width="90px">
                            </center>
                        </a>
                    </div>
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close"><i class="bi bi-x-circle text-white"></i></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav offCanvasNav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dubai-offplans')}}">Off Plan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('resale')}}">Resale</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('rent')}}">Rental</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('services')}}">Services</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{route('media')}}">Media</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('developers')}}">Developers</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact-us')}}">Contact Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#bookAmeeting">Book a Meeting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  data-bs-toggle="modal" data-bs-target="#findPropModal">Find a Property</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <nav class="bg-primary text-white navStickyBar" style="display: none;" id="navStickyBar">
        <div class="container  d-block">

            <ul class="navSticky mb-0 d-flex justify-content-between">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <h1 class="fs-1 fst-italic">U.</h1>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dubai-offplans')}}">Off Plan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('resale')}}">Resale</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('rent')}}">Rental</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('services')}}">Services</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('media')}}">Media</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('developers')}}">Developers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact-us')}}">Contact Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#bookAmeeting">Book a Meeting</a>
                </li>
            </ul>

        </div>
        @if (Route::current()->getName() == "dubai-offplan")
        <div class="bg-white shadow-sm">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-lg-12">
                        <div class="nav-project">
                            <div class="bg-white">
                                <ul class="navProjectItemMob list-unstyled mb-0 d-flex justify-content-between">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#factsheets">Factsheets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#features">Features</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#location">Location</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery">Gallery</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#factsheets">Floor Plan</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#payment">Payment Plans</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#agent">Contact Agents</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </nav>
    @if (Route::current()->getName() == "dubai-offplan")
    <nav class="bg-primary text-white navStickyBarSingle d-none d-md-none d-lg-none" id="navStickyBarSingle">

        <div class="bg-primary shadow-sm">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-lg-12">
                        <div class="nav-project">
                            <div class="bg-primary">
                                <ul class="navProjectItemMob navProjects  list-unstyled mb-0 d-flex justify-content-between">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#factsheets">Factsheets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#features">Features</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#location">Location</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery">Gallery</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#factsheets">Floor Plan</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#payment">Payment Plans</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#agent">Contact Agents</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </nav>
    @endif
    {{-- Mobile Nav --}}
    <nav class="navbar mainNavMob bg-transparent" style="display:none;">
        <div class="container  d-block">
            <div class="row py-3">

                <div class="col-12 col-lg-12 col-md-12 my-auto">
                    <div>
                        <a class="" href="{{ url('/') }}">
                            <center>
                                <img src="@if ($logo) {{ $logo }} @else {{ asset('frontend/assets/images/logo.png') }} @endif" alt="Unique Properties Logo"
                                    class="img-fluid" width="90px">
                            </center>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
