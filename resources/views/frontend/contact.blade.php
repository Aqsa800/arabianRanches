@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Contact Us | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{ $pagemeta ? ($pagemeta->bannerImage ? $pagemeta->bannerImage : asset('frontend/assets/images/banner/homeBg.webp')) : asset('frontend/assets/images/banner/homeBg.webp') }}');min-height:60vh;justify-content:end;padding-top:100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    <div class="row py-3">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center">
                                <h1 class="text-white">Contact Us</h1>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Details --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row g-3">

                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="pb-3 border-bottom">
                                <div class="my-auto">
                                    <h5 class="text-primary">Head Office</h5>
                                </div>
                                <div>
                                    <p class="mb-1">{{ $address ? $address : '306, 307, & 308, Building 3, Bay Square, Business Bay, Dubai, United Arab Emirates'}} </p>

                                </div>
                            </div>
                            <div class="py-3">
                                <p class="text-secondary mb-2">Our business operating hours are as follows: </p>
                                <p class="mb-0">Monday to Friday: 8.30am - 6pm </p>
                                <p class="">Saturdays: 10am - 4pm </p>
                                 </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <div class="my-auto">
                                    <h5 class="text-primary">Get in Touch</h5>
                                </div>
                                <div>
                                    <p>Get in Touch Please contact us via phone or email below or visit us at our Head Office in Business Bay during operating hours. </p>
                                </div>
                            </div>

                            <div class="d-grid gap-3 d-block d-lg-flex d-md-flex">
                                <a href="tel:{{ $tollfree_number ? $tollfree_number : '800 18881'}}" class="btn btn-outline-prop btn-sm text-decoration-none px-3" >UAE FREE PHONE: {{ $tollfree_number ? $tollfree_number : '800 18881'}} </a>
                                <a href="tel:{{ $telephone_number ? $telephone_number : '+97144558888'}}" class="btn btn-primary btn-sm   text-decoration-none px-3" >TEL: {{ $telephone_number ? $telephone_number : '+97144558888'}} </a>
                            </div>
                            <div class="row g-3 mt-2">

                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="justify-content-center border border-primary p-3 rounded-3">
                                        <div class="my-auto mb-1">
                                            <center>
                                                <a href="{{ $whatsapp ? $whatsapp : ''}}" class="text-decoration-none" target="_blank"><img src="{{ asset('frontend/assets/images/icons/whatsAppNew.png') }}"
                                                    alt="Unique Properties Logo " class="img-fluid" width="30px"></a>
                                            </center>
                                        </div>
                                        <div class="text-primary text-center">
                                            <a href="{{ $whatsapp ? $whatsapp : ''}}" class="text-secondary fs-14 text-decoration-none" target="_blank">{{ $whatsapp_number ? $whatsapp_number : ''}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="justify-content-center bg-primary border border-primary p-3 rounded-3">
                                        <div class="my-auto mb-1">
                                            <center>
                                                <a href="mailto:{{ $email ? $email : 'info@uniqueproperties.ae'}}" class="text-decoration-none" target="_blank"> <img src="{{ asset('frontend/assets/images/icons/email.png') }}"
                                                    alt="Unique Properties Logo " class="img-fluid" width="30px"></a>
                                            </center>
                                        </div>
                                        <div class="text-white text-center">
                                            <a href="mailto:{{ $email ? $email : 'info@uniqueproperties.ae'}}" class="text-white fs-14 text-decoration-none" target="_blank">{{ $email ? $email : 'info@uniqueproperties.ae'}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="justify-content-center border border-primary p-3 rounded-3">
                                        <div class="my-auto mb-1">
                                            <center>
                                                <a href="sms:{{ $contact_number ? $contact_number : ''}}" class="text-decoration-none" target="_blank"><img src="{{ asset('frontend/assets/images/icons/sms.png') }}"
                                                    alt="Unique Properties" class="img-fluid" width="30px"></a>
                                            </center>
                                        </div>
                                        <div class="text-primary text-center">
                                            <a href="sms:{{ $contact_number ? $contact_number : ''}}" class="text-secondary fs-14 text-decoration-none" target="_blank">{{ $contact_number ? $contact_number : ''}}</a>
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


    {{-- Contact --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">

                </div>
            </div>
        </div>
    </section>

    {{-- Location --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="mb-4">
                                <div class="my-auto">
                                    <h5 class="text-primary">Need some advice, have some concerns or Interested in our services or properties?</h5>
                                </div>
                                <div>
                                    <p>Simply contact us through email, phone call or alternatively fill the form below and your query will be promptly directed to the necessary Unique Properties employee for a response within 24hrs. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="py-3">
                                <form action="{{route('contactForm')}}" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <input type="hidden" class="form-control" id="formName" name="formName"
                                            value="Contact Us Form">
                                          <input type="text" name="name" id="name" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Your Full Name" required>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                          <input type="email"  name="email" id="email" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Your Email" required>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <input id="fullNumber" type="hidden" name="fullNumber">
                                        <input type="tel"   onkeyup="numbersOnly(this)" class="form-control form-control-lg bg-lightBlue fs-14" id="telephone"
                                            name="phone" placeholder="Your Phone" required>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                          <input type="text"  name="subject" id="subject" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Subject" required>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                          <textarea name="message" id="message" rows="4" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Your Message" required></textarea>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                                        </div>
                                      </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 my-auto">

                            <div class="py-3">
                                <iframe src="https://maps.google.com/maps?q={{ isset($address_latitude) ? $address_latitude : '' }},{{ isset($address_longitude) ? $address_longitude : '' }}&z=17&ie=UTF8&iwloc=&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
