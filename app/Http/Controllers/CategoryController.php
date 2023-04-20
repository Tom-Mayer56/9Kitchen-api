<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories(Request $request) {
        return parent::get($request, Category::class, true);
    }

    public function postCategories(Request $request) {
        if (Category::firstWhere('name', $request->get('name'))) return response()->json('This category already exists.');
        return parent::post($request, Category::class);
    }

    public function putCategories(Request $request) {
        return parent::put($request, Category::class);
    }

    public function deleteCategories(Request $request) {
        return parent::delete($request, Category::class);
    }
}
