@extends('admin.layouts.layouts')

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Tài Khoản</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('admin.cates_store')}}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label >Tên Danh Mục </label>
                    @error('name')
                    <strong style="color: red"> {{$message}}</strong>
                    @enderror
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
