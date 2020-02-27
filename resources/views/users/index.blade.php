@extends('layouts')

@section('contents')
    <div class="row">
        @if($users->count() !== 0)

                <div class="col-lg-12">
                    <a href="{{route('users.create')}}">Them</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Striped Full Width Table User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th style="width: 40px">password</th>
                                    <th>Create At</th>
                                    <th>Post</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->password}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->posts()->count()}}</td>
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


