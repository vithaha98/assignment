@extends('layouts')

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Bài Đăng</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('posts.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label >Full Name </label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label >Content</label>
                    <textarea  name="content" class="form-control" id="exampleInputPassword1" >{{$post->content}} </textarea>
                </div>


                <div class="form-group">
                    <label for="">Danh muc</label>
                    <select name="cate_id" id="" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" > {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
