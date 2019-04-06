@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Show place:</div>

                <div class="col-md-12 pt-4 pb-4">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">

                            <ul class="list-group">
                                <li class="list-group-item active">About this place</li>
                                <li class="list-group-item"><b>Name:</b> {{ $place->name }}</li>
                                <li class="list-group-item">Status: {!!
                                        BridesController::getStatus($place->state)
                                        !!}
                                    </li>
                                    <li class="list-group-item">
                                            <div id="map" style="height: 25vh;"></div>
                                </li>
                            </ul>


                            <div class="card-body">


                                    {!! Form::open(['route'=>'place_review','files' => 'true','enctype'=>'multipart/form-data']) !!}

                                    @csrf
                                    <input type="hidden" name="place_id" value="{{ $id }}">

                                    <div class="form-group row pt-4">
                                        <label for="image"
                                            class="col-md-12 col-form-label text-center">{{ __('Cleaned place image') }}</label>

                                        <div class="col-md-12 pt-2">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                    id="image" name="image" required>
                                                <label class="custom-file-label" for="image">Upload photo of cleaned place</label>
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
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Review my cleaning') }}
                                            </button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                        </div>




                        <div class="col-md-6">


                            <div class="card-deck">
                                <div class="card">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">That's was before
                                        </li>
                                        <li class="list-group-item"><img class="card-img-top"
                                                src="{{ asset('storage/'.$place->image) }}" alt="{{ $place->name }}">
                                        </li>
                                        @if($place->review_image && $place->approved == '1')
                                        <li class="list-group-item">That's after
                                        </li>
                                        <li class="list-group-item"><img class="card-img-top"
                                                src="{{ asset('storage/'.$place->review_image) }}"
                                                alt="{{ $place->name }}">
                                        </li>
                                        @endif

                                    </ul>

                                </div>

                            </div>

                        </div>
                    </div>

                    <script>
                            function initMap() {
                                console.log('Google Maps API version: ' + google.maps.version);
                                // Styles a map in night mode.
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {
                                        lat: 59.432416,
                                        lng: 24.749199
                                    },
                                    zoom: 12,
                                    styles: [{
                                            elementType: 'geometry',
                                            stylers: [{
                                                color: '#242f3e'
                                            }]
                                        },
                                        {
                                            elementType: 'labels.text.stroke',
                                            stylers: [{
                                                color: '#242f3e'
                                            }]
                                        },
                                        {
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#746855'
                                            }]
                                        },
                                        {
                                            featureType: 'administrative.locality',
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#d59563'
                                            }]
                                        },
                                        {
                                            featureType: 'poi',
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#d59563'
                                            }]
                                        },
                                        {
                                            featureType: 'poi.park',
                                            elementType: 'geometry',
                                            stylers: [{
                                                color: '#263c3f'
                                            }]
                                        },
                                        {
                                            featureType: 'poi.park',
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#6b9a76'
                                            }]
                                        },
                                        {
                                            featureType: 'road',
                                            elementType: 'geometry',
                                            stylers: [{
                                                color: '#38414e'
                                            }]
                                        },
                                        {
                                            featureType: 'road',
                                            elementType: 'geometry.stroke',
                                            stylers: [{
                                                color: '#212a37'
                                            }]
                                        },
                                        {
                                            featureType: 'road',
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#9ca5b3'
                                            }]
                                        },
                                        {
                                            featureType: 'road.highway',
                                            elementType: 'geometry',
                                            stylers: [{
                                                color: '#746855'
                                            }]
                                        },
                                        {
                                            featureType: 'road.highway',
                                            elementType: 'geometry.stroke',
                                            stylers: [{
                                                color: '#1f2835'
                                            }]
                                        },
                                        {
                                            featureType: 'road.highway',
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#f3d19c'
                                            }]
                                        },
                                        {
                                            featureType: 'transit',
                                            elementType: 'geometry',
                                            stylers: [{
                                                color: '#2f3948'
                                            }]
                                        },
                                        {
                                            featureType: 'transit.station',
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#d59563'
                                            }]
                                        },
                                        {
                                            featureType: 'water',
                                            elementType: 'geometry',
                                            stylers: [{
                                                color: '#17263c'
                                            }]
                                        },
                                        {
                                            featureType: 'water',
                                            elementType: 'labels.text.fill',
                                            stylers: [{
                                                color: '#515c6d'
                                            }]
                                        },
                                        {
                                            featureType: 'water',
                                            elementType: 'labels.text.stroke',
                                            stylers: [{
                                                color: '#17263c'
                                            }]
                                        }
                                    ]
                                });


                                var iconBase =
                '/images/';

            var icons = {
              1: {
                icon: iconBase + 'green.png'
              },
              2: {
                icon: iconBase + 'red.png'
              },
              3: {
                icon: iconBase + 'gray.png'
              }
            };

            var features = [
               {
                position: new google.maps.LatLng({{ $place->geo }}),
                type: '{{ $place->state }}',
                url: '/place/{{ $place->id }}'
              },
            ];

            for (var i = 0; i < features.length; i++) {
              var marker = new google.maps.Marker({
                position: features[i].position,
                icon: icons[features[i].type].icon,
                map: map
              });
              map.panTo(marker.position);
            };
            google.maps.event.addListener(marker, 'click', function() {
                //console.log(this);
        window.location.href = this.url;
    });

                            }

                        </script>
                        <script type="text/javascript"
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM599vxZ1gqoLYXY-zkNfnzTiUeHNQb4E&callback=initMap"
                            defer></script>



                </div>
                <div class="card-footer">
                    <small class="text-muted">Was created {{ $place->created_at }}</small>
                </div>
            </div>
        </div>
    </div>
    @endsection
