@extends('layouts')

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Bài Đăng</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="post" action="{{route('posts.update',$post->id)}}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label >Title </label>
                    @error('title')
                    <strong style="color: red">{{$message}}</strong>
                    @enderror
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$post->title}}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label >Content</label>
                    @error('content')
                    <strong style="color: red">{{$message}}</strong>
                    @enderror
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
