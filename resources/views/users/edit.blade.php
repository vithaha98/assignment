@extends('layouts')

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Bài Đăng</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('users.update',$users->id)}}">
            {{method_field('put')}}
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label >Name </label>
                    @error('name')
                    <p>{{$message}}</p>
                    @enderror
                    <input type="number" name="id" class="form-control" id="exampleInputEmail1" value="{{$users->id}}" hidden="hidden" autocomplete="off">
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$users->name}}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label >Email</label>
                    @error('email')
                    <p>{{$message}}</p>
                    @enderror
                    <input  name="email" class="form-control" id="exampleInputPassword1" value="{{$users->email}}">
                </div>
                <div class="form-group">
                    <label >Birthday</label>
                    @error('dob')
                    <p>{{$message}}</p>
                    @enderror
                    <input type="date"  name="dob" class="form-control" id="exampleInputPassword1" value="{{$users->dob}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
