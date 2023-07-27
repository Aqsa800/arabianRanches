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
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/properties') }}">XML Listings</a></li>
                        <li class="breadcrumb-item active">Edit Listing</li>
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
                            <h3 class="card-title">Edit Listing Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" id="storeForm" method="POST" action="{{ route('dashboard.properties.update', $property->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" value="{{ $property->name }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sub_title">Sub Title</label>
                                            <input type="text" value="{{ $property->sub_title }}" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="Enter Sub Title" name="sub_title">
                                            @error('sub_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="primary_view">Primary View</label>
                                            <input type="text" value="{{ $property->primary_view }}" class="form-control @error('primary_view') is-invalid @enderror" id="primary_view"  name="primary_view">
                                            @error('primary_view')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="emirate">Select Emirate</label>
                                            <select class="form-control select1 @error('emirate') is-invalid @enderror" id="emirate" name="emirate" required>
                                            @foreach (config('constants.emirates') as $key=>$value)
                                                <option value="{{ $value }}" @if($property->emirate == $value) selected @endif>{{ $value }}</option>
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
                                            <label for="permit_number">Permit Number</label>
                                            <input type="text" value="{{ $property->permit_number }}" class="form-control @error('permit_number') is-invalid @enderror" id="permit_number" placeholder="Enter Permit Number" name="permit_number">
                                            @error('permit_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="reference_number">Reference Number</label>
                                            <input type="text" value="{{ $property->reference_number }}" class="form-control @error('reference_number') is-invalid @enderror" id="reference_number" placeholder="Enter Reference Number" name="reference_number">
                                            @error('reference_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="is_display_home">Is Display on Home Page?</label>
                                            <select class="form-control select1 @error('is_display_home') is-invalid @enderror" id="is_display_home" name="is_display_home">
                                                @foreach (config('constants.booleanOptions') as $key=>$value)
                                                <option value="{{ $key }}"  @if($property->is_display_home == $key) selected @endif>{{ $value }}</option>
                                                @endforeach

                                            </select>
                                            @error('is_display_home')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="property_source">Property Source</label>
                                            <select class="form-control select1 @error('property_source') is-invalid @enderror" id="property_source" name="property_source">
                                                @foreach (config('constants.propertySources') as $value)
                                                <option value="{{ $value }}" @if($property->property_source == $value) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('property_source')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select1 @error('status') is-invalid @enderror" id="status"
                                                name="status">
                                                @foreach (config('constants.statuses') as $key=>$value)
                                                    <option value="{{ $key }}" @if($property->status == $key) seleted @endif>{{ $value }}</option>
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
                                            <label for="accommodation_id">Accommodation</label>
                                            <select class="form-control select1 @error('accommodation_id') is-invalid @enderror" id="accommodation_id"
                                                name="accommodation_id">
                                                @foreach ($accommodations as $key=>$value)
                                                    <option value="{{ $value->id }}" @if($property->accommodation_id == $value->id) seleted @endif>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('accommodation_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bedrooms">Bedrooms</label>
                                            <select data-placeholder="Select Bedrooms" style="width: 100%;" class="form-control select1 @error('bedrooms') is-invalid @enderror" id="bedrodoms" name="bedrooms">
                                                @foreach ($bedrooms as $value)
                                                <option value="{{ $value }}" @if($property->bedrooms == $value) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('bedrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bathrooms">Bathrooms</label>
                                            <input type="number" min="0" value="{{ $property->bathrooms }}" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms"  name="bathrooms">
                                            @error('bathrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="area">Total Area</label>
                                            <input type="number" min="0" value="{{$property->area }}" class="form-control @error('area') is-invalid @enderror" id="area"  name="area">
                                            @error('area')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" value="{{ $property->price }}" class="form-control @error('price') is-invalid @enderror" id="price"  name="price">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="currency">Currency</label>
                                            <select class="form-control @error('currency') is-invalid @enderror" id="currency"
                                            name="currency">
                                            @foreach ($currencies as $key=>$value)
                                                <option value="{{ $value }}" @if($property->currency) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                            @error('currency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select class="form-control  select1 @error('category_id') is-invalid @enderror" id="category_id"
                                                name="category_id">
                                                @foreach ($categories as $key=>$value)
                                                <option value="{{ $value->id }}" @if($property->category_id == $value->id) selected @endif>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exclusive">Is Exclusive?</label>
                                            <select class="form-control select1 @error('exclusive') is-invalid @enderror" id="exclusive" name="exclusive">
                                                @foreach (config('constants.booleanOptions') as $key=>$value)
                                                <option value="{{ $key }}"  @if($property->exclusive == $key) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('exclusive')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="is_feature">Is Feature?</label>
                                            <select class="form-control select1 @error('is_feature') is-invalid @enderror" id="is_feature" name="is_feature">
                                                @foreach (config('constants.booleanOptions') as $key=>$value)
                                                <option value="{{ $key }}"  @if($property->is_feature == $key) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('is_feature')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="is_furniture">Is Furnitue?</label>
                                            <select class="form-control select1 @error('is_furniture') is-invalid @enderror" id="is_furniture" name="is_furniture">
                                                @foreach (config('constants.furnitueOption') as $key=>$value)
                                                <option value="{{ $key }}"  @if($property->is_furniture == $key) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('is_furniture')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="rating">Rating</label>
                                            <input type="number" min="0" max="5" value="{{ $property->rating }}" class="form-control @error('rating') is-invalid @enderror" id="rating"  name="rating">

                                            @error('rating')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="summernote form-control @error('description') is-invalid @enderror" name="description">{{ $property->description }}</textarea>
                                            @error('description')
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
                                                <input type="file" class="custom-file-input" id="mainImage" name="mainImage" accept="image/*" >
                                                <label class="custom-file-label" for="mainImage">Choose file</label>
                                            </div>
                                            @error('mainImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($property->mainImage)
                                                <img src="{{ $property->mainImage }}" alt="{{ $property->mainImage }}" height="100">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="subImages">Sub Images</label>
                                            <div class="custom-file  @error('subImages') is-invalid @enderror">
                                                <input  multiple type="file" class="custom-file-input" id="subImages" name="subImages[]" accept="image/*" multiple >
                                                <label class="custom-file-label" for="subImages">Choose file</label>
                                            </div>
                                            @error('subImages')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($property->subImages)
                                            <br><br>
                                            @if (count($property->subImages) > 1)
                                                    <a class="btn btn-danger btn-sm float-right"
                                                    onclick="return confirm('Are you sure to delete all images?')"
                                                    href="{{ route('dashboard.properties.medias.delete', $property->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                        Delete All Images
                                                    </a>
                                                @endif
                                                @foreach ($property->subImages as $img)
                                                <div class="image-area">
                                                    <img src="{{ $img['path'] }}" alt="{{ $img['path'] }}" width="" height="100" style="padding: 10px">
                                                    <a class="remove-image" onclick="return confirm('Are you sure to delete the image?')" href="{{ route('dashboard.properties.media.delete', [$property->id,$img['id'] ]) }}" style="display: inline;">&#215;</a>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="qr">QR</label>
                                            <div class="custom-file  @error('qr') is-invalid @enderror">
                                                <input multiple type="file" class="custom-file-input @error('qr') is-invalid @enderror" id="qr"
                                                    name="qr" accept="image/*" >
                                                <label class="custom-file-label" for="qr">Choose file</label>
                                            </div>
                                            @error('qr')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($property->qr)
                                                <img src="{{ $property->qr }}" alt="{{ $property->qr }}" height="100">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="agent_id">Agent</label>
                                            <select data-placeholder="Select Agent" style="width: 100%;" class=" form-control select1 @error('agent_id') is-invalid @enderror" id="agent_id" name="agent_id">
                                                @foreach ($agents as $value)
                                                <option value="{{ $value->id }}" @if($property->agent_id == $value->id) selected @endif>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('agent_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="developer_id">Developer</label>
                                            <select data-placeholder="Select Developer" style="width: 100%;" class=" form-control select1 @error('developer_id') is-invalid @enderror" id="developer_id" name="developer_id">
                                                @foreach ($developers as $value)
                                                <option value="{{ $value->id }}" @if($property->developer_id == $value->id) selected @endif>{{ $value->name }}</option>
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
                                            <label for="completion_status_id">Completion Status</label>
                                            <select data-placeholder="Select Completion Status" style="width: 100%;" class=" form-control select1 @error('completion_status_id') is-invalid @enderror" id="completion_status_id" name="completion_status_id">
                                                @foreach ($completionStatuses as $value)
                                                <option value="{{ $value->id }}" @if($property->completion_status_id == $value->id) selected @endif>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('completion_status_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="community_id">Community</label>
                                            <select data-placeholder="Select community" style="width: 100%;" class=" form-control select1 @error('community_id') is-invalid @enderror" id="community_id" name="community_id">
                                                @foreach ($communities as $value)
                                                <option value="{{ $value->id }}" @if($property->community_id == $value->id) selected @endif>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('community_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sub_community_id">Sub Community</label>
                                            <select data-placeholder="Select Community" style="width: 100%;" class="form-control select1 @error('sub_community_id') is-invalid @enderror" id="sub_community_id" name="sub_community_id">
                                                @foreach ($property->communities->subCommunities as $value)
                                                <option value="{{ $value->id }}" @if($property->subcommunity_id == $value->id) selected @endif>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sub_community_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="year_build_text">Year Build Text</label>
                                            <input type="text" value="{{ $property->year_build_text }}" class="form-control @error('year_build_text') is-invalid @enderror" id="year_build_text" placeholder="Enter Year Build Next" name="year_build_text">
                                            @error('year_build_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="parking_space">Parking Space</label>
                                            <input type="number" min="0" value="{{ $property->parking_space }}" class="form-control @error('parking_space') is-invalid @enderror" id="parking_space"  name="parking_space">
                                            @error('parking_space')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cheque_frequency">Price Unit</label>
                                            <input type="text"  value="{{ $property->cheque_frequency }}" class="form-control @error('cheque_frequency') is-invalid @enderror" id="cheque_frequency"  name="cheque_frequency">
                                            @error('cheque_frequency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="offer_type_id">Offer Type</label>
                                            <select class="form-control select1 @error('offer_type_id') is-invalid @enderror" id="offer_type_id" name="offer_type_id">
                                                @foreach ($offerTypes as $offerType)
                                                <option value="{{ $offerType->id }}" @if($property->offer_type_id == $offerType->id) selected @endif>{{ $offerType->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('offer_type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="amenities">Amenities</label>
                                            <select multiple="multiple" data-placeholder="Select Amenities" style="width: 100%;" class="select2 form-control @error('amenityIds') is-invalid @enderror" id="amenities" name="amenityIds[]">
                                                @foreach ($amenities as $amenity)
                                                <option value="{{ $amenity->id }}" @if(in_array($amenity->id, $property->amenities->pluck('id')->toArray())) selected @endif>{{ $amenity->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('amenityIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" value="{{ $property->address }}" id="address-input" name="address" class="form-control map-input">
                                            <input type="hidden" name="address_latitude" id="address-latitude" value="{{ $property->address_latitude }}" />
                                            <input type="hidden" name="address_longitude" id="address-longitude" value="{{ $property->address_longitude }}" />

                                            @error('amenties_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                         <div id="address-map-container" style="width:100%;height:400px; ">
                                           <div style="width: 100%; height: 100%" id="address-map"></div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" value="{{ $property->meta_title }}"
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
                                            <input type="text" value="{{ $property->meta_keywords }}"
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
                                                placeholder="Enter Meta Description" name="meta_description">{{ $property->meta_description }}</textarea>
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
        $('#community_id').on('change', function(e) {
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
</script>
@endsection
