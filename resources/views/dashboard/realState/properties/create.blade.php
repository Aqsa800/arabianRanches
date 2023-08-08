@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Properties</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('properties') }}">Properties</a></li>
                        <li class="breadcrumb-item active">New Property</li>
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
                            <h3 class="card-title">New Property Form</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form class="form-boder" method="POST" action="{{ route('dashboard.properties.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="sub_title">Sub Title</label>
                                            <input type="text" value="{{ old('sub_title') }}" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="Enter Sub Title" name="sub_title">
                                            @error('sub_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="is_feature">Featured Project</label>
                                            <select class="form-control @error('featured_project') is-invalid @enderror" id="featured_project" name="featured_project">
                                                <option value=""></option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            @error('featured_project')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Meta Title</label>
                                            <input type="text" value="{{ old('meta_title') }}" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="Enter Meta Title" name="meta_title">
                                            @error('meta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sub_title">Meta Keywords</label>
                                            <textarea id="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" placeholder="Enter Meta Keywords"></textarea>
                                            @error('meta_keyword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="sub_title">Meta Description</label>
                                            <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" placeholder="Enter Meta Description"></textarea>
                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="reference_number">Reference Number</label>
                                            <input type="text" value="{{ old('reference_number') }}" class="form-control @error('reference_number') is-invalid @enderror" id="reference_number" placeholder="Enter Reference Number" name="reference_number">
                                            @error('reference_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="permit_number">Permit Number</label>
                                            <input type="text" value="{{ old('permit_number') }}" class="form-control @error('permit_number') is-invalid @enderror" id="permit_number" placeholder="Enter Permit Number" name="permit_number">
                                            @error('permit_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="mainImage">Main Image</label>
                                            <div class="custom-file   @error('mainImage') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="mainImage" name="mainImage" accept=".png, .jpg, .jpeg, .webp">
                                                <label class="custom-file-label" for="mainImage">Choose file</label>
                                            </div>
                                            @error('mainImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subImages">Gallery</label>
                                            <div class="custom-file  @error('subImages') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="subImages" name="subImages[]" accept=".png, .jpg, .jpeg" multiple>
                                                <label class="custom-file-label" for="subImages">Choose file</label>
                                            </div>
                                            @error('mainImage')
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bedrooms">Bedrooms</label>
                                            <select multiple="multiple" data-placeholder="Select Bedrooms" style="width: 100%;" class="select2 form-control @error('bedrooms') is-invalid @enderror" id="bedrooms" name="bedrooms[]">
                                                <option value="ST">ST</option>
                                                @for ($i = 1; $i < 11; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('bedrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bathrooms">Bathrooms</label>
                                            <input type="number" min="0" value="{{ old('bathrooms') }}" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms"  name="bathrooms">
                                            @error('bathrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="parking_space">Parking Space</label>
                                            <input type="number" min="0" value="{{ old('parking_space') }}" class="form-control @error('parking_space') is-invalid @enderror" id="parking_space"  name="parking_space">
                                            @error('parking_space')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="unit_model">Unit Model</label>
                                            <input type="text" min="0" value="{{ old('unit_model') }}" class="form-control @error('unit_model') is-invalid @enderror" id="unit_model"  name="unit_model">
                                            @error('unit_model')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" min="0" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" id="price"  name="price">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cheques">No.of Cheques</label>
                                            <input type="text" min="0" value="{{ old('cheques') }}" class="form-control @error('cheques') is-invalid @enderror" id="cheques"  name="cheques">
                                            @error('cheques')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cheque_frequency">Cheque Frequency</label>
                                            <input type="text" min="0" value="{{ old('cheque_frequency') }}" class="form-control @error('cheque_frequency') is-invalid @enderror" id="cheque_frequency"  name="cheque_frequency">
                                            @error('cheque_frequency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="area">Built Area</label>
                                            <input type="text" min="0" value="{{ old('area') }}" class="form-control @error('area') is-invalid @enderror" id="area"  name="area">
                                            @error('area')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="area">Plot Area</label>
                                            <input type="text" min="0" value="{{ old('plot_area') }}" class="form-control @error('plot_area') is-invalid @enderror" id="plot_area"  name="plot_area">
                                            @error('plot_area')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="area">Unit Measure</label>
                                            <input type="text" min="0" value="{{ old('unit_measure') }}" class="form-control @error('unit_measure') is-invalid @enderror" id="unit_measure"  name="unit_measure">
                                            @error('unit_measure')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                                name="status">
                                                @foreach (config('constants.statuses') as $key=>$value)
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="is_feature">Is Feature?</label>
                                            <select class="form-control @error('is_feature') is-invalid @enderror" id="is_feature" name="is_feature">
                                                <option value=""></option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            @error('is_feature')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exclusive">Is Exclusive?</label>
                                            <select class="form-control @error('exclusive') is-invalid @enderror" id="exclusive" name="exclusive">
                                                <option value=""></option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            @error('exclusive')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="emirate">Emirate</label>
                                            <select class="form-control @error('emirate') is-invalid @enderror" id="emirate" name="emirate">
                                                <option value="">Choose Location</option>
                                                <option value="Abu Dhabi">Abu Dhabi</option>
                                                <option value="Dubai">Dubai</option>
                                                <option value="Dubai">Sharjah</option>
                                                <option value="Umm Al Qaiwain">Umm Al Qaiwain</option>
                                                <option value="Fujairah">Fujairah</option>
                                                <option value="Ajman">Ajman</option>
                                                <option value="Ras Al Khaimah">Ras Al Khaimah</option>
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
                                            <label for="communities">Community</label>
                                            <select class="form-control @error('communityIds') is-invalid @enderror" id="communities" name="communityIds">
                                                <option value="">Choose Community</option>
                                                @foreach ($communities as $community)
                                                <option value="{{ $community->id }}">{{ $community->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('communityIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="communities">Sub Community</label>
                                            <select class="form-control @error('sub_community') is-invalid @enderror" id="sub_community" name="sub_community">
                                                <option value="">Choose Sub Community</option>
                                                @foreach ($subCommunity as $subCommu)
                                                <option value="{{ $subCommu->id }}">{{ $subCommu->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sub_community')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="agent_id">Agent</label>
                                            <select class="form-control @error('agent_id') is-invalid @enderror" id="agent_id" name="agent_id">
                                                <option value="">Choose Agent</option>
                                                @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
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
                                            <label for="rating">Rating</label>
                                            <input type="number" min="0" max="5" value="{{ old('rating') }}" class="form-control @error('rating') is-invalid @enderror" id="rating"  name="rating">

                                            @error('rating')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="area">Primary View</label>
                                            <input type="text" value="{{ old('primary_view') }}" class="form-control @error('primary_view') is-invalid @enderror" id="primary_view"  name="primary_view">
                                            @error('primary_view')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="completionStatus">Completion Status</label>
                                            <select class="form-control @error('completion_status_id') is-invalid @enderror" id="completionStatus" name="completion_status_id">
                                                <option value="">Choose Completion Status</option>
                                                @foreach ($completionStatuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
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
                                            <label for="developer">Developer</label>
                                            <select class="form-control @error('developer_id') is-invalid @enderror" id="developer" name="developer_id">
                                                <option value="">Choose Developer</option>
                                                @foreach ($developers as $developer)
                                                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('developer_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="offerType">Offer Type</label>
                                            <select class="form-control @error('offer_type_id') is-invalid @enderror" id="offerType" name="offer_type_id">
                                                <option value="">Choose Offering Type</option>
                                                @foreach ($offerTypes as $offerType)
                                                <option value="{{ $offerType->id }}">{{ $offerType->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('offer_type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="accommodations">Accommodations</label>
                                            <select multiple="multiple" data-placeholder="Select Accommodations" style="width: 100%;" class="select2 form-control @error('accommodationIds') is-invalid @enderror" id="accommodations" name="accommodationIds[]">
                                                @foreach ($accommodations as $accommodation)
                                                <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('accommodationIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="amenities">Amenities</label>
                                            <select multiple="multiple" data-placeholder="Select Amenities" style="width: 100%;" class="select2 form-control @error('amenityIds') is-invalid @enderror" id="amenities" name="amenityIds[]">
                                                @foreach ($amenities as $amenity)
                                                <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('amenityIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="categories">Category</label>
                                            <select class="form-control @error('categoryIds') is-invalid @enderror" id="categories" name="categoryIds">
                                                <option value="">Choose Category Status</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('categoryIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
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
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="floorPlan">Floor Plan</label>
                                            <div class="custom-file  @error('floorPlan') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="floorPlan" name="floorPlan" accept=".pdf">
                                                <label class="custom-file-label" for="floorPlan">Choose file</label>
                                            </div>
                                            @error('floorPlan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                   

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" value="{{ old('address') }}" id="address-input" name="address" class="form-control map-input">
                                            <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                                            <input type="hidden" name="address_longitude" id="address-longitude" value="0" />

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
                                    <div class="col-md-12">
                                        <div class="dynamic-field">
                                            <div class="row" style="align-items: center;">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field" class="form-label">Detail</label>
        
                                                                <input type="text" id="field" class="form-control"
                                                                name="detailsKey[]" />
                                                            </div>
                                                        </div>
        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field" class="hidden-md">Value</label>
                                                                <textarea name="detailsName[]" id="field" class="form-control"></textarea>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-25 append-buttons">
                                                    <div class="clearfix" style="margin-top: 10px;">
                                                        <button type="button" id="add-button" class="btn btn-secondary w-50"><i
                                                                class="fa fa-plus fa-fw"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            var html = '';
            $('.basic-multiple').select2();
            $("#add-button").click(function() {
                var html = '<div class="row" style="align-items: center;">\
                        <div class="col-md-10">\
                            <div class="row" >\
                                <div class="col-md-6">\
                                    <div class="form-group">\
                                    <label for="field" class="form-label">Detail</label>\
                                    <input type="text" id="field" class="form-control" name="detailsName[]" />\
                                    </div>\
                              </div>\
                              <div class="col-md-6">\
                                    <div class="form-group">\
                                        <label for="field" class="hidden-md">Value</label>\
                                        <textarea name="detailsName[]" id="field" class="form-control"></textarea>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="col-md-2 mt-25 append-buttons">\
                            <div class="clearfix" style="margin-top: 10px;">\
                                <a herf="javascript:void(0);" class="btn btn-danger w-50 remove-row"><i class="fa fa-times fa-fw"></i>\
                                </a>\
                            </div>\
                        </div>\
                    </div>'
                $(".dynamic-field").before($(html));
            });
        });


        $(document).on('click', '.remove-row', function() {
            $(this).closest('.row').remove();
        });
        
    </script>
@endsection
