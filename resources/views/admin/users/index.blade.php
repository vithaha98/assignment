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
                            <th>Tên</th>
                            <th>email</th>
                            <th>Sinh Nhật</th>
                            <th>Cập nhật thông tin</th>
                            <th><a href="{{route('admin.create_user')}}">Tạo Người dùng</a></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>

                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->dob}}</td>
                            <td><a href="{{route('admin.edit_user',$user->id)}}">Edit</a></td>
                            <td>
                                <button data-delete="{{route('admin.users_destroy',$user->id)}}" class="card-link delete_post">Delete</button>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{$users->links()}}
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
