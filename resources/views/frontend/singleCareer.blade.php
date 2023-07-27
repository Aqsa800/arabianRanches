@extends('frontend.layout.master')
@if ($career->meta_title != '')
    @section('title', $career->meta_title)
@else
    @section('title', $career->position)
@endif
@if ($career->meta_description != '')
    @section('pageDescription', $career->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($career->meta_keyword != '')
    @section('pageKeyword', $career->meta_keyword)
@else
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">
    </section>

    {{-- search & breadcrumps --}}
    <section class="my-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{route('careers')}}">Careers</a></li>
                                    <li><a>{{$career->position}}</a></li>
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
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="row border-bottom mb-3">

                        <div class="col-12 col-lg-8 col-md-8 text-lg-start text-md-start text-center">
                            <div class="my-auto">
                                <h2 class=" text-primary ">{{$career->position}}</h2>
                            </div>

                            <div class="text-secondary mb-3">
                                <small class="text-secondary">{{date('M d, Y', strtotime($career->post_date));}}</small>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="text-lg-end text-md-end text-center mb-3">
                                <button  class="btn btn-primary px-3"  data-bs-toggle="modal"
                                data-bs-target="#applyCareer">Apply Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="propDesc fw-semiBold">
                        {!! $career->description  !!}
                    </div>
                </div>
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="row g-3 my-3">
@if($career->key_responsibilities)
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="border bg-lightBlue rounded-2 p-4">
                                <h6 class="text-primary">Key Responsibilities</h6>
                                <div>
                                    <div class="list-circle">
                                        {!! $career->key_responsibilities  !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($career->requirements)
                        <div class="col-12 col-lg-6 col-md-6">
                           <div class="border bg-lightBlue rounded-2 p-4">
                            <h6 class="text-primary">Requirements</h6>
                            <div>
                                <div class="list-circle">
                                    {!! $career->requirements  !!}
                                </div>
                            </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Book Viewing modal -->
<div class="modal fade" id="applyCareer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h2 class="text-white text-uppercase">Share Your CV With Us</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 col-md-5">
                        <div class="modalViewFormCont">
                            <form action="{{route('careerForm')}}" id="modalViewForm" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Full Name*</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Full Name*" required>
                                        <input type="hidden" class="form-control" id="formName" name="formName"
                                            value="Career Form">
                                        <input type="hidden" class="form-control" id="career_id" name="career_id" value="{{$career->id}}">
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
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <label for="file" class="form-label">Upload CV*</label>
                                        <input type="file" name="cvFile" id="cvFile" class="form-control" placeholder="Upload CV" required>
                                      </div>
                                      <div class="col-12 col-lg-12 col-md-12">
                                        <label for="cover-letter" class="form-label">Cover Letter*</label>
                                        <textarea name="cover_letter" id="cover_letter" rows="4" class="form-control rounded-2" placeholder="Cover Letter"></textarea>
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
@endsection
