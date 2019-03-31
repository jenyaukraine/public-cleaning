@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Map</div>

                <div class="card-body">
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=34.75700855255128%2C50.88949891131081%2C34.79284286499024%2C50.90349291524889&amp;layer=mapnik&amp;marker=50.896496438932225%2C34.77492570877075" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.8965&amp;mlon=34.7749#map=16/50.8965/34.7749">Посмотреть более крупную карту</a></small>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
