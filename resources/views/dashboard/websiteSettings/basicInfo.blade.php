@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Basic Info Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Basic Setting</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Basic Info Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" files="true" method="POST" enctype="multipart/form-data" action="{{ route('dashboard.basic-info.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="website_name">Name</label>
                                            <input type="text" value="{{ $website_name }}" class="form-control " id="website_name" placeholder="Enter Website Name" name="website_name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="slogan">Slogan</label>
                                            <input type="text" value="{{ $slogan }}" class="form-control " id="slogan" placeholder="Enter Website Slogan" name="slogan">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="website_description">Website Descripton</label>
                                            <textarea name="website_description" class="form-control " id="website_description" rows="3">{{ $website_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="website_url">Website URL</label>
                                            <input type="url" value="{{ $website_url }}" class="form-control " id="website_url" placeholder="Enter Website URL" name="website_url">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="website_keyword">Website Keywords</label>
                                            <input type="text" value="{{ $website_keyword }}" class="form-control " id="website_keyword" placeholder="Enter Website Keywords" name="website_keyword">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="logo" name="logo" accept=".png, .jpg, .jpeg, .webp, .svg">
                                                <label class="custom-file-label" for="logo">Choose file</label>
                                            </div>
                                        </div>
                                        <div>
                                            @if(isset($logo))
                                            <img src="{{$logo}}" alt="" class="img-fluid" width="100" height="100" >
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="favicon">Favicon</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="favicon" accept=".png, .jpg, .jpeg, .webp, .svg">
                                                <label class="custom-file-label" for="favicon">Choose file</label>
                                            </div>
                                        </div>
                                        <div>
                                            @if(isset($favicon))
                                            <img src="{{$favicon}}" alt="" class="img-fluid" width="30" height="30" >
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="footer_logo">Footer Logo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="footer_logo" name="footer_logo" accept=".png, .jpg, .jpeg, .webp, .svg">
                                                <label class="custom-file-label" for="footer_logo">Choose file</label>
                                            </div>
                                        </div>
                                        <div>
                                            @if(isset($footer_logo))
                                            <img src="{{$footer_logo}}" alt="" class="img-fluid" width="100" height="100" >
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
