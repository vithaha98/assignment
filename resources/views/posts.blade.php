@extends('layouts')

@section('contents')
<div class="row">
    @if($posts->count() !== 0)
        @foreach($posts as $post)
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>

                        <p class="card-text">
                            <!-- Content -->
                            {{ $post->content }}
                        </p>

                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div>
        @endforeach
    @else
        <p>No Data</p>
    @endif
</div>
@stop
