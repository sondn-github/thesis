<?php


namespace App\Services;


use App\Category;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryService extends Service implements CategoryServiceInterface
{
    public function getCategories() {
        return Category::all();
    }

    public function getCategoryById($id) {
        return Category::findOrFail($id);
    }

    public function store($request) {
        $data = $request->only([Category::COL_NAME]);

        return Category::create($data);
    }

    public function update($request, $id) {
        $data = $request->only([Category::COL_NAME]);

        return Category::findOrFail($id)
            ->update($data);
    }

    public function destroy($id) {
        return Category::findOrFail($id)
            ->delete();
    }

    public function getCategoryByName($name)
    {
        return Category::where(Category::COL_NAME, $name)
            ->first();
    }

    public function createCategoryByName($name)
    {
        return Category::create([
            'name' => $name,
        ]);
    }
}
