<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Commerce;
use App\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Comercios celíacos Argentinos ' . date('Y'));
        SEOMeta::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
        Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        SEOMeta::addKeyword(['celíacos', 'locales', 'celíacos argentinos', 'TACC', 'celiaco sintomas', 'celiaco que no puede comer', 
        'celiaco sintomas', 'celiaco dieta', 'celiaco tratamiento']);

        OpenGraph::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
        Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/logo.png', 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');

        $ratingVote = Commerce::orderBy('votes_positive', 'desc')
            ->where('status', 'ACTIVE')
            ->first();

        $ratingVisit = Commerce::orderBy('visit', 'DESC')
            ->where('status', 'ACTIVE')
            ->first();

        $lastNews = Blog::orderBy('created_at', 'DESC')
            ->where('status', 'ACTIVE')
            ->take(5)
            ->get();

        $products = Product::with(['commerce', 'commerce.user'])
            ->where('photo', '!=', 'NULL')
            ->inRandomOrder()
            ->get();

        $commercesLastRegister = Commerce::with(['user', 'province', 'region'])
            ->where('status', 'ACTIVE')
            ->orderBy('created_at', 'DESC')
            ->take(6)
            ->get();

        return view('web.index', compact('ratingVisit', 'ratingVote', 'lastNews', 'products', 'commercesLastRegister'));
    }
}
