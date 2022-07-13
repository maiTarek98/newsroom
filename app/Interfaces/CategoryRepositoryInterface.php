<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface 
{
    public function getAllCategorys();
    public function getCategoryById($categoryId);
    public function deleteCategory($categoryId);
    public function createCategory(array $categoryDetails);
    public function updateCategory($categoryId, array $newDetails);

    public function getLastFourCategorys();
}
