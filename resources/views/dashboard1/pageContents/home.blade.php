@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home Page Content</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Home Page Content</li>
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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Banners</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('dashboard.banners.create') }}" class="btn float-right btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        New Banner
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Button Next</th>
                                        <th>Status</th>
                                        <th>Added At</th>
                                        <th>Added By</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->button_text }}</td>
                                            <td>
                                                <span
                                                    class="badge @if ($value->status === 'active') bg-success @else bg-danger @endif">
                                                    {{ $value->status }}
                                                </span>
                                            </td>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->formattedCreatedAt }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST"
                                                    action="{{ route('dashboard.banners.destroy', $value->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.banners.edit', $value->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Counters</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('dashboard.counters.create') }}" class="btn float-right btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        New Counter
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Key</th>
                                        <th>Value</th>
                                        <th>Status</th>
                                        <th>Added At</th>
                                        <th>Added By</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($counters as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->key }}</td>
                                            <td>{{ $value->value }}</td>
                                            <td>
                                                <span
                                                    class="badge @if ($value->status === 'active') bg-success @else bg-danger @endif">
                                                    {{ $value->status }}
                                                </span>
                                            </td>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->formattedCreatedAt }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST"
                                                    action="{{ route('dashboard.counters.destroy', $value->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.counters.edit', $value->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Story Section</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" method="POST"
                        action="{{ route('dashboard.homePage.contents.store') }}"
                        enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="page_name" value="{{ config('constants.Home') }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" value="{{ $title }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" name="title" required>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description"
                                                class="summernote form-control @error('description') is-invalid @enderror" name="description">{{ $description }}</textarea>
                                            @error('description')
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
