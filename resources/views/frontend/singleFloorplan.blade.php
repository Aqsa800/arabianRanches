@extends('frontend.layout.master')
@if ($floorplan->meta_title != '')
    @section('title', $floorplan->meta_title)
@else
    @section('title', $floorplan->title)
@endif
@if ($floorplan->meta_description != '')
    @section('pageDescription', $floorplan->meta_description)
@else
    @section('pageDescription', $website_description)
@endif
@if ($floorplan->meta_keyword != '')
    @section('pageKeyword', $floorplan->meta_keyword)
@else
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{$floorplan->mainImage}}');min-height:60vh;justify-content:end;padding-top:100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    <div class="row pt-5">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center">
                                <h2 class="text-white">{{$floorplan->title}}</h2>
                            </div>
                            <div class="d-flex  justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{route('floorplans')}}">Floor Plans</a></li>
                                    <li><a>{{$floorplan->title}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Floorplans  --}}
    <section class="my-5" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row g-3">
                        @foreach ($subFloorplans as $floorplans)
                            
                        <div class="col-6 col-lg-3 col-md-4">
                          <div class="bg-lightBlue p-3 rounded-2 h-100 floorplanImg">
                            <div>
                                <center>
                                    <a href="{{$floorplans->image}}"
                                        data-toggle="lightbox" data-gallery="floorplanGallery" data-caption="{{$floorplans->name}}">
                                        <img src="{{$floorplans->image}}"
                                            alt="{{$floorplans->name}}" class="img-fluid ">
                                        </a>
                                </center>
                            </div>
                            <div class="text-center mt-2">
                               <h6 class="text-primary">{{$floorplans->name}}</h6>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
