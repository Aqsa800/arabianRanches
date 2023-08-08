@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ config('constants.'.$page.'.title') }} Page FAQS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url(config('constants.'.$page.'.url')) }}">{{ config('constants.'.$page.'.title') }} Page FAQS</a></li>
                        <li class="breadcrumb-item active">Edit {{ config('constants.'.$page.'.title') }} Page FAQS</li>
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
                            <h3 class="card-title">Edit {{ config('constants.'.$page.'.title') }} Page FAQS Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" method="POST"
                        action="{{ route('dashboard.faqs.update', [$page, $faq->id]) }}"
                         enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ config('constants.'.$page.'.name') }}" name="page_name">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="question">Question</label>
                                            <input type="text" value="{{ $faq->question }}" class="form-control @error('question') is-invalid @enderror" id="question" placeholder="Enter Question" name="question" required>
                                            @error('question')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="orderBy">Order By</label>
                                            <input type="number" value="{{ $faq->orderBy }}" min="0"
                                                class="form-control @error('orderBy') is-invalid @enderror" id="orderBy"
                                                placeholder="Enter orderBy" name="orderBy">
                                            @error('orderBy')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="long_answer">Answer</label>
                                            <textarea id="long_answer"
                                                class="summernote form-control @error('long_answer') is-invalid @enderror" name="long_answer" >{{ $faq->long_answer }}</textarea>
                                            @error('long_answer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
