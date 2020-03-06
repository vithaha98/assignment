@extends('layouts')

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
                                    <th>Số Bài Đăng</th>
                                    <th>Cập nhật thông tin</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{{$users->id}}</td>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->dob}}</td>
                                    <td><a href="{{route('users.show')}}">{{$users->posts()->count()}}</a></td>
                                    <td><a href="{{route('users.edit',$users->id)}}">Update</a></td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
    </div>
@stop


