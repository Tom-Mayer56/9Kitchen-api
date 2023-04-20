<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class RecipeController extends Controller
{
    public function getRecipes(Request $request) {
        return parent::get($request, Recipe::class, true);
    }

    public function postRecipes(Request $request) {
        return parent::post($request, Recipe::class);
    }

    public function putRecipes(Request $request) {
        return parent::put($request, Recipe::class);
    }

    public function deleteRecipes(Request $request) {
        return parent::delete($request, Recipe::class);
    }
}
