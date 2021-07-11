<?php

namespace App\Http\Controllers\AdminClient;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipesClientCreateRequest;
use App\Recipe;
use App\User;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('adminSite.recipe.createRecipe', compact('categories'));
    }

    public function addCreate(RecipesClientCreateRequest $request)
    {
        $slug = Recipe::where('slug', Str::slug($request['name']))
            ->first();

        if ($slug) {
            $slug = $request['name'] . RAND('1', '1000');
        } else {
            $slug = Str::slug($request['name']);
        }

        $user = User::where('id', userConnect()->id)
            ->first();

        $recipe = Recipe::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'ingredients' => $request['ingredients'],
            'steps' => $request['steps'],
            'slug' => $slug,
            'user_id' => $user->id,
            'category_id' => $request['category_id']
        ]);

        $path = 'users/images/' . $user->id;
        $pathSub = 'users/images/' . $user->id . '/receta';

        if (!is_dir($path)) {
            mkdir('users/images/' . $user->id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $user->id . '/receta');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo718'] = '718x415-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo260'] = '260x180-' . $user->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(718, 415)->save($path . '/receta/' . $input['photo718']);
            $img->fit(260, 180)->save($path . '/receta/' . $input['photo260']);

            $recipe->photos = Str::after($input['photo718'], '-');
        }
        $recipe->save();

        toast('Se creó correctamente tu receta, muchas gracias por aportar!','success');
        return back();
    }
}
