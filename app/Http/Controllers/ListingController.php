<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Province;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $commercesListed = Commerce::with(['user', 'province','region'])
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        $listingProvince = Commerce::with(['province'])
            ->groupBy('province_id')
            ->get();

        $countCommerce = Commerce::count();

        return view('web.listingCommerce.index', compact('commercesListed', 'listingProvince', 'countCommerce'));
    }

    public function searchProvince($slug)
    {

        $filterProvince = Province::where('slug', $slug)
            ->first();

        $commercesListed = Commerce::with(['user', 'province'])
            ->where('province_id', $filterProvince->id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        $listingProvince = Commerce::with(['province'])
            ->groupBy('province_id')
            ->get();        

        $countCommerce = Commerce::where('province_id', $filterProvince->id)
        ->count();

        return view('web.listingCommerce._filterProvince', compact('commercesListed', 
        'filterProvince', 'listingProvince', 'countCommerce'));
    }
}
