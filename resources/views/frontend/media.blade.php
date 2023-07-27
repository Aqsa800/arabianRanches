@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Media | '.$name)
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
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="#">Media</a></li>
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
                    <div class="row">

                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-start mb-3">
                                <h2 class="text-primary">Media</h2>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <ul class="nav latestTabs mediaTab nav-pills pb-3" id="pills-tab" role="tablist">
                                {{-- <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link  tabBtn text-uppercase @if (isset($data)) {{ $data == 'news' ? 'active' : '' }}  @else active @endif "
                                        id="news-tab" data-bs-toggle="pill" tabid="news" data-bs-target="#news" type="button"
                                        role="tab" aria-controls="news" aria-selected="true">News</button>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link tabBtn text-uppercase @if (isset($data)) {{ $data == 'blogs' ? 'active' : '' }} @else active @endif"
                                        id="blogs-tab" data-bs-toggle="pill" tabid="blogs" data-bs-target="#blogs" type="button"
                                        role="tab" aria-controls="blogs" aria-selected="false">Blogs</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link  tabBtn text-uppercase @if (isset($data)) {{ $data == 'videos' ? 'active' : '' }} @endif"
                                        id="videos-tab" data-bs-toggle="pill" tabid="videos" data-bs-target="#videos" type="button"
                                        role="tab" aria-controls="videos" aria-selected="false">Videos</button>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="tab-content mediaTabContent" id="pills-tabContent">
                                {{-- <div class="tab-pane fade @if (isset($data)) {{ $data == 'news' ? 'show active' : '' }} @else show active  @endif "
                                    id="news"  tabid="news" role="tabpanel" aria-labelledby="news-tab" tabindex="0">
                                    @foreach ($news as $key => $value)
                                        @if (($key + 1) % 2 != 0)
                                            <div class="row g-3 g-md-0 g-lg-0 py-4">
                                                <div class="col-12 col-lg-6 col-md-6  blogImge rounded-3"
                                                    style="background-image: url('{{ $value->mainImage }}')">

                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 border-bottom">
                                                    <div class="ps-1 ps-lg-5 ps-md-3">
                                                        <div class="my-auto border-bottom pb-2">
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-decoration-none">
                                                                <h5 class=" text-primary ">{{ $value->title }}</h5>
                                                            </a>
                                                        </div>

                                                        <div class="d-flex justify-content-start text-secondary mt-2 mb-3">
                                                            <div class="my-auto me-3">
                                                                <small><i class="fa fa-calendar"></i>&nbsp;
                                                                    {{ date('d-m-Y', strtotime($value->publish_at)) }}</small>
                                                            </div>
                                                            <div class="my-auto">
                                                                <small><i class="fa fa-user"></i>&nbsp;
                                                                    {{ $value->author }}</small>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p>{!! substr(strip_tags($value->content), 0, 150) . '...' !!}
                                                            </p>
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-uppercase fw-semibold fs-14 text-decoration-none">Read
                                                                More <i class="bi bi-chevron-right fs-12"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row g-3 g-md-0 g-lg-0 py-4 colRev">

                                                <div class="col-12 col-lg-6 col-md-6 border-bottom">
                                                    <div class="pe-1 pe-lg-5 pe-md-3">
                                                        <div class="my-auto border-bottom pb-2">
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-decoration-none">
                                                                <h5 class=" text-primary ">{{ $value->title }}</h5>
                                                            </a>
                                                        </div>

                                                        <div class="d-flex justify-content-start text-secondary mt-2 mb-3">
                                                            <div class="my-auto me-3">
                                                                <small><i class="fa fa-calendar"></i>&nbsp;
                                                                    {{ date('d-m-Y', strtotime($value->publish_at)) }}</small>
                                                            </div>
                                                            <div class="my-auto">
                                                                <small><i class="fa fa-user"></i>&nbsp;
                                                                    {{ $value->author }}</small>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p>{!! substr(strip_tags($value->content), 0, 150) . '...' !!}
                                                            </p>
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-uppercase fw-semibold fs-14 text-decoration-none">Read
                                                                More <i class="bi bi-chevron-right fs-12"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6  blogImge rounded-3"
                                                    style="background-image: url('{{ $value->mainImage }}')">

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 col-lg-12">
                                            <div class="d-flex justify-content-center">
                                                {{ $news->fragment('news')->withQueryString()->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="tab-pane fade @if (isset($data)) {{ $data == 'blogs' ? 'show active' : '' }}@else show active  @endif"
                                    id="blogs"  tabid="blogs" role="tabpanel" aria-labelledby="blogs-tab" tabindex="0">
                                    @foreach ($blogs as $key => $value)
                                        @if (($key + 1) % 2 != 0)
                                            <div class="row g-3 g-md-0 g-lg-0 py-4">
                                                <div class="col-12 col-lg-6 col-md-6  blogImge rounded-3"
                                                    style="background-image: url('{{ $value->mainImage }}')">

                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 border-bottom">
                                                    <div class="ps-1 ps-lg-5 ps-md-3">
                                                        <div class="my-auto border-bottom pb-2">
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-decoration-none">
                                                                <h5 class=" text-primary ">{{ $value->title }}</h5>
                                                            </a>
                                                        </div>

                                                        <div class="d-flex justify-content-start text-secondary mt-2 mb-3">
                                                            <div class="my-auto me-3">
                                                                <small><i class="fa fa-calendar"></i>&nbsp;
                                                                    {{ date('d-m-Y', strtotime($value->publish_at)) }}</small>
                                                            </div>
                                                            <div class="my-auto">
                                                                <small><i class="fa fa-user"></i>&nbsp;
                                                                    {{ $value->author }}</small>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p>{!! substr(strip_tags($value->content), 0, 150) . '...' !!}
                                                            </p>
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-uppercase fw-semibold fs-14 text-decoration-none">Read
                                                                More <i class="bi bi-chevron-right fs-12"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row g-3 g-md-0 g-lg-0 py-4 colRev">

                                                <div class="col-12 col-lg-6 col-md-6 border-bottom">
                                                    <div class="pe-1 pe-lg-5 pe-md-3">
                                                        <div class="my-auto border-bottom pb-2">
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-decoration-none">
                                                                <h5 class=" text-primary ">{{ $value->title }}</h5>
                                                            </a>
                                                        </div>

                                                        <div class="d-flex justify-content-start text-secondary mt-2 mb-3">
                                                            <div class="my-auto me-3">
                                                                <small><i class="fa fa-calendar"></i>&nbsp;
                                                                    {{ date('d-m-Y', strtotime($value->publish_at)) }}</small>
                                                            </div>
                                                            <div class="my-auto">
                                                                <small><i class="fa fa-user"></i>&nbsp;
                                                                    {{ $value->author }}</small>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p>{!! substr(strip_tags($value->content), 0, 150) . '...' !!}
                                                            </p>
                                                            <a href="{{ url(strtolower($value->article_type) . '/' . $value->slug) }}"
                                                                class="text-primary text-uppercase fw-semibold fs-14 text-decoration-none">Read
                                                                More <i class="bi bi-chevron-right fs-12"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6  blogImge rounded-3"
                                                    style="background-image: url('{{ $value->mainImage }}')">

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 col-lg-12">
                                            <div class="d-flex justify-content-center">
                                                {{ $blogs->fragment('blogs')->withQueryString()->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade @if (isset($data)) {{ $data == 'videos' ? 'show active' : '' }} @endif"
                                    id="videos"  tabid="videos" role="tabpanel" aria-labelledby="videos-tab" tabindex="0">
                                    <div class="row g-3 py-4">
                                        @foreach ($videos as $video)
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="videoThumb">
                                                    <img src="{{ $video->mainImage }}"
                                                        class="img-fluid rounded-3 galleryImgSize"
                                                        alt="{{ $video->title }}">
                                                    <div class="playVideoMedia">
                                                        <button type="button" videourl={{$video->mainVideo}} class="btn btnVideoPlay border-0 p-0"
                                                            data-bs-toggle="modal" data-bs-target="#videoModal"><i
                                                                class="bi bi-youtube text-primary fa-3x lh-1"></i></button>

                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="my-auto text-center">
                                                        <h6 class=" text-primary ">{{ $video->title }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12">
                                            <div class="d-flex justify-content-center">
                                                {{ $videos->fragment('videos')->withQueryString()->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content  bg-primary">
                <div class="modal-header border-0 justify-content-end p-1">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-circle text-white"></i></button>
                </div>
                <div class="modal-body">
                    <div>
                        <video width="100%" height="100%" class="videoSrc" controls>
                            <source src="{{ asset('frontend/assets/images/banner/homeVideo.mov') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.btnVideoPlay', function() {
            //alert('check');
            var videourl = $(this).attr("videourl");
            $(".videoSrc").attr("src",videourl);
        });
    </script>
    <script>
        $(document).ready(function() {

        if(window.location.hash) {
      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character

      $(".mediaTab li .nav-link").removeClass("active");
    $(".mediaTabContent .tab-pane").removeClass("active show");

      $(".mediaTab li .nav-link[tabId="+hash+"]").addClass("active");
    $(".mediaTabContent .tab-pane[tabId="+hash+"]").addClass("active show");
  } else {

  }
  $('.tabBtn').click(function(e) {
                e.preventDefault();
                var hash = $(this).attr('tabId');
                if (window.location.hash || window.location.search) {
                    window.location.href = window.location.href.split("?")[0].split("#")[0] + '#'+hash;
                } else {
                }
            });
});
    </script>
@endsection
