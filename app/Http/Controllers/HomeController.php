<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Commerce;
use App\Product;
use App\Province;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Comercios celíacos Argentinos ' . date('Y'));
        SEOMeta::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
        Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        SEOMeta::addKeyword([
            'celíacos', 'locales', 'celíacos argentinos', 'TACC', 'celiaco sintomas', 'celiaco que no puede comer',
            'celiaco sintomas', 'celiaco dieta', 'celiaco tratamiento', 'celíaco definición', 'celiacos lugares para comer',
            'lugares para celiacos palermo', 'lugares para merendar celiacos', 'lugares para merendar apto celiacos', 'celiacos mar del plata',
            'restaurant para celiacos', 'restaurantes para celiacos en caba', 'restaurantes para celiacos buenos aires',
            'restaurantes para celiacos cerca de mi'
        ]);

        OpenGraph::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
        Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/logo.png', 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');


        if (Cache::has('ratingPositiveCache')) {

            $ratingVote = Cache::get('ratingPositiveCache');
        } else {

            $ratingVote = Commerce::orderBy('votes_positive', 'desc')
                ->where('status', 'ACTIVE')
                ->first();
            Cache::put('ratingPositiveCache', $ratingVote, 600);
        }

        if (Cache::has('ratingVisitCache')) {

            $ratingVisit = Cache::get('ratingVisitCache');
        } else {

            $ratingVisit = Commerce::orderBy('visit', 'DESC')
                ->where('status', 'ACTIVE')
                ->first();
            Cache::put('ratingVisitCache', $ratingVisit, 600);
        }

        $lastNews = Blog::orderBy('created_at', 'DESC')
            ->where('status', 'ACTIVE')
            ->take(5)
            ->get();

        if (Cache::has('productCache')) {

            $products = Cache::get('productCache');
        } else {

            $products = Product::with(['commerce', 'commerce.user'])
                ->where('photo', '!=', 'NULL')
                ->inRandomOrder()
                ->get();
            Cache::put('productCache', $products, 600);
        }

        $commercesLastRegister = Commerce::with(['user', 'province', 'region'])
            ->where('status', 'ACTIVE')
            ->orderBy('created_at', 'DESC')
            ->take(6)
            ->get();

        $ip = request()->ip();

        $region = Location::get('168.227.145.35');
        // $region = Location::get($ip);

        $regionIp = Province::where('name', $region->regionName)
            ->first();

        if (Cache::has('regionIpCache')) {

            $regionCommerces = Cache::get('regionIpCache');
        } else {

            if ($regionIp) {
                $regionCommerces = Commerce::with(['province', 'user'])
                    ->where('province_id', $regionIp->id)
                    ->get();
            }
            Cache::put('regionIpCache', $regionCommerces, 600);
        }


        return view('web.index', compact(
            'ratingVisit',
            'ratingVote',
            'lastNews',
            'products',
            'commercesLastRegister',
            'regionCommerces'
        ));
    }
}
