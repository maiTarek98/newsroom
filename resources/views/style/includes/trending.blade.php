<!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tranding</h3>
                        </div>
                        @foreach($bottom_trends as $blog)
                        <div class="d-flex mb-3">
                            <img src="{{url('/storage/'.$blog->blog_image)}}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">{{$blog->category->category_name}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{\Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</span>
                                </div>
                                <a class="h6 m-0" href="{{url('/blog/'.$blog->slug)}}">{{$blog->blog_name}}</a>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                    <!-- Popular News End -->