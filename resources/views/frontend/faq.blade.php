@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'FAQ | '.$name)
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
                                    <li><a>FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">

                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="">
                                <div class="my-auto">
                                    <h5 class="text-primary">Frequently Asked Questions</h5>
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
                                                {!! $faq->long_answer !!}
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

      {{-- Contact --}}
      <section class="my-5">
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
