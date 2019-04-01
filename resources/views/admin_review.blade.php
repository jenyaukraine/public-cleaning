@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </div>
<script>
function create(t,k){
    t = parseInt(t);
    if(isNaN(t))
        return;
    $.ajax({
        url: '/review/approve/'+t+'/'+k,
        type: 'GET',
        success: function(result) {
            location.reload();
        }
    });
}

function destroy(t){
    t = parseInt(t);
    if(isNaN(t))
        return;
    $.ajax({
        url: '/review/delete/'+t,
        type: 'GET',
        success: function(result) {
            location.reload();
        },
        error: function(r){
            console.log(r);
        }
    });
}
</script>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Review</div>

                <div class="card-body">

                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Place</th>
                                    <th scope="col">Before</th>
                                    <th scope="col">After</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                        @foreach($places as $a)
                                        <tr>
                                                <th scope="row">{{ $a['id'] }}</th>
                                                <td><a href="/place/{{ $a['id'] }}">{{ $a['name'] }}</a></td>
                                                <td><a href="{{ asset('storage/'.$a->image) }}"><img width="200px" src="{{ asset('storage/'.$a->image) }}"></a></td>
                                                <td><a href="{{ asset('storage/'.$a->image) }}"><img width="200px" src="{{ asset('storage/'.$a->review_image) }}"></a></td>
                                                <td>
                                                        <button class='btn btn-success' onclick="create({{ $a['review_id'] }}, {{ $a['user_id'] }})">{{ __('Approve') }}</button>
                                                        <button class='btn btn-danger' onclick="destroy({{ $a['review_id'] }})">{{ __('Delete') }}</button>

                                                    </td>
                                              </tr>

                                        @endforeach



                                </tbody>
                              </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
