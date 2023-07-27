@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Lease Your Property | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">
    </section>

    {{-- search & breadcrumps --}}
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Lease Your Property </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-lg-12">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="text-start">
                                <div class="mb-3">
                                    <h4 class="text-primary">Why Lease Your Property With Us?</h4>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Extensive Tenant Network </h5>
                                            <p class="mb-0 fs-14"> 
                                                Leasing your property with us gives you access to our extensive network of prospective tenants. We have a wide pool of qualified renters actively seeking properties, allowing us to match your property with the right tenant quickly and efficiently. Our comprehensive screening process ensures that only reliable and responsible individuals are considered for your property.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Expert Market Knowledge </h5>
                                            <p class="mb-0 fs-14"> 
                                                We have deep understanding of the local rental market. We stay updated on rental trends, pricing dynamics, and legal requirements, allowing us to provide accurate and informed advice. With our expertise, we can help you determine the optimal rental rate, negotiate favorable lease terms, and ensure compliance with relevant regulations, giving you peace of mind.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">	Effective Marketing Strategies </h5>
                                            <p class="mb-0 fs-14"> 
                                                When it comes to marketing your rental property, we employ targeted and effective strategies to attract quality tenants. From professional property photography and compelling listings to online advertising and social media campaigns, we leverage various channels to showcase the unique features and appeal of your property. Our goal is to minimize vacancy periods and maximize your rental income.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Streamlined Rental Process </h5>
                                            <p class="mb-0 fs-14"> 
                                                Leasing your property can involve numerous tasks, from tenant inquiries and property viewings to lease agreement preparation and tenant screening. With us, you can experience a streamlined rental process. Our expert agents at Unique Properties will handle all aspects, from marketing and tenant selection to lease negotiations and move-in inspections. Our efficient procedures and attention to detail ensure a smooth and hassle-free experience for both landlords and tenants.
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 p-2">
                            <div class="p-3 p-lg-5 p-md-5 bg-white shadow">
                                <div>
                                    <h4 class="text-primary">
                                        Schedule a call with our property consultants
                                    </h4>
                                </div>
                                <form action="{{route('valuationForm')}}" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-12 col-md-12">
                                          <input type="text" class="form-control form-control-lg bg-lightBlue fs-14"  name="name"
                                          id="name" placeholder="Your Full Name*" required >
                                          <input type="hidden" name="formName" value="Lease your property Form">
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                          <input type="email" name="email" id="email" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Your Email*" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="fullNumber" type="hidden" name="fullNumber">
                                            <input type="tel"  onkeyup="numbersOnly(this)" class="form-control form-control-lg bg-lightBlue fs-14" id="telephone"
                                                name="phone" placeholder="Mobile*" required>
    
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <select name="property_type" id="property_type" class="form-select form-select-lg bg-lightBlue fs-14" required>
                                                <option value="">Property Type*</option>
                                                <option value="Apartment">Apartment</option>
                                                <option value="Villa">Villa</option>
                                                <option value="Townhouse">Townhouse</option>
                                                <option value="Office">Office</option>
                                                <option value="Retail">Retail</option>
                                                <option value="Building">Building</option>
                                                <option value="Other (Residential)">Other (Residential)</option>
                                                <option value="Other (Commercial)">Other (Commercial)</option>
                                            </select>
                                          </div>
                                          <div class="col-12 col-lg-12 col-md-12">
                                            <input type="text" name="location" id="location" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Location*" required>
                                          </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                                        </div>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      {{-- Contact --}}
      <section class="my-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="bg-lightBlue p-3 p-md-3 p-lg-5">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 my-auto">
                                <div class="secHead text-center text-lg-start text-md-start"> 
                                    <h4 class="text-primary fw-semibold mb-0">Have a question?</h4>
                                    <h4 class="text-primary fw-semibold">Our team is happy to assist you</h4>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 col-md-5 my-auto">
                                <div class="d-block d-lg-flex d-md-block text-center justify-content-center">
                                    <div class="my-auto me-3 py-2"><button
                                        class="btn btn-primary rounded-pill px-5"   data-bs-toggle="modal"
                                        data-bs-target="#EnquireNowModal">Enquire Now</button></div>
                                    <div class="my-auto py-2">or <span class="fw-semibold">Call: </span><a href="tel:{{ $telephone_number ? $telephone_number : '+97144558888'}}" class="text-decoration-none text-dark">{{ $telephone_number ? $telephone_number : '+971 4 455 8888'}}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
