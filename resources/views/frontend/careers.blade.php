@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Careers | '.$name)
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
                                <h1 class="text-white">Careers</h1>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Careers</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Join Us    --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row g-3 justify-content-center">

                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="text-center">
                                <div class="">
                                    <h3 class="text-primary">Join An Award-winning Team</h3>
                                </div>
                                <div>
                                    <p class="fw-semibold">Unique Properties, one of the top real estate firms in Dubai, has
                                        seen an upward trend in the buying of luxury properties within the UAE. Over the
                                        first half of the year, Dubai recorded an 18% increase in high-net-worth individuals
                                        (FINWIs). </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="text-center">
                                <div class="">
                                    <h4 class="text-primary">Why Join Us?</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="">
                                <p>Established in 2008, we have helped thousands of people from all over the world find
                                    their dream home and benefit from some of the best real estate investments available in
                                    Dubai.</p>
                                <p> Offering a wide range of professional services to buyers, sellers, landlords and
                                    tenants, we provide our clients with honest im- partial advice and the highest levels of
                                    customer service. </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="">
                                <p>Over the years we have won a plethora of prestigious awards from leading developers
                                    across the UAE, Including Emaar Dubai Holding, Meraas, Damac, Nakheet, Meydan, Alder and
                                    many more. Click here to find out more. </p>
                                <p> With exciting expansion plans on the horizon, we are looking to fill a variety of newly
                                    created roles in the near future. </p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 col-md-8">
                            <div class="text-center">
                                <div class="">
                                    <h3 class="text-primary">Current Vacancies</h3>
                                </div>
                                <div>
                                    <p class="mb-0">We are currently hiring for the below mentioned roles. Please click on
                                        the role to view the full job description and apply with your CV and cover letter.
                                    </p>
                                    <small class="fst-italic fw-semibold"> Good Luck!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    {{-- Vaccancies --}}
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="row g-3">
                        @foreach ($careers as $key => $career)
                            
                        <div class="col-12 col-lg-4 col-md-6">
                            <div class="<?php if($key+1 % 2 == 0) { echo "bg-primary text-white"; }else{ echo "bg-lightBlue text-primary"; } ?> border h-100  p-4 rounded-3">
                                <div>
                                    <small class="text-secondary">{{date('M d, Y', strtotime($career->post_date));}}</small>
                                </div>
                                <div class="py-2">
                                    <a href="{{url('career/'.$career->slug)}}" class="text-decoration-none "><h5 class="card-title <?php if($key+1 % 2 == 0) { echo "text-white"; }else{ echo "text-primary"; } ?> mb-1">{{$career->position}}</h5></a>
                                    
                                </div>
                                <div>
                                   <div class="propDesc">
                                    {!! $career->description  !!}
                                   </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                      <a href="{{url('career/'.$career->slug)}}" class="text-decoration-none">                  
                                    <div class="text-white border bg-white rounded-2 py-1 px-2 my-auto">
                                        <i class="bi bi-chevron-right text-primary"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <div class="col-12 col-lg-12">
                                <nav aria-label="Page navigation example">
                                    <div class="d-flex justify-content-center">
                                        {{ $careers->withQueryString()->links() }}
                                    </div>
                                </nav>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Submit CV --}}
    <section class="my-5">
        <div class="container">
            <div class="row shadow py-5 rounded-3">
                <div class="col-12 col-lg-12">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12 col-lg-8 col-md-11">
                            <div class="text-center">
                                <div class="">
                                    <h3 class="text-primary">Share Your CV With Us</h3>
                                </div>
                                <div>
                                    <p class=""> 
                                        If no suitable vacancy is currently available but you would like to share your CV with us to be considered for future openings, please complete the form below: 
                                        Your Full Name Your Email 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-8">
                            <div>
                                <form action="{{route('careerForm')}}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <input type="hidden" class="form-control" id="formName" name="formName"
                                            value="Career Form">
                                          <input type="text" name="name" id="name" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Your Full Name" required>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                          <input type="email" name="email" id="email" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Your Email" required>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <input id="fullNumber" type="hidden" name="fullNumber">
                                        <input type="tel"  onkeyup="numbersOnly(this)" class="form-control form-control-lg bg-lightBlue fs-14" id="telephone"
                                            name="phone" placeholder="Your Phone" required>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                          <input type="file" name="cvFile" id="cvFile" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Upload CV" required>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                          <textarea name="cover_letter" id="cover_letter" rows="4" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Cover Letter"></textarea>
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

@endsection
