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
            </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Last added</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($added as $a)
                        <li class="list-group-item"><a href="/place/{{ $a['id'] }}">{{ $a['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Last cleaned</div>

                <div class="card-body">
                    <ul class="list-group">
                            @foreach($cleaned as $a)
                            <li class="list-group-item"><a href="/place/{{ $a['id'] }}">{{ $a['name'] }}</a></li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
