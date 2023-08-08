@extends('dashboard.layout.index')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Socail Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Socail Setting</li>
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
                            <h3 class="card-title">Socail Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-boder" files="true" method="POST" enctype="multipart/form-data" action="{{ route('dashboard.social-info.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="{{ $email }}" class="form-control " id="email" placeholder="Enter Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                           
                                            <input type="text" value="{{ $contact_number }}" class="form-control " id="contact_number" placeholder="Enter Contact Number" name="contact_number">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" value="{{ $address }}" class="form-control " id="address" placeholder="Enter Address" name="address">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" value="{{ $facebook }}" class="form-control " id="facebook" placeholder="Enter Facebook Page Link" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" value="{{ $twitter }}" class="form-control " id="twitter" placeholder="Enter Twitter Page Link" name="twitter">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="linkedin">Linkedin</label>
                                            <input type="text" value="{{ $linkedin }}" class="form-control " id="linkedin" placeholder="Enter Linkedin Page Link" name="linkedin">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <input type="text" value="{{ $instagram }}" class="form-control " id="instagram" placeholder="Enter Instagram Page Link" name="instagram">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="youtube">Youtube</label>
                                            <input type="text" value="{{ $youtube }}" class="form-control " id="youtube" placeholder="Enter youtube Page Link" name="youtube">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="whatsapp">WhatsApp</label>
                                            <input type="text" value="{{ $whatsapp }}" class="form-control " id="whatsapp" placeholder="Enter whatsapp Number " name="whatsapp">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" value="{{ $location }}" id="address-input" name="location" class="form-control map-input">
                                            <input type="hidden" name="address_latitude" id="address-latitude" value="{{ !empty($address_latitude)?$address_latitude:0}}" />
                                            <input type="hidden" name="address_longitude" id="address-longitude" value="{{ !empty($address_longitude)?$address_longitude:0}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                         <div id="address-map-container" style="width:100%;height:400px; ">
                                           <div style="width: 100%; height: 100%" id="address-map"></div>
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
                    zoom: 22
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
