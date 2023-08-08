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
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/teams') }}">Teams</a></li>
                        <li class="breadcrumb-item active">New Team</li>
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
                            <h3 class="card-title">New Team Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" files="true" method="POST" enctype="multipart/form-data"
                            action="{{ route('dashboard.teams.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" value="{{ old('name') }}"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Enter Name" name="name" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                id="status" name="status" required>
                                                @foreach (config('constants.statuses') as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="{{ old('email') }}"
                                                class="form-control @error('name') is-invalid @enderror" id="email"
                                                placeholder="Enter Email" name="email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" value="{{ old('contact_number') }}"
                                                class="form-control @error('name') is-invalid @enderror" id="contact_number"
                                                placeholder="Enter Contact Number" name="contact_number" required>
                                            @error('contact_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="logo">Image</label>
                                            <div class="custom-file   @error('image') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image" accept=".png, .jpg, .jpeg" required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Designation</label>
                                            <input type="text" value="{{ old('designation') }}"
                                                class="form-control @error('designation') is-invalid @enderror"
                                                id="designation" placeholder="Enter Designation" name="designation" required>
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Category</label>
                                            <select class="form-control @error('category') is-invalid @enderror"
                                                id="category" name="category" required>
                                                <option value="">Choose Category</option>
                                                <option value="Leader">Leader</option>
                                                <option value="Key">Key Personal</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Broker No.</label>
                                            <input type="text" value="{{ old('rera_no') }}"
                                                class="form-control @error('rera_no') is-invalid @enderror"
                                                id="rera_no" placeholder="Enter Broker No." name="rera_no">
                                            @error('rera_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Team Order</label>
                                            <input type="number" value="{{ old('team_order') }}"
                                                class="form-control @error('team_order') is-invalid @enderror"
                                                id="team_order" placeholder="Enter Order" name="team_order" required>
                                            @error('team_order')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="summernote form-control @error('description') is-invalid @enderror" name="description"></textarea>
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
