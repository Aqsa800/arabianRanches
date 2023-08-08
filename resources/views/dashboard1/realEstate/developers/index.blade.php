@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Developers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Developers</li>
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

                                <a href="{{ route('dashboard.developers.create') }}" class="btn btn-block btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Developer
                                </a>

                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Logo</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th>Added At</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($developers as $key => $developer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $developer->name }}</td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        @if ($developer->logo)
                                                            <img alt="{{ $developer->name }}" class="table-avatar" width="100"
                                                                src="{{ $developer->logo }}">
                                                        @endif
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge @if ($developer->status === 'active') bg-success @else bg-danger @endif">
                                                    {{ $developer->status }}
                                                </span>
                                            </td>
                                            <td>{{ $developer->user->name }}</td>
                                            <td>{{ $developer->formattedCreatedAt }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST"
                                                    action="{{ route('dashboard.developers.destroy', $developer->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('dashboard.developer.details', $developer->id) }}">
                                                        <i class="fas fa-database"></i>
                                                        Details
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.developers.edit', $developer->id) }}">
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
        </div>
    </section>
@endsection
