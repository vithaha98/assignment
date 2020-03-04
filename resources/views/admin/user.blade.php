@extends('layouts')

@section('contents')
    <div class="row">
        @if($users->count() !== 0)

            <div class="col-lg-12">
                <a href="">Them</a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bai Dang cua Toi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Số Bài Đăng</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href=""></a>{{$user->posts()->count()}}</td>
                                    <td>
                                        <a href="">Delete</a>
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

        @else
            <p>No Data</p>
        @endif
    </div>
@stop


