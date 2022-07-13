<?php

namespace App\Interfaces;

interface BlogRepositoryInterface 
{
    public function getAllBlogs();
    public function getBlogById($blogId);
    public function deleteBlog($blogId);
    public function createBlog(array $blogDetails);
    public function updateBlog($blogId, array $newDetails);

    public function getAllCategorys();

    public function getBlogByCatId($catId);
    public function getLastFourBlogs();
    public function getBlogBySlug($slug);
    public function getAllTopTrends();
    public function getAllBottomTrends();
}
