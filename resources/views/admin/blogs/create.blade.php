@extends('admin.index')
@section('content')
<div class="content-wrapper">
            <!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span> Create A new Blog</h4>

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
                    <form id="validate-form" method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data">
                    	@csrf
                      <div class="mb-3 row">
                        <label for="blog_name" class="col-md-2 col-form-label">Choose Category</label>
                        <div class="col-md-10">
                          <select class="form-control" name="category_id" required>
                            @foreach($categorys as $val)
                              <option value="{{$val->id}}">{{$val->category_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="blog_name" class="col-md-2 col-form-label">Blog title</label>
                        <div class="col-md-10">
                          <input required class="form-control" type="text" name="blog title" value="{{old('blog_name')}}" id="blog_name" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="tags" class="col-md-2 col-form-label">Blog Tags</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="tags" value="{{old('tags')}}" id="tags" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="blog_description" class="col-md-2 col-form-label">Blog Description</label>
                        <div class="col-md-10">
                          <textarea required class="form-control" id="blog description" name="blog_description"> {{old('blog_description')}}</textarea>
                        </div>
                      </div>
<div class="mb-3 row">
                        <label for="top_trending" class="col-md-2 col-form-label">top_trending</label>
                        <div class="col-md-4">
                          <select class="form-control" name="top_trending">
                              <option value="">CHOOSE OPTION</option>
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                          </select>
                        </div>
                        <label for="bottom_trending" class="col-md-2 col-form-label">bottom_trending</label>
                        <div class="col-md-4">
                          <select class="form-control" name="bottom_trending">
                              <option value="">CHOOSE OPTION</option>
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="row">
                        <label for="html5-range" class="col-md-2 col-form-label">Blog Image</label>
                        <div class="col-md-10">
                        <input class="form-control" name="blog_image" type="file" id="formFile" />
                        </div>
                      </div>
<br>
                      <div class="row">
                        <label for="html5-range" class="col-md-2 col-form-label">Cover Image</label>
                        <div class="col-md-10">
                        <input class="form-control" name="cover_image" type="file" id="formFile" />
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