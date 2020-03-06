@extends('admin.layouts.layouts')

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sửa Danh Mục</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.update_cates',$cates->id)}}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label >Tên Danh Mục </label>
                    <input type="number" name="id" class="form-control" id="exampleInputEmail1" value="{{$cates->id}}" hidden="hidden" autocomplete="off">
                    @error('name')
                    <strong style="color: red"> {{$message}}</strong>
                    @enderror
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$cates->name}}" autocomplete="off">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
