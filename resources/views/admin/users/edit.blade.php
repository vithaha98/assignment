@extends('admin.layouts.layouts')

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Bài Đăng</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.update_user',$users->id)}}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label >Name </label>
                    @error('name')
                    <strong style="color:red;">{{$message}}</strong>
                    @enderror
                    <input type="number" name="id" class="form-control" id="exampleInputEmail1" value="{{$users->id}}" hidden="hidden" autocomplete="off">
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$users->name}}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label >Email</label>
                    @error('email')
                    <strong style="color:red;">{{$message}}</strong>
                    @enderror
                    <input  name="email" class="form-control" id="exampleInputPassword1" value="{{$users->email}}">
                </div>
                <div class="form-group">
                    <label >Birthday</label>
                    @error('dob')
                    <strong style="color:red;">{{$message}}</strong>
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
