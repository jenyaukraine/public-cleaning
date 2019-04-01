@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Map</div>

                <div class="card-body">

                    <div id="map" style="height: 70vh;"></div>
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
            'images/';

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
        @foreach($map as $m)
        {
            position: new google.maps.LatLng({{ $m->geo }}),
            type: '{{ $m->state }}',
            url: '/place/{{ $m->id }}'
          },
        @endforeach
        ];

        for (var i = 0; i < features.length; i++) {
          var marker = new google.maps.Marker({
            position: features[i].position,
            icon: icons[features[i].type].icon,
            map: map
          });
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
            </div>
        </div>
    </div>
</div>
@endsection
