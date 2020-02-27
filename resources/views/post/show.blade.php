@extends('layouts')

@section('contents')

    <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                @if($posts->count() !== 0)

                        <div class="col-lg-6">

                            <div class="card">
                                <div class="card-body">


                                    <h5 class="card-title">{{ $posts->title }}</h5>

                                    <p class="card-text">
                                        <!-- Content -->
                                        {{ $posts->content }}
                                    </p>
                                    <h5 class="card-title">Nguồn: {{ $posts->user->name }}</h5>
                                </div>
                            </div>

                        </div>
                @else
                    <p>No Data</p>
                @endif
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
