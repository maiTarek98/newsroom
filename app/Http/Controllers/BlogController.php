<?php

namespace App\Http\Controllers;
use App\Interfaces\BlogRepositoryInterface;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Image;
use Str;
class BlogController extends Controller
{
    private BlogRepositoryInterface $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository) 
    {
        $this->blogRepository = $blogRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->getAllBlogs();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = $this->blogRepository->getAllCategorys();

        return view('admin.blogs.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $blogDetails = $request->only([
            'blog_name', 'blog_description',
            'category_id','tags','bottom_trending','top_trending',
        ]);

        $blog = $this->blogRepository->createBlog($blogDetails);
        $blog->slug= Str::slug($request->blog_name);
        $blog->save();
        if($request->hasFile('blog_image')){
            $image = $request->file('blog_image');
            $imageName = time().uniqid(rand()).'.'.$image->extension();
            $img = Image::make($image->path());    
            $img->resize(Image::make($image)->width(), Image::make($image)->height(), function ($constraint) {
                $constraint->aspectRatio();
            });            $img->stream();
            \Storage::disk('local')->put('public/blogs'.'/'.$imageName, $img, 'public');
            $blog->update(['blog_image'=> 'blogs/'.$imageName]);

        }

        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');
            $imageName = time().uniqid(rand()).'.'.$image->extension();
            $img = Image::make($image->path());    
            $img->resize(Image::make($image)->width(), Image::make($image)->height(), function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            \Storage::disk('local')->put('public/blogs'.'/'.$imageName, $img, 'public');
            $blog->update(['cover_image'=> 'blogs/'.$imageName]);

        }
        return redirect('admin/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categorys = $this->blogRepository->getAllCategorys();
        return view('admin.blogs.edit', compact('blog','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blogDetails = $request->only([
            'blog_name', 'blog_description',
            'category_id','tags', 'bottom_trending','top_trending',
        ]);
        $this->blogRepository->updateBlog($blog->id, $blogDetails);
        if($request->hasFile('blog_image')){

            $image = $request->file('blog_image');
            $imageName = time().uniqid(rand()).'.'.$image->extension();
            $img = Image::make($image->path());    
            $img->resize(Image::make($image)->width(), Image::make($image)->height(), function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            \Storage::disk('local')->put('public/blogs'.'/'.$imageName, $img, 'public');

            $blog->blog_image= 'blogs/'.$imageName;
            $blog->save();

        }
        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');
            $imageName = time().uniqid(rand()).'.'.$image->extension();
            $img = Image::make($image->path());    
            $img->resize(Image::make($image)->width(), Image::make($image)->height(), function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            \Storage::disk('local')->put('public/blogs'.'/'.$imageName, $img, 'public');
            $blog->update(['cover_image'=> 'blogs/'.$imageName]);

        }

        return redirect('admin/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->blogRepository->deleteBlog($blog->id);
        return redirect('admin/blogs');

    }
}
