<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class RecipeController extends Controller
{
    public function listRecipes()
    {
        SEOMeta::setTitle('Recetas celíacas ' . date('Y'));
        SEOMeta::setDescription('Las mejores recetas para celíacos en Argentina. Recetas faciles de hacer y muy bien explicadas');

        OpenGraph::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
        Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/img-logo-grande.png', 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');

        $recipes = Recipe::with(['category'])
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($recipes as $recipe) {
            SEOMeta::addKeyword([
                $recipe->name
            ]);
        }

        return view('web.recipe.index', compact('recipes'));
    }

    public function recipes($slug)
    {
        $recipe = Recipe::where('slug', $slug)
            ->first();

        SEOMeta::setTitle('Recetas celíacas ' . date('Y'));
        SEOMeta::setDescription('Las mejores recetas para celíacos en Argentina. Recetas faciles de hacer y muy bien explicadas');
        SEOMeta::addKeyword([
            'celíacos', 'Recetas celíacas', 'celíacos argentinos', 'TACC', 'recetas saladas', 'recetas dulces',
            'celiaco sintomas', 'celiaco dieta', 'celiaco tratamiento', 'celíacos', 'locales', 'celíacos argentinos', 'TACC', 'celiaco sintomas', 'celiaco que no puede comer',
            'celiaco sintomas', 'celiaco dieta', 'celiaco tratamiento', 'celíaco definición', 'celiacos lugares para comer',
            'lugares para celiacos palermo', 'lugares para merendar celiacos', 'lugares para merendar apto celiacos', 'celiacos mar del plata',
            'restaurant para celiacos', 'restaurantes para celiacos en caba', 'restaurantes para celiacos buenos aires',
            'restaurantes para celiacos cerca de mi'
        ]);

        OpenGraph::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
            Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/img-logo-grande.png', 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');



        return view('web.recipe.recipe', compact('recipe'));
    }

    public function recipeLike($id)
    {
        Recipe::where('id', $id)
            ->increment('likes', 1);

        toast('Muchas gracias por tu voto!', 'success');
        return back();
    }
}
