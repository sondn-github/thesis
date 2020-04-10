<?php


namespace App\Services;


use App\Category;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryService extends Service implements CategoryServiceInterface
{
    public function getCategories() {
        return Category::all();
    }
}
