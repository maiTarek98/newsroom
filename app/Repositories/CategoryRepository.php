<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface 
{
    public function getAllCategorys() 
    {
        return Category::with('blogs')->paginate(10);
    }

    public function getCategoryById($categoryId) 
    {
        return Category::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId) 
    {
        Category::destroy($categoryId);
    }

    public function createCategory(array $categoryDetails) 
    {
        return Category::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails) 
    {
        return Category::whereId($categoryId)->update($newDetails);
    }
    public function getLastFourCategorys(){
        return Category::orderBy('id','DESC')->take(4)->get();
    }

}
