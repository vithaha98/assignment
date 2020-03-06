@extends('admin.layouts.layouts')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Thông tin
                    </h3>
                </div>
                <div class="card-body ">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Comment</th>
                            <th>Tên người comment</th>
                            <th>Bài Đăng</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>

                                <td>{{$comment->id}}</td>
                                <td>{{$comment->content}}</td>
                                <td>{{$comment->users ? $comment->users->name:'non name'}}

                                </td>
                                <td><a href="{{route('posts.show',$comment->post_id)}}">Xem</a></td>
                                <td>
                                    <button data-delete="{{route('admin.comments_destroy',$comment->id)}}" class="card-link delete_post">Delete</button>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{$comments->links()}}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop
@push('script')
    <script !src="">
        $(document).ready(function () {
            $('.delete_post').on('click', function () {
                let url = $(this).data('delete');

                $.ajax({
                    url: url,
                    method: 'delete',
                    data:{
                        _token: '{{csrf_token()}}'
                    }
                }).done(function (result) {
                    window.location.reload()
                }).fail(error =>{
                    if(error.status == 403){
                        confirm('Bạn không có quyền xóa ');
                    }
                });
            })
        })
    </script>
@endpush

