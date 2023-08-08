@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Communities</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/communities') }}">Communities</a></li>
                        <li class="breadcrumb-item active">Edit Community</li>
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
                            <h3 class="card-title">Edit Community Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" id="storeForm" method="POST" 
                            action="{{ route('dashboard.communities.update', $community->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" value="{{ $community->name }}"
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
                                            <label for="emirates">Select Emirate</label>
                                            <select class="form-control select1 @error('emirates') is-invalid @enderror"
                                                id="emirates" name="emirates" required>
                                                @foreach (config('constants.emirates') as $key => $value)
                                                    <option value="{{ $value }}"
                                                        @if ($community->emirates == $value) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('emirates')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select1 @error('status') is-invalid @enderror"
                                                id="status" name="status" required>
                                                @foreach (config('constants.statuses') as $key => $value)
                                                    <option value="{{ $key }}"
                                                        @if ($community->status == $key) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="mainImage">Main Image</label>
                                            <div class="custom-file  @error('mainImage') is-invalid @enderror">
                                                <input type="file"
                                                    class="custom-file-input  @error('mainImage') is-invalid @enderror"
                                                    id="mainImage" name="mainImage" accept="image/*">
                                                <label class="custom-file-label" for="mainImage">Choose file</label>
                                            </div>
                                            @error('mainImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @if ($community->mainImage)
                                            <img src="{{ $community->mainImage }}" alt="{{ $community->mainImage }}"
                                                height="200">
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="imageGallery">Image Gallery</label>
                                            <div class="custom-file  @error('imageGallery') is-invalid @enderror">
                                                <input type="file"
                                                    class="custom-file-input  @error('imageGallery') is-invalid @enderror @error('imageGallery.*') is-invalid @enderror"
                                                    id="imageGallery" name="imageGallery[]" accept="image/*" multiple>
                                                <label class="custom-file-label" for="imageGallery">Choose file</label>
                                            </div>
                                            @error('imageGallery')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @error('imageGallery.*')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($community->imageGallery)
                                            <br><br>
                                            @if (count($community->imageGallery) > 1)
                                                    <a class="btn btn-danger btn-sm float-right"
                                                    onclick="return confirm('Are you sure to delete all images?')"
                                                    href="{{ route('dashboard.communities.medias.delete', $community->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                        Delete All Images
                                                    </a>
                                            @endif
                                            @foreach ($community->imageGallery as $img)
                                                <div class="image-area">
                                                    <img src="{{ $img['path'] }}" alt="{{ $img['path'] }}"
                                                        width="" height="100" style="padding: 10px">
                                                    <a class="remove-image"
                                                        onclick="return confirm('Are you sure to delete the image?')"
                                                        href="{{ route('dashboard.communities.media.delete', [$community->id, $img['id']]) }}"
                                                        style="display: inline;">&#215;</a>
                                                </div>
                                            @endforeach
                                        @endif
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="video">Video</label>
                                            <div class="custom-file   @error('video') is-invalid @enderror">
                                                <input type="file"
                                                    class="custom-file-input @error('video') is-invalid @enderror"
                                                    id="video" name="video" accept=".mp4, .mov, .ogg">
                                                <label class="custom-file-label" for="video">Choose file</label>
                                            </div>
                                            @error('video')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @if ($community->video)
                                            <video width="200" height="200" autoplay controls>
                                                <source src="{{ $community->video }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="categoryIds">Select Categories</label>
                                            <select multiple="multiple" data-placeholder="Select Categories"
                                                style="width: 100%;"
                                                class="select2 form-control @error('categoryIds') is-invalid @enderror"
                                                id="categoryIds" name="categoryIds[]">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if (in_array($category->id, $community->categories->pluck('id')->toArray())) selected @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('categoryIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="developerIds">Select Developers</label>
                                            <select multiple="multiple" data-placeholder="Select Developers"
                                                style="width: 100%;"
                                                class="select2 form-control @error('developerIds') is-invalid @enderror"
                                                id="developerIds" name="developerIds[]">
                                                @foreach ($developers as $developer)
                                                    <option value="{{ $developer->id }}"
                                                        @if (in_array($developer->id, $community->communityDevelopers->pluck('id')->toArray())) selected @endif>
                                                        {{ $developer->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('developerIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="categoryIds">Select Tags</label>
                                            <select multiple="multiple" data-placeholder="Select Tags"
                                                style="width: 100%;"
                                                class="select2 form-control @error('tagIds') is-invalid @enderror"
                                                id="tagIds" name="tagIds[]">

                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                        @if (in_array(
                                                                $tag->id,
                                                                $community->tags()->pluck('tag_category_id')->toArray())) selected @endif>
                                                        {{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('tagIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="short_description">Short Description<small class="text-danger">(Not more 300 characters)</small></label>
                                            <textarea id="short_description" class="summernote form-control @error('short_description') is-invalid @enderror"
                                                name="short_description">{{ $community->short_description }}</textarea>
                                            @error('short_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="summernote form-control @error('description') is-invalid @enderror"
                                                name="description">{{ $community->description }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" value="{{ $community->meta_title }}"
                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                id="meta_title" placeholder="Enter Meta Title" name="meta_title">
                                            @error('meta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords<small class="text-danger">(Multiple keywords separated with comas)</small></label>
                                            <input type="text" value="{{ $community->meta_keywords }}"
                                                class="form-control @error('meta_keywords') is-invalid @enderror"
                                                id="meta_keywords" placeholder="Enter Meta Keywords"
                                                name="meta_keywords">
                                            @error('meta_keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                                                placeholder="Enter Meta Description" name="meta_description">{{ $community->meta_description }}</textarea>
                                            @error('meta_description')
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
                                <button type="submit" class="btn btn-primary storeBtn">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
