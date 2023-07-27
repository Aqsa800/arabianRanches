@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Thank You | '.$name)
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
                                    <li><a>Thank You</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <div class="secHead text-center mb-3">
                                <h5 class="text-primary">{{Session::get('message');}}</h2>
                            </div>
                            <div class="text-center">
                                <a href="{{ url('/') }}"
                                    class="btn btn-primary  text-uppercase rounded-pill px-3">Back To Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(Session::has('file'))
    <script>
        var link = document.createElement('a');
        var file = "<?php echo Session::get('file'); ?>";
        link.href = file;
        var filename = file.substring(file.lastIndexOf('/')+1);
        console.log(filename );
        link.download = filename;
        link.dispatchEvent(new MouseEvent('click'));
    </script>
 @endif
@endsection
