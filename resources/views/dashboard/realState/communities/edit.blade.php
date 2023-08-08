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
                        <form class="form-boder" method="POST"
                            action="{{ route('dashboard.communities.update', $community->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" placeholder="Enter Name" name="name"
                                                value="{{ $community->name }}">
                                            @error('name')
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
                                                <input type="file" class="custom-file-input" id="mainImage"
                                                    name="mainImage" accept=".png, .jpg, .jpeg">
                                                <label class="custom-file-label" for="mainImage">Choose file</label>
                                            </div>
                                            @if ($community->mainImage)
                                                <img src="{{ $community->mainImage }}" alt="{{ $community->mainImage }}"
                                                    width="100" height="100">
                                            @endif
                                            @error('mainImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="video_url">Video URL</label>
                                            <input type="text" value="{{ $community->video_url }}" class="form-control @error('video_url') is-invalid @enderror" id="video_url" placeholder="Enter video url" name="video_url">
                                            @error('video_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Community Order</label>
                                            <input type="number" value="{{ $community->community_order }}"
                                                class="form-control @error('community_order') is-invalid @enderror"
                                                id="community_order" placeholder="Enter Order" name="community_order" required>
                                            @error('community_order')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Meta Title</label>
                                            <input type="text" value="{{ $community->meta_title }}" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="Enter Meta Title" name="meta_title">
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
                                            <textarea id="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" placeholder="Enter Meta Keywords">{{$community->meta_keyword}}</textarea>
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
                                            <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" placeholder="Enter Meta Description">{{$community->meta_description}}</textarea>
                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="completionStatus">Completion Status</label>
                                            <select class="form-control @error('completion_status_id') is-invalid @enderror"
                                                id="completionStatus" name="completion_status_id">
                                                <option value="">Choose Completion Status</option>
                                                @foreach ($completionStatuses as $status)
                                                    <option value="{{ $status->id }}" @if ($community->construction_status == $status->id) selected @endif >
                                                        {{ $status->name }}</option>
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
                                            <select class="form-control @error('developer_id') is-invalid @enderror"
                                                id="developer" name="developer_id">
                                                <option value="">Choose Developer</option>
                                                @foreach ($developers as $developer)
                                                    <option value="{{ $developer->id }}"
                                                        @if ($community->developer_id == $developer->id) selected @endif>
                                                        {{ $developer->name }}</option>
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
                                            <select multiple="multiple" data-placeholder="Select Offer Type"
                                                style="width: 100%;"
                                                class="select2 form-control @error('offer_type_id') is-invalid @enderror"
                                                id="offerType" name="offer_type_id[]">
                                                <option value="">Choose Offertype</option>
                                                @foreach ($offerTypes as $offerType)
                                                    
                                                        <option value="{{ $offerType->id }}"
                                                            @foreach ($community->offerType as $offer)  @if ($offer->id == $offerType->id) selected @endif @endforeach>
                                                            {{ $offerType->name }}</option>
                                                    
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
                                            
                                            <select multiple="multiple" data-placeholder="Select Accommodations"
                                                style="width: 100%;"
                                                class="select2 form-control @error('accommodationIds') is-invalid @enderror"
                                                id="accommodations" name="accommodationIds[]">
                                                @foreach ($accommodations as $accommodation)
                                                    
                                                        <option value="{{ $accommodation->id }}"
                                                            @foreach ($community->accommodations as $acc)  @if ($acc->id == $accommodation->id) selected @endif @endforeach>
                                                            {{ $accommodation->name }}</option>
                                                    
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
                                            <label for="subImages">Gallery</label>
                                            <div class="custom-file  @error('subImages') is-invalid @enderror">
                                                <input type="file" class="custom-file-input" id="subImages"
                                                    name="subImages[]" accept=".png, .jpg, .jpeg" multiple>
                                                <label class="custom-file-label" for="subImages">Choose file</label>
                                            </div>
                                            
                                            <div class="swiper mySwiper">
                                                <div class="swiper-wrapper">
                                                    @foreach ($community->subImages as $image)
                                                        <div class="swiper-slide"><img alt="{{ $community->name }}"
                                                                width="100" height="100" class="table-avatar"
                                                                src="{{ $image }}"></div>
                                                    @endforeach
                                                </div>
                                                <div class="swiper-pagination"></div>
                                            </div>
                                            @error('mainImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                id="status" name="status">
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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="status">Show in Community Guide</label>
                                            <select class="form-control @error('guide') is-invalid @enderror" id="guide"
                                                name="guide">
                                                <option value="0" @if ($community->guide == 0) selected @endif >No</option>
                                                <option value="1" @if ($community->guide == 1) selected @endif >Yes</option>
                                            </select>
                                            @error('guide')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status">Ownership</label>
                                            <select class="form-control @error('ownership') is-invalid @enderror"
                                                id="ownership" name="ownership">

                                                <option value="">Choose Ownership</option>
                                                <option value="Freehold"
                                                    @if ($community->ownership == 'Freehold') selected @endif>Freehold</option>
                                                <option value="Leasehold"
                                                    @if ($community->ownership == 'Leasehold') selected @endif>Leasehold</option>
                                            </select>
                                            @error('ownership')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status">Emirate</label>
                                            <select class="form-control @error('emirate') is-invalid @enderror"
                                                id="emirate" name="emirate">

                                                <option value="">Choose Location</option>
                                                <option value="Abu Dhabi"
                                                    @if ($community->emirates == 'Abu Dhabi') selected @endif>Abu Dhabi</option>
                                                <option value="Dubai" @if ($community->emirates === 'Dubai') selected @endif>
                                                    Dubai</option>
                                                <option value="Sharjah"
                                                    @if ($community->emirates == 'Sharjah') selected @endif>Sharjah</option>
                                                <option value="Umm Al Qaiwain"
                                                    @if ($community->emirates == 'Umm Al Qaiwain') selected @endif>Umm Al Qaiwain
                                                </option>
                                                <option value="Fujairah"
                                                    @if ($community->emirates == 'Fujairah') selected @endif>Fujairah</option>
                                                <option value="Ajman" @if ($community->emirates == 'Ajman') selected @endif>
                                                    Ajman</option>
                                                <option value="Ras Al Khaimah"
                                                    @if ($community->emirates == 'Ras Al Khaimah') selected @endif>Ras Al Khaimah
                                                </option>
                                            </select>
                                            @error('emirate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="amenities">Communal Facilities</label>
                                            <select multiple="multiple" data-placeholder="Select Communal Facilities"
                                                style="width: 100%;"
                                                class="select2 form-control @error('facilityIds') is-invalid @enderror"
                                                id="facilities" name="facilityIds[]">
                                                @foreach ($amenities as $amenity)
                                                    
                                                        <option value="{{ $amenity->id }}"
                                                            @foreach ($community->facilities as $ameni)  @if ($ameni->id == $amenity->id) selected @endif @endforeach>
                                                            {{ $amenity->name }}</option>
                                                   
                                                @endforeach
                                            </select>
                                            @error('facilityIds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="amenities">Community Amenities</label>
                                            <select multiple="multiple" data-placeholder="Select Community Amenities"
                                                style="width: 100%;"
                                                class="select2 form-control @error('amenityIds') is-invalid @enderror"
                                                id="amenities" name="amenityIds[]">
                                                @foreach ($amenities as $amenity)
                                                    
                                                        <option value="{{ $amenity->id }}"
                                                            @foreach ($community->amenities as $ameni)   @if ($ameni->id == $amenity->id) selected @endif @endforeach>
                                                            {{ $amenity->name }}</option>
                                                    
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
                                            <label for="description">Description</label>
                                            <textarea id="description" class="summernote form-control @error('description') is-invalid @enderror"
                                                name="description">{{$community->description}}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    @if(count($community->proximities) > 0)
                                    
                                    <div class="col-md-12">
                                    @foreach ($community->proximities as $specfc)

                                 
                                        <div class="row" style="align-items: center;">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label for="field" class="form-label">Proximities</label>
        
                                                                <select name="speci_id[]" id="" class="form-control">
                                                                    <option value="">Select Neighbourhood</option>
                                                                    <?php 
                                                                    $speci = App\Models\Neighbour::get();
                                                                    foreach($speci as $spec){
                                                                ?>
                                                                    <option value="{{ $spec->id }}" {{$specfc->id === $spec->id ? 'selected': ''}}>{{ $spec->name }}
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="field" class="hidden-md">Value</label>
                                                                <input type="text" id="field" class="form-control"
                                                                    name="spec_name[]" value="{{$specfc->pivot->value}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-25 append-buttons">
                                                <div class="clearfix" style="margin-top: 10px;">
                                                    <a href="{{ url('dashboard/community/destroySpec/'. $specfc->pivot->id) }}"
                                                        class="btn btn-danger w-50" onclick="return confirm('Are you sure?')"><i
                                                            class="fa fa-times fa-fw"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="dynamic-field">
                                            <div class="row" style="align-items: center;">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label for="field" class="form-label">Proximities</label>
        
                                                                <select name="speci_id[]" id="" class="form-control">
                                                                    <option value="">Select Neighbourhood</option>
                                                                    <?php 
                                                                            $speci = App\Models\neighbour::get();
                                                                            foreach($speci as $spec){
                                                                        ?>
                                                                    <option value="{{ $spec->id }}">{{ $spec->name }}
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="field" class="hidden-md">Value</label>
                                                                <input type="text" id="field" class="form-control"
                                                                    name="spec_name[]" />
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
    <?php $speci = App\Models\neighbour::pluck('name', 'id')->all(); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#add-button").click(function() {
                var specf = <?php echo json_encode($speci); ?>;
                
                var html = '<div class="row" style="align-items: center;">\
                            <div class="col-md-10">\
                                <div class="row" >\
                                    <div class="col-md-10">\
                                        <div class="form-group">\
                                        <label for="field" class="form-label">Proximities</label>\
                                        <select name="speci_id[]" id=""  class="form-control">\
                                                                        <option value="">Select Neighbourhood</option>';
                for (var key in specf) {
                    html += '<option value="' + key + '">' + specf[key] + '</option>';
                };


                html += '   </select>\
                                        </div>\
                                  </div>\
                                  <div class="col-md-2">\
                                        <div class="form-group">\
                                            <label for="field" class="hidden-md">Value</label>\
                                            <input type="text" id="field" class="form-control" name="spec_name[]" />\
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
