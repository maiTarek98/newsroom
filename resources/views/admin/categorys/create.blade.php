@extends('admin.index')
@section('content')
<div class="content-wrapper">
            <!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categorys /</span> Create A new Category</h4>

        <div class="row">

                <div class="col-xl-12">
                  <!-- HTML5 Inputs -->
                @if(count($errors))
				<div class="alert alert-danger">
				    <ul>
				        @foreach($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif

                  <div class="card mb-4">
                    <h5 class="card-header">Fill Form</h5>
                    <div class="card-body">
                    <form id="validate-form" method="POST" action="{{route('categorys.store')}}" enctype="multipart/form-data">
                    	@csrf
                      <div class="mb-3 row">
                        <label for="category_name" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                          <input required class="form-control" type="text" name="category_name" value="{{old('category_name')}}" id="category_name" />
                        </div>
                      </div>
                      
                      <div class="row">
                        <label for="html5-range" class="col-md-2 col-form-label">Category Image</label>
                        <div class="col-md-10">
                        <input class="form-control" name="category_image" type="file" id="formFile" />
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                  </form>
                    </div>
                  </div>
                </div>
		</div>
	</div>
</div>

@endsection