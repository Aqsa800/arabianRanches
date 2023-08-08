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
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/projects') }}">Off-Plan Projects</a></li>
                        <li class="breadcrumb-item active">Edit Project</li>
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
                            <h3 class="card-title">Edit Project Form</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" id="storeForm" method="POST" action="{{ route('dashboard.projects.update', $project->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" value="{{ $project->title }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" name="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="sub_title">Sub Title</label>
                                            <input type="text" value="{{ $project->sub_title }}" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="Enter Sub Title" name="sub_title">
                                            @error('sub_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                                name="status">
                                                @foreach (config('constants.statuses') as $key=>$value)
                                                    <option value="{{ $key }}" @if($project->status == $key) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="is_feature">Is New Lanuch?</label>
                                            <select class="form-control @error('is_new_launch') is-invalid @enderror" id="is_new_launch" name="is_new_launch">
                                                <option value="1" @if($project->is_new_launch == 1) selected @endif>Yes</option>
                                                <option value="0" @if($project->is_new_launch == 0) selected @endif>No</option>
                                            </select>
                                            @error('is_new_launch')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="is_feature">Is Featured?</label>
                                            <select class="form-control @error('is_featured') is-invalid @enderror" id="is_featured" name="is_featured">
                                                <option value="1" @if($project->is_featured == 1) selected @endif>Yes</option>
                                                <option value="0" @if($project->is_featured == 0) selected @endif>No</option>
                                            </select>
                                            @error('is_featured')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="is_display_home">Is Display on Home Page?</label>
                                            <select class="form-control @error('is_display_home') is-invalid @enderror" id="is_display_home" name="is_display_home">
                                                <option value="1" @if($project->is_display_home == 1) selected @endif>Yes</option>
                                                <option value="0" @if($project->is_display_home == 0) selected @endif>No</option>
                                            </select>
                                            @error('is_display_home')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="starting_price">Starting Price (check to highlight)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input class="checkBox" type="checkbox" id="starting_price_highlight"
                                                        name="starting_price_highlight" value="1" @if($project->starting_price_highlight == 1) checked @endif>
                                                </span>
                                            </div>
                                            <input type="text" value="{{ $project->starting_price }}"
                                                class="form-control @error('starting_price') is-invalid @enderror"
                                                id="starting_price" name="starting_price" placeholder="1.2 Million">
                                            @error('starting_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="completion_date">Completion Date (check to highlight)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input class="checkBox" type="checkbox"
                                                        id="completion_date_highlight"
                                                        name="completion_date_highlight" value="1" @if($project->completion_date_highlight == 1) checked @endif>
                                                </span>
                                            </div>
                                            <input type="text" value="{{ $project->completion_date }}"
                                                class="form-control @error('completion_date') is-invalid @enderror"
                                                id="completion_date" name="completion_date">
                                            @error('completion_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="bedrooms">Bedrooms</label>
                                            <input type="text"  value="{{ $project->bedrooms }}" class="form-control @error('bedrooms') is-invalid @enderror" id="bedrooms"  name="bedrooms" placeholder="1-4">
                                            @error('bedrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="bathrooms">Bathrooms</label>
                                            <input type="number" min="0" value="{{ $project->bathrooms }}" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms"  name="bathrooms">
                                            @error('bathrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="area">Area (check to highlight)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input class="checkBox" type="checkbox" id="area_highlight"
                                                            name="area_highlight" value="1" @if($project->area_highlight == 1) checked @endif>
                                                    </span>
                                                </div>
                                                <input type="text" value="{{ $project->area }}"
                                                    class="form-control @error('area') is-invalid @enderror"
                                                    id="area" name="area">
                                                @error('area')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="area_unit">Area Unit</label>
                                            <select name="area_unit" id="area_unit" class="form-control @error('area_unit') is-invalid @enderror">
                                                <option value=" sqft"> sqft</option>
                                            </select>
                                            @error('area_unit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="accommodation_id">Accommodation (check to highlight)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input class="checkBox" type="checkbox"
                                                            id="accommodation_id_highlight"
                                                            name="accommodation_id_highlight" value="1" @if($project->accommodation_id_highlight == 1) checked @endif>
                                                    </span>
                                                </div>
                                                <div class="overflow-hidden noSideBorder flex-grow-1">

                                                    <select  multiple="multiple"  data-placeholder="Select Accommodation" style="width: 100%;" class="select2 form-control @error('accommodationIds') is-invalid @enderror" id="accommodationIds" name="accommodationIds[]">
                                                        @foreach ($accommodations as $accommodation)
                                                        <option value="{{ $accommodation->id }}" @if(in_array($accommodation->id, $project->accommodations->pluck('id')->toArray())) selected @endif>{{ $accommodation->name }}</option>
                                                        @endforeach
                                                    </select>
                                                @error('accommodationIds')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="highlight_amenities">Highlighted Amenities</label>
                                            <select multiple="multiple" data-placeholder="Select Highlighted Amenities"
                                                style="width: 100%;"
                                                class="select2 form-control @error('highlight_amenities') is-invalid @enderror"
                                                id="highlight_amenities" name="highlight_amenities[]">
                                                @foreach ($amenities as $amenity)
                                                    <option value="{{ $amenity->id }}" @if(in_array($amenity->id, $project->highlighted_amenities->pluck('id')->toArray())) selected @endif>{{ $amenity->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('highlight_amenities')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="amenities">Amenities</label>
                                            <select multiple="multiple" data-placeholder="Select Amenities" style="width: 100%;" class="select2 form-control @error('amenities') is-invalid @enderror" id="amenities" name="amenities[]">
                                                @foreach ($amenities as $amenity)
                                                <option value="{{ $amenity->id }}" @if(in_array($amenity->id, $project->unhighlighted_amenities->pluck('id')->toArray())) selected @endif>{{ $amenity->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('amenities')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="categoryIds">Select Tags</label>
                                            <select multiple="multiple" data-placeholder="Select Tags" style="width: 100%;" class="select2 form-control @error('tagIds') is-invalid @enderror" id="tagIds" name="tagIds[]">

                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}" @if(in_array($tag->id, $project->tags()->pluck('tag_category_id')->toArray())) selected @endif>{{ $tag->name }}</option>
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
                                            <label for="features_description">Features Description <small class="text-danger">(Not more than 5 bullet points - 500 characters)</small></label>
                                            <textarea id="features_description" class="summernote form-control @error('features_description') is-invalid @enderror" name="features_description">{{ $project->features_description }}</textarea>
                                            @error('features_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" value="{{ $project->address }}" id="address-input" name="address" class="form-control map-input">
                                            <input type="hidden" name="address_latitude" id="address-latitude" value="{{  $project->address_latitude }}" />
                                            <input type="hidden" name="address_longitude" id="address-longitude" value="{{  $project->address_longitude }}" />

                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                         <div id="address-map-container" style="width:100%;height:200px; ">
                                           <div style="width: 100%; height: 100%" id="address-map"></div>
                                         </div>
                                       </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="mainImage">Main Image<small class="text-danger">(Prefer Size 1920x1080)</small></label>
                                            <div class="custom-file   @error('mainImage') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="mainImage" name="mainImage" accept="image/*">
                                                <label class="custom-file-label" for="mainImage">Choose file</label>
                                            </div>
                                            @error('mainImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($project->mainImage)
                                            <img src="{{ $project->mainImage }}" alt="{{ $project->mainImage }}" width="" height="100">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="video">Video</label>
                                            <div class="custom-file   @error('video') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="video" name="video" accept=".mp4, .mov, .ogg">
                                                <label class="custom-file-label" for="video">Choose file</label>
                                            </div>
                                            @error('video')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($project->video)
                                            @php $path_info = pathinfo($project->video);@endphp
                                            <video width="200" height="200" autoplay controls>
                                                <source src="{{ $project->video }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                              </video>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exteriorGallery">Exterior Gallery<small class="text-danger">(Prefer Size 1000x600)</small></label>
                                            <div class="custom-file  @error('exteriorGallery') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="exteriorGallery" name="exteriorGallery[]" accept="image/*" multiple>
                                                <label class="custom-file-label" for="exteriorGallery">Choose file</label>
                                            </div>
                                            @error('exteriorGallery')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            @if($project->exteriorGallery)
                                            <br><br>
                                                @if (count($project->exteriorGallery) > 1)
                                                    <a class="btn btn-danger btn-sm float-right"
                                                    onclick="return confirm('Are you sure to delete all images?')"
                                                    href="{{ route('dashboard.projects.exteriorMediasDestroy', $project->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                        Delete Exterior Images
                                                    </a>
                                                @endif
                                                @foreach ($project->exteriorGallery as $img)
                                                <div class="image-area">
                                                    <img src="{{ $img['path'] }}" alt="{{ $img['path'] }}" width="" height="100" style="padding: 10px">
                                                    <a class="remove-image" onclick="return confirm('Are you sure to delete the image?')" href="{{ route('dashboard.projects.media.delete', [$project->id,$img['id'] ]) }}" style="display: inline;">&#215;</a>
                                                </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="interiorGallery">Interior Gallery<small class="text-danger">(Prefer Size 1000x600)</small></label>
                                            <div class="custom-file  @error('interiorGallery') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="interiorGallery" name="interiorGallery[]"  accept="image/*" multiple>
                                                <label class="custom-file-label" for="interiorGallery">Choose file</label>
                                            </div>
                                            @error('interiorGallery')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($project->interiorGallery)
                                            <br><br>
                                                @if (count($project->interiorGallery) > 1)
                                                    <a class="btn btn-danger btn-sm float-right"
                                                    onclick="return confirm('Are you sure to delete all images?')"
                                                    href="{{ route('dashboard.projects.interiorMediasDestroy', $project->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                        Delete Interior Images
                                                    </a>
                                                @endif

                                                @foreach ($project->interiorGallery as $img)
                                                <div class="image-area">
                                                    <img src="{{ $img['path'] }}" alt="{{ $img['path'] }}" width="" height="100" style="padding: 10px">
                                                    <a class="remove-image" onclick="return confirm('Are you sure to delete the image?')" href="{{ route('dashboard.projects.media.delete', [$project->id,$img['id'] ]) }}" style="display: inline;">&#215;</a>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="agent_id">Agent</label>
                                            <select class="form-control select1 @error('agent_id') is-invalid @enderror" id="agent_id" name="agent_id">
                                                @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}" @if($project->agent_id == $agent->id) selected @endif>{{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('agent_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="developer">Developer</label>
                                            <select class="form-control select1 @error('developer_id') is-invalid @enderror" id="developer" name="developer_id">
                                                @foreach ($developers as $developer)
                                                <option value="{{ $developer->id }}" @if($project->developer_id == $developer->id) selected @endif>{{ $developer->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('developer_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="main_community_id">Main Community(check to highlight)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input class="checkBox" type="checkbox"
                                                            id="community_id_highlight"
                                                            name="community_id_highlight" value="1" @if($project->community_id_highlight == 1) checked @endif>
                                                    </span>
                                                </div>

                                                <select data-placeholder="Select Community"
                                                class=" form-control select1 @error('main_community_id') is-invalid @enderror"
                                                id="main_community_id" name="main_community_id">
                                                    @foreach ($communities as $community)
                                                    <option value="{{ $community->id }}" @if($project->community_id == $community->id) selected @endif>{{ $community->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('main_community_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="sub_community_id">Sub Community</label>
                                            <select data-placeholder="Select Community"
                                                class=" form-control select1 @error('sub_community_id') is-invalid @enderror"
                                                id="sub_community_id" name="sub_community_id">
                                                @if ($project->mainCommunity)
                                                <option value="">Select Sub Community</option>
                                                @foreach ($project->mainCommunity->subCommunities as $value)
                                                <option value="{{ $value->id }}" @if($project->sub_community_id == $value->id) selected @endif>{{ $value->name }}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                            @error('sub_community_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="emirate">Emirate</label>
                                            <select data-placeholder="Select Emirate"
                                                class=" form-control select1 @error('emirate') is-invalid @enderror"
                                                id="emirate" name="emirate">

                                                @foreach (config('constants.emirates') as  $value)

                                                    <option value="{{ $value }}" @if($project->emirate == $value) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('emirate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="brochure">Brochure</label>
                                            <div class="custom-file   @error('brochure') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="brochure" name="brochure" accept=".pdf">
                                                <label class="custom-file-label" for="brochure">Choose file</label>
                                            </div>
                                            @error('brochure')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($project->brochure)
                                                <a href="{{ $project->brochure }}" download="">Download Brochure</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="factsheet">FactSheet</label>
                                            <div class="custom-file  @error('factsheet') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="floorPlan" name="factsheet" accept=".pdf">
                                                <label class="custom-file-label" for="factsheet">Choose file</label>
                                            </div>
                                            @error('factsheet')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($project->factsheet)
                                                <a href="{{ $project->factsheet }}" download="">Download Factsheet</a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="paymentPlan">Payment Plan</label>
                                            <div class="custom-file  @error('paymentPlan') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="paymentPlan" name="paymentPlan" accept=".pdf">
                                                <label class="custom-file-label" for="paymentPlan">Choose file</label>
                                            </div>
                                            @error('paymentPlan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($project->paymentPlan)
                                                <a href="{{ $project->paymentPlan }}" download="">Download Payment Plan</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="short_description">Short Description<small class="text-danger">(Not more 300 characters)</small></label>
                                            <textarea id="short_description" class="summernote form-control @error('short_description') is-invalid @enderror" name="short_description">{{ $project->short_description }}</textarea>
                                            @error('short_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="long_description">Long Description</label>
                                            <textarea id="long_description" class="summernote form-control @error('long_description') is-invalid @enderror" name="long_description">{{ $project->long_description }}</textarea>
                                            @error('long_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" value="{{ $project->meta_title }}"
                                                class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                                placeholder="Enter Meta Title" name="meta_title">
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
                                            <input type="text" value="{{ $project->meta_keywords }}"
                                                class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords"
                                                placeholder="Enter Meta Keywords" name="meta_keywords">
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
                                                placeholder="Enter Meta Description" name="meta_description">{{ $project->meta_description }}</textarea>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChuU-X16agmkNHRIw5mqaFTcsMsSlASBs&libraries=places&callback=initialize" async defer></script>
    <script>

        function initialize() {
            const locationInputs = document.getElementsByClassName("map-input");
            const autocompletes = [];
            const geocoder = new google.maps.Geocoder;
            for (let i = 0; i < locationInputs.length; i++) {
                const input = locationInputs[i];
                const fieldKey = input.id.replace("-input", "");
                const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';
                const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
                const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;
                const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 13
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: {lat: latitude, lng: longitude},
                });
                marker.setVisible(isEdit);
                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.key = fieldKey;
                autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
            }

            for (let i = 0; i < autocompletes.length; i++) {
                const input = autocompletes[i].input;
                const autocomplete = autocompletes[i].autocomplete;
                const map = autocompletes[i].map;
                const marker = autocompletes[i].marker;
                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();
                    geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            const lat = results[0].geometry.location.lat();
                            const lng = results[0].geometry.location.lng();
                            setLocationCoordinates(autocomplete.key, lat, lng);
                        }
                    });

                    if (!place.geometry) {
                        window.alert("No details available for input: '" + place.name + "'");
                        input.value = "";
                        return;
                    }
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);
                });
            }
        }
        function setLocationCoordinates(key, lat, lng) {
            const latitudeField = document.getElementById(key + "-" + "latitude");
            const longitudeField = document.getElementById(key + "-" + "longitude");
            latitudeField.value = lat;
            longitudeField.value = lng;
        }

    </script>
@endsection
@section('js')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#main_community_id').on('change', function(e) {
            var category_id = e.target.value;
            $.ajax({
                url: "{{ route('dashboard.community.subcommunities') }}",
                type: "POST",
                data: {
                    category_id: category_id
                },
                success: function(data) {
                    $('#sub_community_id').empty();
                    $.each(data.subcategories, function(index, subcategory) {
                        $('#sub_community_id').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                    })
                }
            })
        });
    });
    $(document).on('change', '.checkBox', function(event) {
        if (this.checked) {
            $(this).attr('value', 1);
            $(this).prop('checked', true);
        } else {
            $(this).attr('value', 0);
            $(this).prop('checked', false);
        }
    });
</script>
@endsection
