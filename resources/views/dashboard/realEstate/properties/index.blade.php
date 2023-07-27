@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">XML Listings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">XML Listings</li>
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
                                <a href="{{ route('dashboard.properties.create') }}" class="btn btn-block btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Listing
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
                                        <th>Refernce No.</th>
                                        <th>Exclusive</th>
                                        <th>Agent</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Added At</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $key => $property)
                                    {{-- @dd($property); --}}
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $property->name }}</td>
                                            <td>{{ $property->reference_number }}</td>
                                            <td>                                                <span
                                                class="badge @if ($property->exclusive === 1) bg-success @else bg-danger @endif">
                                                @if ($property->exclusive === 1) {{"Exclusive"}} @else {{"Non-exclusive"}} @endif
                                            </span></td>
                                            <td>
                                                @if($property->agent)
                                                {{ $property->agent->name }}
                                                @endif</td>
                                            <td>{{ $property->category->name }}</td>
                                            <td>
                                                <span
                                                    class="badge @if ($property->status === 'Active') bg-success @else bg-danger @endif">
                                                    {{ $property->status }}
                                                </span>
                                            </td>
                                            <td>{{ $property->formattedCreatedAt }}</td>
                                            <td class="project-actions text-right">
                                                <form method="POST"
                                                    action="{{ route('dashboard.properties.destroy', $property->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                   
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('dashboard.properties.edit', $property->id) }}">
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
