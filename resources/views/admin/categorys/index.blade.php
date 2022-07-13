@extends('admin.index')
@section('content')
<div class="content-wrapper">
            <!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categorys /</span> Show All Categorys</h4>

        <div class="row">
            <div class="card mb-4 p-3">
                <table class="table table-bordered data-table ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorys as $key => $value)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$value->category_name}}</td>
                            <td>
                                <a href="{{route('categorys.edit',$value->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('categorys.destroy',$value->id)}}" method="post">
                                    @method('DELETE') @csrf
                                    <button type="submit" class="btn btn-danger">Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categorys->render()}}
            </div>
        </div>
    </div>
</div>
@endsection