<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function listRecipes()
    {
        $recipes = Recipe::with(['category'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('web.recipe.index', compact('recipes'));
    }

    public function recipes($slug)
    {
        $recipe = Recipe::where('slug', $slug)
            ->first();

        return view('web.recipe.recipe', compact('recipe'));
    }

    public function recipeLike($id)
    {
        Recipe::where('id', $id)
            ->increment('likes',1);

        toastr()->info('Muchas gracias por tu voto', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
