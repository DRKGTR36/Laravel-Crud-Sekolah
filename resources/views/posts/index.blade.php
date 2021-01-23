@extends('layouts.master')

@section('content')
<title>CRUD | Posts - Index</title>
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Posts</b></h3>
                                <div class="right">
                                    <a href="{{route('posts.add')}}" class="btn btn-sm btn-primary">Add new post</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">TITLE</th>
                                            <th class="text-center">USER</th>
                                            <th class="text-center">DATE</th>
                                            <th class="text-center">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td class="text-center">{{$post->id}}</td>
                                                <td class="text-center">{{$post->title}}</td>
                                                <td class="text-center">{{$post->user->nama}}</td>
                                                <td class="text-center">{{$post->created_at->format('d M Y')}}</td>
                                                <td class="text-center">
                                                    <a target="_blank" href="{{route('site.single.post',$post->slug)}}" class="btn btn-sm btn-info fa fa-eye"></a>
                                                    {{-- <a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-warning fa fa-sliders"></a> --}}
                                                    <a href="#" class="btn btn-sm btn-danger btn delete fa fa-trash" post-id="{{$post->id}}"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script>
        $('.delete').click(function(){
            var post_id = $(this).attr('post-id');
                swal({
                    title: "Yakin ?",
                    text: "mau hapus data post dengan id "+post_id + " ??",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/posts/"+post_id+"/delete";
                }
            });
        });
    </script>
@stop
