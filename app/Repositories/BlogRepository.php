<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;
use App\Models\Category;

class BlogRepository implements BlogRepositoryInterface 
{
    public function getAllCategorys() 
    {
        return Category::paginate(10);
    }

    public function getAllBlogs() 
    {
        return Blog::paginate(10);
    }

    public function getAllTopTrends() 
    {
        return Blog::where('top_trending','yes')->orderBy('id','DESC')->take(10)->get();
    }
    public function getAllBottomTrends() 
    {
        return Blog::where('bottom_trending','yes')->orderBy('id','DESC')->take(10)->get();
    }


    public function getBlogById($blogId) 
    {
        return Blog::findOrFail($blogId);
    }

    public function deleteBlog($blogId) 
    {
        Blog::destroy($blogId);
    }

    public function createBlog(array $BlogDetails) 
    {
        return Blog::create($BlogDetails);
    }

    public function updateBlog($blogId, array $newDetails) 
    {
        return Blog::whereId($blogId)->update($newDetails);
    }

    public function getBlogByCatId($catId) 
    {
        return Blog::where('category_id',$catId)->paginate(6);
    }

    public function getLastFourBlogs(){
        return Blog::orderBy('id','DESC')->take(4)->get();
    }

    public function getBlogBySlug($slug){
        return Blog::where('slug',$slug)->first();
    }
}
