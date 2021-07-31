<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Characteristic_commerce;
use App\Commerce;
use App\Payment_commerce;
use App\Product;
use Illuminate\Support\Facades\Cookie;
use App\Comment;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class CommerceController extends Controller
{
    public function index($slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->where('status', 'ACTIVE')
            ->first();


        SEOMeta::setTitle('⚠ ' . $commerce->name . ' local para celiacos');
        SEOMeta::setDescription('💪 Local de comida sin TACC ' . $commerce->name . ' ingresa y conoce más sobre este local');
        SEOMeta::addKeyword([
            $commerce->name, 'celíacos', 'locales', 'celíacos argentinos', 'TACC', 'celiaco sintomas', 'celiaco que no puede comer',
            'celiaco sintomas', 'celiaco dieta', 'celiaco tratamiento'
        ]);

        OpenGraph::setDescription($commerce->about);
        OpenGraph::setTitle('Comercios celíacos Argentinos');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        if ($commerce->logo) {
            OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/users/images/' . $commerce->user->id . '/comercio/358x250-' . $commerce->logo, 'size' => 300]);
            OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/logo.png', 'size' => 300]);
        }else{
            OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/logo.png', 'size' => 300]);
        }
        OpenGraph::addProperty('type', 'articles');


        Commerce::where('id', $commerce->id)
            ->increment('visit', 1);

        $visit = Commerce::sum('visit');

        $totalVisit = ($commerce->visit + $visit) / 100;

        $characteristics = Characteristic_commerce::with(['characteristic'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $payments = Payment_commerce::with(['payment'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $products = Product::with(['commerce', 'category'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $comments = Comment::where('commerce_id', $commerce->id)
            ->where('status', 'ACTIVE')
            ->orderBy('created_at', 'DESC')
            ->get();

        $lastNews = Blog::orderBy('created_at', 'DESC')
            ->where('status', 'ACTIVE')
            ->take(3)
            ->get();

        /* $promotions = Promotion::where('commerce_id', $commerce->id)
            ->where('end_date', '>=', today())
            ->get(); */

        return view('web.commerce.index', compact(
            'commerce',
            'totalVisit',
            'characteristics',
            'payments',
            'products',
            'comments',
            'promotions',
            'lastNews'
        ));
    }

    public function positive($slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        if (Cookie::get('voto' . $commerce->slug) == $slug) {
            toast('Ya votaste anteriormente a este comercio!', 'error');
            return back();
        }

        $commerce->increment('votes_positive');
        $commerce->save();

        Cookie::queue('voto' . $commerce->slug, $commerce->slug, '2628000');

        toast('Muchas gracias por tu voto!', 'success');
        return back();
    }
}
