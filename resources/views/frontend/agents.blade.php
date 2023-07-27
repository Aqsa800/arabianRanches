@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Agents | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
{{-- @dd($nationality); --}}
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{ $pagemeta ? ($pagemeta->bannerImage ? $pagemeta->bannerImage : asset('frontend/assets/images/banner/homeBg.webp')) : asset('frontend/assets/images/banner/homeBg.webp') }}');min-height:60vh;justify-content:end;padding-top:100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    <div class="row py-5">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center">
                                <h2 class="text-white">Agents</h2>
                            </div>
                            <div class="d-none d-lg-flex d-md-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Agents</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="bg-white p-3 rounded-3">
                                <div class="agentSearch">
                                    <div class="pcAgentForm">
                                        <form action="{{route('agents')}}" method="post" id="agentSearchForm">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col">
                                                    <div class="input-group input-group-solid flex-nowrap">
                                                        <span class="input-group-text bg-transparent pe-1"><i
                                                                class="bi bi-search fs-13"></i></span>
                                                        <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                            <select
                                                                class="form-control  form-control-lg propertySelect1  border-start-0 form-select-solid rounded-start-0"
                                                                data-control="select2" name="keywords[]" 
                                                                data-placeholder="Enter Project or Community" multiple>
                                                                @foreach ($search as $item)
                                                                    <option value="{{$item}}"
                                                                    @if(isset($data['keywords']))
                                                                        @foreach ($data['keywords'] as $keyword)
                                                                            {{$keyword == $item ? 'selected' : ''}}
                                                                        @endforeach
                                                                    @endif>{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <select class="form-select propertySelect1" name="language[]"  multiple data-placeholder="Languages">
                                                        @foreach ($languages as $lang)
                                                            <option value="{{$lang->id}}"  @if(isset($data['language']))
                                                                @foreach ($data['language'] as $langs)
                                                                    {{$langs == $lang->id ? 'selected' : ''}}
                                                                @endforeach
                                                            @endif>{{$lang->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="form-select propertySelect1" name="service[]"  multiple data-placeholder="Service needed">
                                                        @foreach ($services as $service)
                                                            <option value="{{$service->id}}"  @if(isset($data['service']))
                                                                @foreach ($data['service'] as $serv)
                                                                    {{$serv == $service->id ? 'selected' : ''}}
                                                                @endforeach
                                                            @endif>{{$service->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="form-select propertySelect1" name="nationality[]"  multiple data-placeholder="Nationality">
                                                        @foreach ($nationality as $nation)
                                                            <option value="{{$nation->nationality}}"  @if(isset($data['nationality']))
                                                                @foreach ($data['nationality'] as $nat)
                                                                    {{$nat == $nation->nationality ? 'selected' : ''}}
                                                                @endforeach
                                                            @endif>{{$nation->nationality}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-primary">Find Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mobAgentForm">
                                        <form action="{{route('agents')}}" method="post" id="agentSearchForm">
                                            @csrf
                                            <div class="row g-1">
                                               
                                                <div class="col-7 my-auto">
                                                    <select class="form-control propertySelect1 my-1" name="language[]" multiple data-placeholder="Languages">
                                                        @foreach ($languages as $lang)
                                                            <option value="{{$lang->id}}" @if(isset($data['language']))
                                                                @foreach ($data['language'] as $langs)
                                                                    {{$langs == $lang->id ? 'selected' : ''}}
                                                                @endforeach
                                                            @endif>{{$lang->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-1 my-auto">
                                                    <button class="btn w-100 btn-lightBlue px-1 my-auto fs-14" type="button"
                                                    id="button-addon2">
                                                    <i class="bi bi-plus agentAdvbtn text-primary"></i>
                                                    <i class="bi bi-dash-lg agentAdvMinbtn text-primary d-none"></i>
                                                </button>
                                                </div>
                                                <div class="col-4  my-auto text-center ">
                                                    <button type="submit" class="btn  w-100 btn-primary  my-1">Find
                                                        Now</button>
                                                </div>
                                                <div class="col-12 col-lg-4 my-auto">
                                                    <div class="advAgentMobForm d-none">
                                                        <div class="row g-1">
                                                            <div class="col-12">
                                                                <div class="input-group input-group-solid flex-nowrap my-1">
                                                                    <span class="input-group-text bg-transparent pe-1"><i
                                                                            class="bi bi-search fs-13"></i></span>
                                                                    <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                                        <select
                                                                            class="form-control  form-control-lg  border-start-0 propertySelect1 form-select-solid rounded-start-0"
                                                                            data-control="select2" name="keywords[]" 
                                                                            data-placeholder="Enter Project or Community" multiple>
                                                                            @foreach ($search as $item)
                                                                                <option value="{{$item}}" @if(isset($data['keywords']))
                                                                                @foreach ($data['keywords'] as $keyword)
                                                                                    {{$keyword == $item ? 'selected' : ''}}
                                                                                @endforeach
                                                                            @endif>{{$item}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <select class="form-control propertySelect1 my-1" name="service[]"  multiple data-placeholder="Service needed">
                                                                    @foreach ($services as $service)
                                                                        <option value="{{$service->id}}" @if(isset($data['service']))
                                                                            @foreach ($data['service'] as $serv)
                                                                                {{$serv == $service->id ? 'selected' : ''}}
                                                                            @endforeach
                                                                        @endif>{{$service->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <select class="form-control propertySelect1 my-1" name="nationality[]" multiple data-placeholder="Nationality">
                                                                    @foreach ($nationality as $nation)
                                                                        <option value="{{$nation->nationality}}" @if(isset($data['nationality']))
                                                                            @foreach ($data['nationality'] as $nat)
                                                                                {{$nat == $nation->nationality ? 'selected' : ''}}
                                                                            @endforeach
                                                                        @endif>{{$nation->nationality}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                        </div>
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
    </section>
    {{-- Agents --}}
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="d-block d-md-none d-lg-none">
                        <ul class="breadcrumbBlue text-start ps-0">
                            <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="#">Agents</a></li>
                        </ul>
                    </div>
                </div>
                @if (count($agents) > 0)
               
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row g-4">
                        @foreach ($agents as $agent)
                        <div class="col-12 col-lg-3 col-md-4 agentProperty">
                            <div class="agentContMain h-100">
                                <div class="card rounded-3 h-100  border-0 bg-white shadow ">
                                    <a href="{{url('agent/'.$agent->slug)}}" class="text-decoration-none"><img src="{{ $agent->image }}"
                                        class="rounded-3 rounded-bottom-0 img-fluid agentImg" alt="{{ $agent->name }}"></a>
                                    <div class="bg-white h-100 d-flex flex-column justify-content-between  rounded-3 rounded-top-0">
                                        <div class="border-bottom">
                                            <div class="d-flex justify-content-between p-2">
                                                <div class="text-primary my-auto">
                                                    <a href="{{url('agent/'.$agent->slug)}}" class="text-decoration-none"><h6 class="mb-0 text-primary fw-semibold">{{ $agent->name }}</h6></a>
                                                    <p class="mb-0 fs-14">{{ $agent->designation }}</p>
                                                </div>
                                                <div class="my-auto">
                                                    <div class="d-flex justify-content-evenly">
                                                        <a href="https://wa.me/{{ $agent->whatsapp_number }}" class="text-decoration-none">
                                                            <img class="img-fluid mx-2"
                                                                src="{{ asset('frontend/assets/images/icons/whatsapp.png') }}"
                                                                width="20px" />
                                                        </a>
                                                        <a href="{{ $agent->contact_number }}" class="text-decoration-none">
                                                            <img class="img-fluid mx-2"
                                                                src="{{ asset('frontend/assets/images/icons/call.png') }}"
                                                                width="15px" />
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="p-2">
                                                @if(count($agent->languages)>0)
                                                <p class="mb-0 fs-14 fw-semibold">Language : {{ $agent->languages->implode('name', ',') }}</p>
                                                @endif
                                                @if($agent->experience)
                                                <p class="mb-0 fs-14 fw-semibold">Experience : {{$agent->experience}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="border-top d-flex justify-content-evenly">
                                            <div class="text-center lh-1 text-primary p-2">
                                                <h6 class="mb-0  lh-1 fw-semibold">{{$agent->resale_properties_count}}</h6>
                                                <small class="fs-12">Resale</small>
                                            </div>
                                            <div class="border-end"></div>
                                            <div class="text-center lh-1 text-primary p-2">
                                                <h6 class="mb-0  lh-1 fw-semibold">{{$agent->sale_properties_count}}</h6>
                                                <small class="fs-12">Rental</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 col-lg-12">
                            <div class="text-center viewMoreBtnWrapper mt-4">
                                <a class="btn btn-primary   viewMoreBtn text-uppercase rounded-pill px-3">View More
                                    Agents</a>
                            </div>
                        </div>
                    </div>
                </div>
                  @else
                  <div class="text-center text-primary">
                    <p>No Agents Found</p>
                </div>   
                @endif
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 my-auto">
                            <div class="mb-3">
                                <div class="my-auto">
                                    <h5 class="mb-0 text-primary">Since our formation in 2008, our core values have always
                                        remained</h5>
                                </div>
                            </div>
                            <div>
                                <p>Since our formation in 2008, our core values have always remained at the heart of
                                    everything we do and these includes integrity, transparency and respect to name a few.
                                </p>
                                <p>I formed Unique Properties with customer centricity and passion for real estate in mind
                                    and this was our differentiating factor from other companies. Over the years we have
                                    grown and developed our position in the market to set a new benchmark for quality and
                                    excellence. </p>
                                <p>
                                    Thanks to our inspiring business partners and a talented team of experienced and
                                    multi-lingual professionals, we have become one of Dubai's leading real estate agencies
                                    with numerous awards under our belt. </p>
                                <p>Over the years, we have helped thousands of clients to grow their wealth and real estate
                                    portfolio through tailor-made investment strategies focusing on the city's most
                                    lucrative developments in the best locations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <script>
        $(document).ready(function() {
            var x, size_li;

            function changeLoadCount(media) {
                if (media.matches) {
                    x = 4; // no. of items per click mobile <= 767
                    $(".agentProperty").hide();
                    $(".agentProperty:lt(" + x + ")").show();
                    size_li = $(".agentProperty").length;
                    if (x => size_li) {
                        $(".viewMoreBtnWrapper").hide();
                    } else {
                        $(".viewMoreBtnWrapper").show();
                    }
                } else {
                    x = 8; // no. of items per click in desktop >= 768
                    $(".agentProperty").hide();
                    $(".agentProperty:lt(" + x + ")").show();
                    size_li = $(".agentProperty").length;
                    //   alert(size_li);
                    if (x == size_li || x > size_li) {
                        $(".viewMoreBtnWrapper").hide();
                    } else {
                        $(".viewMoreBtnWrapper").show();
                    }
                }
            }

            var media = window.matchMedia("(max-width: 767px)");
            changeLoadCount(media);
            media.addListener(changeLoadCount);
            window.addEventListener("load resize", function() {
                changeLoadCount(media);
                media.addListener(changeLoadCount);
            });

            function loadMore() {
                $(".agentProperty").hide();
                size_li = $(".agentProperty").length;
                $(".agentProperty:lt(" + x + ")").show();
                $(".viewMoreBtn").click(function() {
                    if (media.matches) {
                        x = x + 4 <= size_li ? x + 4 : size_li;
                    } else {
                        x = x + x <= size_li ? x + x : size_li;
                    }
                    $(".agentProperty:lt(" + x + ")").show();
                    if (x == size_li) {
                        $(".viewMoreBtnWrapper").hide();
                    } else {
                        $(".viewMoreBtnWrapper").show();
                    }
                });
            }
            loadMore();
        });
    </script>
@endsection
