@include('inclue.header');
<body>
<div >
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col"><a href="admin/create">Them bai viet</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $key =>$value)

            <tr>
                <th scope="row">{{$value->id}}</th>
                <td>{{$value->title}}</td>
                <td>{{$value->content}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="row justify-content-center">
        {{$posts ->links()}}
    </div>
</div>

</body>
