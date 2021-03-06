@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add new</div>

                <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                        </div>
                        @endif


                        {!! Form::open(['route'=>'place_add','files' => 'true','enctype'=>'multipart/form-data']) !!}
                                @csrf


                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                        <div class="col-md-6">
                                            <input id="country" type="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>


                                <div class="form-group row">
                                        <label for="geo" class="col-md-4 col-form-label text-md-right">{{ __('Geo') }}</label>

                                        <div class="col-md-6">
                                       <input id="geo" type="geo" class="form-control{{ $errors->has('geo') ? ' is-invalid' : '' }}" name="geo" placeholder="50.000,10.000" required>

                                            @if ($errors->has('geo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('geo') }}</strong>
                                                </span>
                                            @endif

                                            <div id="map" style="height: 70vh;"></div>
                                        </div>
                                </div>







                                <script>
                                   var map;
var markersArray = [];

function initMap() {
  var haightAshbury = new google.maps.LatLng(59.432216, 24.746199);
  var mapOptions = {
    zoom: 12,
    center: haightAshbury,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  map =  new google.maps.Map(document.getElementById("map"), mapOptions);

  google.maps.event.addListener(map, 'click', function(event) {
      deleteOverlays();
    addMarker(event.latLng);
    console.log();
    $("#geo" ).val( event.latLng.lat()+", "+event.latLng.lng() );
    map.setCenter(marker.position);
  });
}

function addMarker(location) {
  marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markersArray.push(marker);
}

// Removes the overlays from the map, but keeps them in the array
function clearOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
  }
}

// Shows any overlays currently in the array
function showOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(map);
    }
  }
}

// Deletes all markers in the array by removing references to them
function deleteOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
    markersArray.length = 0;
  }
}

                                </script>
                                <script type="text/javascript"
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM599vxZ1gqoLYXY-zkNfnzTiUeHNQb4E&callback=initMap"
                                    defer></script>



                                <div class="form-group row">
                                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image" required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create new place') }}
                                        </button>
                                    </div>
                                </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
