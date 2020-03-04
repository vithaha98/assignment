@extends('layouts')

@section('contents')

    <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <div class="content">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('posts.create')}}" class="card-link">Thêm Bài</a></h3>
        </div>


        <div class="container-fluid">
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

                                    <a href="{{route('posts.show',$post->id)}}" class="card-link">Show</a>
                                    <a href="{{route('posts.edit',$post->id)}}" class="card-link">Edit</a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @else
                    <p>No Data</p>
                @endif
            </div>
            <div class="row justify-content-center">{{$posts->links()}}</div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
