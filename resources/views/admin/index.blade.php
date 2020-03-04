@extends('layouts')

@section('contents')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$posts->count()}}</h3>

                <p>Post</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$users->count()}}</h3>

                <p>User </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-12">

        <div class="card">

            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bài Đăng: </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Nguồn:
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->


        </div>
    </div>


    <div class="col-lg-12">

        <div class="card">

            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bài Đăng: </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="card-body">
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
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Nguồn:
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->


        </div>
    </div>


</div>

</div>
@stop
{{--        <tbody>--}}
{{--        @foreach ($posts as $key =>$value)--}}

{{--            <tr>--}}
{{--                <th scope="row">{{$value->id}}</th>--}}
{{--                <td>{{$value->title}}</td>--}}
{{--                <td>{{$value->content}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}

{{--        </tbody>--}}
