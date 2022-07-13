<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\BlogRepositoryInterface;
use App\Models\Category;
use App\Models\Blog;

use Auth;
use DB;
class HomeController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;
    private BlogRepositoryInterface $blogRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, BlogRepositoryInterface $blogRepository) 
    {
        $this->categoryRepository = $categoryRepository;
        $this->blogRepository = $blogRepository;
    }

public function index()
    {
        $categorys = $this->categoryRepository->getLastFourCategorys();
        $catblogs = $this->categoryRepository->getAllCategorys();

        $latest = $this->blogRepository->getLastFourBlogs();
        return view('style.home' , compact('categorys','catblogs','latest'));
    }

    public function category()
    {
        $categorys = $this->categoryRepository->getAllCategorys();
        return view('style.category' , compact('categorys'));
    }

    public function blogs(Category $category)
    {
        // dd($category);
        $blogs = $this->blogRepository->getBlogByCatId($category->id);
        return view('style.blog' , compact('blogs','category'));
    }

    public function single_blog($slug)
    {
        $blog = $this->blogRepository->getBlogBySlug($slug);
        return view('style.single_blog' , compact('blog'));
    }

}