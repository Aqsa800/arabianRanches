@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Leads</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Leads</li>
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
                                    <a href="{{ route('dashboard.leads.create') }}" class="btn btn-block btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        New Lead
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collapse @if(count(request()->all())> 0) show @endif" id="collapseFilter">
                            <form method="GET" action="{{ route('dashboard.leads.index') }}">
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
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Added At</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leads as $key => $lead)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $lead->name }}</td>
                                            <td>{{ $lead->email }}</td>
                                            <td>
                                                <span
                                                    class="badge @if ($lead->status === 'active') bg-success @else bg-danger @endif">
                                                    {{ $lead->status }}
                                                </span>
                                            </td>
                                            <td>{{ $lead->formattedCreatedAt }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST" action="{{ route('dashboard.leads.destroy', $lead->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.leads.edit', $lead->id) }}">
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
                                {!! $leads->links() !!}
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
