@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Off-Plan Projects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Off-Plan Projects</li>
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
                                <a href="{{ route('dashboard.projects.create') }}" class="btn btn-block btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Off-Plan Project
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
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th>Added At</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $key => $project)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>
                                                <span
                                                    class="badge @if ($project->status === 'active') bg-success @else bg-danger @endif">
                                                    {{ $project->status }}
                                                </span>
                                            </td>
                                            <td>{{ $project->user->name }}</td>
                                            <td>{{ $project->formattedCreatedAt }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST"
                                                    action="{{ route('dashboard.projects.destroy', $project->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ route('dashboard.projects.show', $project->id) }}">
                                                        <i class="fas fa-eye"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-dark btn-sm"
                                                        href="{{ route('dashboard.projects.stats', $project->id) }}">
                                                        <i class="fas fa-road"></i>
                                                        Stats
                                                    </a>
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('dashboard.project.paymentPlans', $project->id) }}">
                                                        <i class="fas fa-tasks"></i>
                                                        Payment Plan
                                                    </a>
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ route('dashboard.projects.subProjects', $project->id) }}">
                                                        <i class="fas fa-project-diagram"></i>
                                                        Sub Projects ({{ $project->subProjects->count() }})
                                                    </a>

                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.projects.edit', $project->id) }}">
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
