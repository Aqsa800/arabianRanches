@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Communities | '.$name)
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
                    <div class="row py-5">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center">
                                <h1 class="text-white">Communities</h1>
                            </div>
                            <div class="d-none d-lg-flex d-md-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Communities</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="bg-white p-3 rounded-3">
                                <div class="agentSearch">
                                    <div class="pcAgentForm mt-2">
                                        <form action="" method="post" id="communitySearchForm">
                                            @csrf
                                            <div class="row g-2">
                                                <div class="col my-auto">
                                                    <div class="input-group input-group-solid flex-nowrap">
                                                        <span class="input-group-text border-end-0 bg-transparent pe-1"><i
                                                                class="bi bi-search fs-13"></i></span>
                                                        <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                            <select
                                                                class="form-control  form-control-lg propertySelect1 form-select-solid border-start-0  rounded-start-0"
                                                                data-control="select2" id="keywords" name="keywords[]"
                                                                data-placeholder="Enter Project" multiple>
                                                                @foreach ($search as $item)
                                                                    <option value="{{ $item }}"
                                                                        @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                                            {{ $keyword == $item ? 'selected' : '' }}
                                                                        @endforeach @endif>
                                                                        {{ $item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col my-auto">
                                                    <select class="form-select" name="community" id="community">
                                                        <option value="">Community Name</option>
                                                        @foreach ($allCommunities as $comm)
                                                            <option value="{{ $comm->id }}" @if(isset($data['community']))
                                                                {{$data['community'] == $comm->id ? 'selected' : ''}}
                                                           @endif>{{ $comm->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col my-auto">
                                                    <select class="form-select" name="developer" id="developer">
                                                        <option value="">Developer</option>
                                                        @foreach ($developers as $dev)
                                                            <option value="{{ $dev->id }}" @if(isset($data['developer']))
                                                                {{$data['developer'] == $dev->id ? 'selected' : ''}}
                                                           @endif>{{ $dev->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col my-auto">
                                                    <select class="form-select" name="accomodation" id="accomodation">
                                                        <option value="">Property Type</option>
                                                        @foreach ($accomodation as $acc)
                                                            <option value="{{ $acc->id }}">{{ $acc->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col my-auto">
                                                    <select class="form-select" name="status"  id="status" required>
                                                        <option value="">Status</option>
                                                        @foreach ($categories as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}
                                                            </option>
                                                        @endforeach
                                                        <option value="3">Off Plan</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto my-auto">
                                                    <button type="submit" class="btn btn-primary btnComForm">Find
                                                        Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mobAgentForm">
                                        <form action="" method="post" id="projectSearchForm">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-7">
                                                    <div class="input-group input-group-solid flex-nowrap">
                                                        <span class="input-group-text bg-transparent pe-1"><i
                                                                class="bi bi-search fs-13"></i></span>
                                                        <div class="overflow-hidden  noSideBorder flex-grow-1">
                                                            <select
                                                                class="form-control  form-control-lg propertySelect2 form-select-solid rounded-start-0"
                                                                data-control="select2" id="keywords2" name="keywords[]"
                                                                data-placeholder="Enter Project" multiple>
                                                                @foreach ($search as $item)
                                                                    <option value="{{ $item }}"
                                                                        @if (isset($data['keywords'])) @foreach ($data['keywords'] as $keyword)
                                                                            {{ $keyword == $item ? 'selected' : '' }}
                                                                        @endforeach @endif>
                                                                        {{ $item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <button class="btn w-100 btn-lightBlue px-1 my-auto fs-14"
                                                        type="button" id="button-addon2">
                                                        <i class="bi bi-plus agentAdvbtn text-primary"></i>
                                                        <i class="bi bi-dash-lg agentAdvMinbtn text-primary d-none"></i>
                                                    </button>
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="btn w-100 btn-primary">Find Now</button>
                                                </div>
                                                <div class="col-12 col-lg-4 my-auto">
                                                    <div class="advAgentMobForm d-none">
                                                        <div class="row g-1">
                                                            <div class="col-6">
                                                                <select class="form-select my-1" name="community" id="community">
                                                                    <option value="">Community Name</option>
                                                                    @foreach ($allCommunities as $comm)
                                                                        <option value="{{ $comm->id }}">{{ $comm->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <select class="form-select my-1" name="developer" id="developer">
                                                                    <option value="">Developer</option>
                                                                    @foreach ($developers as $dev)
                                                                        <option value="{{ $dev->id }}">{{ $dev->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <select class="form-select my-1" name="accomodation" id="accomodation">
                                                                    <option value="">Property Type</option>
                                                                    @foreach ($accomodation as $acc)
                                                                        <option value="{{ $acc->id }}">{{ $acc->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <select class="form-select my-1" name="status"  id="status" required>
                                                                    <option value="">Status</option>
                                                                    @foreach ($categories as $cat)
                                                                        <option value="{{ $cat->id }}">{{ $cat->name }}
                                                                        </option>
                                                                    @endforeach
                                                                    <option value="3">Off Plan</option>
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
    {{-- projects --}}

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="d-block d-md-none d-lg-none">
                        <ul class="breadcrumbBlue text-center ps-0 mb-3">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a>Communities</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="text-center">
                        <div class="secHead mb-3">
                            <h1 class="text-primary text-capitalize">Explore Dubai's Most Popular Areas</h1>
                        </div>
                        <div>
                            <p class="mb-0">We have an array of properties available in the most sough-after communities of Dubai.</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-12 col-md-12">
                    <form action="{{route('communities')}}" method="post">
                        @csrf
                    <div class="pt-3 pb-5 propTagDiv text-center">
                        <div class="propTag">
                            <input type="radio" class="btn-check btnCheckTab " name="tags" id="all" autocomplete="off" value="all"
                            @if(isset($data['tags']))
                                {{$data['tags'] == 'all' ? 'checked' : ''}}
                           @endif>
                            <label class="btn btn-primary btn-darkBlue" for="all">All</label>
                        </div>

                        @foreach ($tags as $key => $tag)
                            <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTab" name="tags" id="tag{{ $key + 1 }}" autocomplete="off" value="{{ $tag->id }}"
                                @if(isset($data['tags']))
                                    {{$data['tags'] == $tag->id ? 'checked' : ''}}
                               @endif>
                                <label class="btn btn-primary btn-darkBlue" for="tag{{ $key + 1 }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </form>
                </div>
                @if (count($communities) > 0)
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="row g-3">
                            @foreach ($communities as $community)
                                <div class="col-12 col-lg-4 col-md-6">
                                    <div>
                                        <div class="devContainer rounded-3"
                                            style="background-image: url('{{ $community->mainImage }}')">
                                            <div class="devLogo p-3">
                                                <div class="d-flex justify-content-start">
                                                    @foreach ($community->categories as $catCom)
                                                        @if($catCom->id == '3')
                                                        <form method="POST" action="{{ route('dubai-offplans')}}">
                                                            @csrf
                                                            <input type="hidden" name="status" value="{{$catCom->id}}">
                                                            <input type="hidden" name="community" value="{{$community->id}}">
                                                            <button type="submit" class="text-white text-decoration-none border rounded-2 py-1 px-2 fs-12 my-auto me-2 bg-transparent">
                                                                {{ $catCom->name }}
                                                            </button>
                                                        </form>
                                                        @else
                                                        <form method="POST" action="{{ route('properties')}}">
                                                            @csrf
                                                            <input type="hidden" name="status" value="{{$catCom->id}}">
                                                            <input type="hidden" name="community" value="{{$community->id}}">
                                                            <button type="submit" class="text-white text-decoration-none border rounded-2 py-1 px-2 fs-12 my-auto me-2 bg-transparent">
                                                                {{ $catCom->name }}
                                                            </button>
                                                        </form>
                                                        @endif
                                                    @endforeach

                                                </div>

                                            </div>
                                            <div class="devDetails p-3">
                                                <div class="d-flex justify-content-between">
                                                    <div class="my-auto">
                                                        <a href="{{ url('community/' . $community->slug) }}"
                                                            class="text-decoration-none">
                                                            <p class="mb-0 text-white">{{ $community->name }}</p>
                                                        </a>
                                                    </div>

                                                    <a href="{{ url('community/' . $community->slug) }}"
                                                        class="text-decoration-none">
                                                        <div class="text-white border rounded-3 py-1 px-2 my-auto">
                                                            <i class="bi bi-chevron-right"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12 col-lg-12">
                                <nav aria-label="Page navigation example">
                                    <div class="mobPagination justify-content-center">
                                        {{ $communities->withQueryString()->links() }}
                                    </div>
                                    <div class="pcPagination justify-content-center">
                                        {{ $communities->withQueryString()->links() }}
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center text-primary">
                        <p>No Communities Found</p>
                    </div>
                @endif

            </div>
        </div>
    </section>

    @if(count($contents) > 0)
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    @foreach ($contents as $key => $content)
                        @if(($key + 1) % 2 == 0)
                        <div class="row colRev">
                            <div class="col-12 col-lg-4 col-md-4 blogImge rounded-3" style="background-image: url('{{$content->image ? $content->image : '' }}')">

                            </div>
                            <div class="col-12 col-lg-8 col-md-8 my-auto">
                                <div class="mb-3">
                                    <div class="my-auto">
                                        <h5 class="mb-0 text-primary">{{$content->title}}</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="propDesc">
                                        {!! $content->description !!}
                                    </div>

                                </div>
                            </div>

                        </div>
                        @else
                        <div class="row  mb-5">
                            <div class="col-12 col-lg-8 col-md-8 my-auto">
                                <div class="mb-3">
                                    <div class="my-auto">
                                        <h5 class="mb-0 text-primary">{{$content->title}}</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="propDesc">
                                        {!! $content->description !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-md-4 blogImge rounded-3" style="background-image: url('{{$content->image ? $content->image : '' }}')">

                            </div>
                        </div>
                        @endif
                    @endforeach


                </div>
            </div>
        </div>
    </section>
@endif

    <script>
        $(document).on('change', '#status', function(event) {
           var status = $(this).val();
           if (status == "3") {
                    var path = "dubai-offplans";
                }  else {
                    var path = "properties";
                }
                $(this).closest("form").attr("action", window.location.origin+'/'+path);
       });
       $(document).on('change', '.btnCheckTab', function(event) {
        if (this.checked) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
        $(this).closest("form").submit();

    });
      </script>
@endsection
