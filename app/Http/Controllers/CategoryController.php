<?php

namespace App\Http\Controllers;
use App\Interfaces\CategoryRepositoryInterface;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Image;
class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) 
    {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = $this->categoryRepository->getAllCategorys();
        return view('admin.categorys.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {


        $categoryDetails = $request->only([
            'category_name',
        ]);

        $category = $this->categoryRepository->createCategory($categoryDetails);

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = time().'.'.$image->extension();
            $img = Image::make($image->path());    
            $img->resize(Image::make($image)->width(), Image::make($image)->height(), function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            \Storage::disk('local')->put('public/categorys'.'/'.$imageName, $img, 'public');
            $category->update(['category_image'=> 'categorys/'.$imageName]);

        }
        return redirect('admin/categorys');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categorys.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $categoryDetails = $request->only([
            'category_name',
        ]);
        $this->categoryRepository->updateCategory($category->id, $categoryDetails);
        if($request->hasFile('category_image')){

            $image = $request->file('category_image');
            $imageName = time().'.'.$image->extension();
            $img = Image::make($image->path());    
            $img->resize(Image::make($image)->width(), Image::make($image)->height(), function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            \Storage::disk('local')->put('public/categorys'.'/'.$imageName, $img, 'public');

            $category->category_image= 'categorys/'.$imageName;
            $category->save();

        }

        return redirect('admin/categorys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->deleteCategory($category->id);
        return redirect('admin/categorys');

    }
}
