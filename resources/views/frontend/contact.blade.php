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
    <header class="header overlayClr headMdHt"  id="contactHeader">
        <div class="container">
            @include('frontend.layout.nav')
            <div class="headerContent">
                <h2 class="headerTitle mrT150">Talk To Our Team </h2>
            </div>
        </div>
    </header>
@endsection

@section('header_extra')
@endsection
@section('content')
    <section class="section pad-60-auto sectionMarBtm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="secContentBox text-center">
                        <p class="pText smText">
                            At haus & haus, we pride ourselves on having an extraordinary team of dedicated agents who
                            embody our values and uphold our culture every single day. We meticulously handpick the best
                            professionals in the industry – those rare diamonds who consistently go the extra mile to exceed
                            our clients
                        </p>
                        <p class="pText smText">
                            Experience the difference of working with a team that lives and breathes our values, and
                            consistently goes above and beyond to deliver exceptional service. Get in touch with our
                            remarkable team at haus & haus today, and let us help you achieve your real estate dreams.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="formSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="formContentBox">
                        <h1>
                            Contact<br>Information
                        </h1>
                        <h3>House Hunter<br>Real Estate Brokers LLC</h3>
                        <p>
                            {!! $address  !!}
                        </p>
                        @if($contact_number)
                        <span>Tel:{{ $contact_number }}</span>
                        @endif

                        <div class="socialBar">
                            @if ($facebook)
                                <a href="{{ $facebook }}" target="_blank" class="text-decoration-none"
                                    rel="noopener noreferrer">
                                    <div class="footIconSocial me-3 my-auto">
                                        <span class="fa-stack">
                                            <i class="fa fa-circle fa-stack-2x fCircle"></i>
                                            <i class="fa fa-facebook fIcon fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </a>
                                {{-- <a href="{{ $facebook }}" class="socialItem">
                                <img src="{{ asset('frontend/assets/images/icons/facebook.webp')}}">
                            </a> --}}
                            @endif
                            @if ($instagram)
                                <a href="{{ $instagram }}" target="_blank" class="text-decoration-none"
                                    rel="noopener noreferrer">
                                    <div class="footIconSocial me-3 my-auto">
                                        <span class="fa-stack">
                                            <i class="fa fa-circle  fa-stack-2x fCircle"></i>
                                            <i class="fa fa-instagram fIcon fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </a>

                                {{-- <a href="{{ $instagram }}" class="socialItem">
                                <img src="{{ asset('frontend/assets/images/icons/instagram.webp')}}">
                            </a> --}}
                            @endif
                            @if ($linkedin)
                                <a href="{{ $linkedin }}" target="_blank" class="text-decoration-none"
                                    rel="noopener noreferrer">
                                    <div class="footIconSocial me-3 my-auto">
                                        <span class="fa-stack">
                                            <i class="fa fa-circle  fa-stack-2x fCircle"></i>
                                            <i class="fa fa-linkedin fIcon fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </a>

                                {{-- <a href="{{ $linkedin }}" class="socialItem">
                                <img src="{{ asset('frontend/assets/images/icons/linkedin.webp')}}">
                            </a> --}}
                            @endif
                            @if ($twitter)
                                <a href="{{ $twitter }}" target="_blank" class="text-decoration-none"
                                    rel="noopener noreferrer">
                                    <div class="footIconSocial me-3 my-auto">
                                        <span class="fa-stack">
                                            <i class="fa fa-circle  fa-stack-2x fCircle"></i>
                                            <i class="fa fa-twitter fIcon fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </a>

                                {{-- <a href="{{ $twitter }}" class="socialItem">
                                <img src="{{ asset('frontend/assets/images/icons/twitter.webp')}}">
                            </a> --}}
                            @endif
                            @if ($youtube)
                                <a href="{{ $youtube }}" target="_blank" class="text-decoration-none"
                                    rel="noopener noreferrer">
                                    <div class="footIconSocial me-3 my-auto">
                                        <span class="fa-stack">
                                            <i class="fa fa-circle  fa-stack-2x fCircle"></i>
                                            <i class="fa fa-youtube fIcon fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </a>

                                {{-- <a href="{{ $youtube }}" class="socialItem">
                                <img src="{{ asset('frontend/assets/images/icons/youtube.webp')}}">
                            </a> --}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="formCard">
                        <div class="formCardHead">
                            <h4>Talk With Our Agents</h4>
                        </div>
                        <form class="formArea" method="POST" id="contactusForm" action="{{ url('contactForm') }}">
                            @csrf
                            <input type="hidden" name="formName" value="contactForm">
                            <div class="inputFieldBar">
                                <label>Name</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="inputFieldBar">
                                <label>Email</label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="inputFieldBar">
                                <label>Phone</label>
                                <input class="fullNumber" id="fullNumber" type="hidden" name="fullNumber">
                                <input type="text" onkeyup="numbersOnly(this)" id="telephone" name="phone" required>
                            </div>
                            <div class="inputFieldBar">
                                <label>Message</label>
                                <textarea name="message" rows="5"></textarea>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block subMitBtn contactusFormButton">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
