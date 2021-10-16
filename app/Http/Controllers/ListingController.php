<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Province;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class ListingController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Comercios celíacos Argentinos ' . date('Y'));
        SEOMeta::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
        Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');

        OpenGraph::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
        Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/logo.png', 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');

        $commercesListed = Commerce::with(['user', 'province', 'region'])
            ->where('status', 'ACTIVE')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        $commercesListedSeo = Commerce::all();

        foreach ($commercesListedSeo as $commerce) {
            SEOMeta::addKeyword([
                $commerce->name
            ]);
        }

        $listingProvince = Commerce::with(['province'])
            ->where('status', 'ACTIVE')
            ->groupBy('province_id')
            ->get();

        $countCommerce = Commerce::count();

        return view('web.listingCommerce.index', compact('commercesListed', 'listingProvince', 'countCommerce'));
    }

    public function searchProvince($slug)
    {

        $filterProvince = Province::where('slug', $slug)
            ->first();

        SEOMeta::setTitle('Comercios celíacos en ' . $filterProvince->name . ' ' . date('Y'));
        SEOMeta::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
            Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');

        OpenGraph::setDescription('Locales y vendedores de comida y productos para celíacos en toda Argentina.
            Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios');
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/logo.png', 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');

        $commercesListed = Commerce::with(['user', 'province'])
            ->where('province_id', $filterProvince->id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        $listingProvince = Commerce::with(['province'])
            ->groupBy('province_id')
            ->get();

        $countCommerce = Commerce::where('province_id', $filterProvince->id)
            ->count();

        return view('web.listingCommerce._filterProvince', compact(
            'commercesListed',
            'filterProvince',
            'listingProvince',
            'countCommerce'
        ));
    }
}
