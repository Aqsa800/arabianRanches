@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Teams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Teams</li>
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
                                    <a href="{{ route('dashboard.teams.create') }}"
                                        class="btn btn-block btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        New Team
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collapse @if(count(request()->all())> 0) show @endif" id="collapseFilter">
                            <form method="GET" action="{{ route('dashboard.teams.index') }}">
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
                                        <th>Designation</th>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <th>Order</th>
                                        <th>Added By</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $key => $team)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>@if($team->image)
                                                <img src="{{ $team->image }}" alt="{{ $team->name }}" width="100" height="100" style="object-fit: cover">
                                                @endif</td>
                                            <td>{{ $team->designation }}</td>
                                            <td>
                                                <span
                                                    class="badge @if ($team->status === 'active') bg-success @else bg-danger @endif">
                                                    {{ $team->status }}
                                                </span>
                                            </td>
                                            <td>{{ $team->category }}</td>
                                            <td>{{ $team->team_order }}</td>
                                            <td>{{ $team->user->name }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST"
                                                    action="{{ route('dashboard.teams.destroy', $team->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.teams.edit', $team->id) }}">
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
                                {!! $teams->links() !!}
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
