@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item active">User account information</li>
                            <li class="list-group-item"><b>Username:</b> {{ Auth::user()->name }}</li>
                            <li class="list-group-item"><b>Email:</b> {{ Auth::user()->email }}</li>
                            <li class="list-group-item"><b>Cleaned places:</b> {{ $places['count'] }}</li>
                        </ul>






                        @foreach ($places['data'] as $data)
                        @if($loop->index % 3 === 0)
                        <div class="card-deck pt-5">

                                @endif


                                <div class="card">
                                    <img class="card-img-top" src="{{ asset('storage/'.$data->image) }}"
                                        alt="{{ $data->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->name }}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a
                                                href="https://maps.google.com/?q={{ $data->geo }}">View on Google
                                                Maps</a></li>
                                        <li class="list-group-item">Status: <b style="color:green"> Cleaned</b></li>
                                    </ul>
                                    <div class="card-footer">
                                        <small class="text-muted">Was created {{ $data->created_at }}</small>
                                    </div>
                                </div>

                                @if($loop->index != 0 & $loop->index % 3 === 0)
                            </div>
                            @elseif($loop->last)
                        </div>
                        @endif

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
