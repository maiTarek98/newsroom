@extends('admin.index')
@section('content')
<div class="content-wrapper">
            <!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span> Show All Blogs</h4>

        <div class="row">
            <div class="card mb-4 p-3">
                <table class="table table-bordered data-table ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Blog Image</th>
                            <th>Blog Title</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $key => $value)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img src="{{url('/storage/'.$value->blog_image)}}" style="width:250px"></td>
                            <td>{{$value->blog_name}}</td>
                            <td>
                                <a href="{{route('blogs.edit',$value->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('blogs.destroy',$value->id)}}" method="post">
                                    @method('DELETE') @csrf
                                    <button type="button" class="btn btn-danger">Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$blogs->render()}}
            </div>
        </div>
    </div>
</div>
@endsection