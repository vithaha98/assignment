@extends('layouts')

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Bài Đăng</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data" ">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label >Title</label>
                    @error('title')
                    <strong style="color: red">{{$message}}</strong>
                    @enderror
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Title" autocomplete="off">
                </div>
                <div class="form-group">
                    <label >Content</label>
                    @error('content')
                    <strong style="color:red;">{{$message}}</strong>
                    @enderror
                    <textarea  name="content" class="form-control" id="exampleInputPassword1" placeholder="Content"> </textarea>
                </div>


                <div class="form-group">
                    <label for="">Danh muc</label>
                    <select name="cate_id" id="" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--                <div class="form-group">--}}
                {{--                    <label for="exampleInputFile">File input</label>--}}
                {{--                    <div class="input-group">--}}
                {{--                        <div class="custom-file">--}}
                {{--                            <input type="file" class="custom-file-input" id="exampleInputFile">--}}
                {{--                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                {{--                        </div>--}}
                {{--                        <div class="input-group-append">--}}
                {{--                            <span class="input-group-text" id="">Upload</span>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="form-check">--}}
                {{--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                {{--                    <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                {{--                </div>--}}
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
