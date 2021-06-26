<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Commerce;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $ratingVote = Commerce::orderBy('votes_positive', 'desc')
            ->first();

        $ratingVisit = Commerce::orderBy('visit', 'DESC')
            ->first();

        $lastNews = Blog::orderBy('created_at', 'DESC')
            ->where('status', 'ACTIVE')
            ->take(5)
            ->get();

        $products = Product::with(['commerce', 'commerce.user'])
            ->where('photo', '!=', 'NULL')
            ->inRandomOrder()
            ->get();

        $commercesLastRegister = Commerce::with(['user', 'province'])
            ->orderBy('created_at', 'DESC')
            ->take(6)
            ->get();

        return view('web.index', compact('ratingVisit', 'ratingVote', 'lastNews', 'products', 'commercesLastRegister'));
    }
}
