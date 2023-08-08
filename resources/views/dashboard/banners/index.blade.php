@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banners</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Banners</li>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row float-right">
                                <div class="mr-3">
                                    <button type="button" class="btn btn-block btn-outline-primary" data-toggle="collapse"
                                        data-target="#collapseFilter" aria-expanded="false"
                                        aria-controls="collapseFilter">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                        Filter
                                    </button>
                                </div>
                                <div class="">
                                    <a href="{{ route('dashboard.banners.create') }}"
                                        class="btn btn-block btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        New Banner
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collapse @if(count(request()->all())> 0) show @endif" id="collapseFilter">
                            <form method="GET" action="{{ route('dashboard.banners.index') }}">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                @foreach (config('constants.statuses') as $key=>$value)
                                                <option value="{{ $key }}"
                                                    @if(request()->status === $key) selected @endif
                                                >{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Page URL</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $key => $banner)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $banner->heading_one }}</td>
                                            <td>@if($banner->image)
                                                <img src="{{ $banner->image }}" alt="{{ $banner->heading_one }}" width="100" height="100" style="object-fit: cover">
                                                @endif</td>
                                            <td>{{ $banner->page_url }}</td>
                                            <td>
                                                <span
                                                    class="badge @if ($banner->status === 'active') bg-success @else bg-danger @endif">
                                                    {{ $banner->status }}
                                                </span>
                                            </td>
                                            <td>{{ $banner->user->name }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST"
                                                    action="{{ route('dashboard.banners.destroy', $banner->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.banners.edit', $banner->id) }}">
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
                            <div class="d-flex justify-content-center">
                                {!! $banners->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
