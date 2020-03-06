@extends('layouts')

@section('contents')

    <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                        <div class="col-lg-12">

                            <div class="card">

                                <section class="content">

                                    <!-- Default box -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Tiêu Đề: {{ $posts->title }}</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
{{--                                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">--}}
{{--                                                    <i class="fas fa-times"></i></button>--}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{ $posts->content }}
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
{{--                                            Nguồn: {{ $posts->user->name }}--}}
                                        </div>
                                        <!-- /.card-footer-->
                                    </div>
                                    <!-- /.card -->

                                </section>
                                <div>
                                    <form action="{{ route('posts.comment', $posts->id) }}" method="post">
                                        @csrf
                                    <div class="form-group">

                                        <label for="exampleFormControlTextarea1">Bình Luận</label>
                                        @error('content')
                                        <p style="color: red">{{$message}}</p>
                                        @enderror
                                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Nội dung comment"></textarea>
                                        <button type="submit" class="btn btn-primary">Gửi Bình Luận</button>

                                    </div>
                                    </form>
                                    <ul class="list-group">
                                        @foreach($posts->comment as $comment)
                                            <li class="list-group-item">
                                                <p>
                                                    <strong>{{$comment->users->name}}</strong>
                                                    Said:
                                                </p>
                                                <p>
                                                    {{ $comment->content }}
                                                </p>
                                            </li>

                                        @endforeach
                                    </ul>


                                </div>
                            </div>

                        </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
