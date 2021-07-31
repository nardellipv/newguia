<?php

namespace App\Http\Controllers\Admin;

use App\Commerce;
use App\Blog;
use App\Recipe;
use App\NewsLetter;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class JobController extends Controller
{
    public function userRegister()
    {
        $users = User::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->orderBy('created_at', 'DESC')
            ->get();

        $userCount = User::count();

        Mail::send('emails.job._registerUser', ['users' => $users, 'userCount' => $userCount], function ($msj) {

            $msj->from('no-responder@guiaceliaca.com.ar', 'GuiaCeliaca');

            $msj->subject('Usuario registrados');

            $msj->to('nardellipv@gmail.com', 'Pablo');
        });
    }

    public function userRegisterNewsLetter()
    {
        $newsLetters = NewsLetter::all();

        $newsLettersCount = NewsLetter::count();

        Mail::send('emails.job._registerNewsLetter', ['newsLetters' => $newsLetters, 'newsLettersCount' => $newsLettersCount], function ($msj) {
            $msj->from('no-responder@guiaceliaca.com.ar', 'GuiaCeliaca');
            $msj->subject('Usuario registrados');
            $msj->to('nardellipv@gmail.com', 'Pablo');
        });
    }

    public function commercesIncrement()
    {
        $commerces = Commerce::get();

        foreach ($commerces as $commerce) {
            $visitRand = $commerce->visit + rand('20', '50');
            $votePositve = $commerce->votes_positive + rand('6', '15');
            $commerce->visit = $visitRand;
            $commerce->votes_positive = $votePositve;
            $commerce->save();
        }
    }

    public function sitemap()
    {
        // eliminamos el archivo
        /* $siteMap = 'https://guiaceliaca.com.ar/sitemap.xml';
        dd($siteMap);
        unlink($siteMap); */

        $sitemap = App::make("sitemap");

        $sitemap->add(URL::to('/'), \Carbon\Carbon::now(), '1.0', 'daily');
        $sitemap->add(URL::to('https://guiaceliaca.com.ar/social'), \Carbon\Carbon::now(), '0.50', 'daily');

        $posts = Blog::orderBy('created_at', 'desc')->get();
        $commerces = Commerce::orderBy('created_at', 'desc')->get();
        $recipes = Recipe::orderBy('created_at', 'desc')->get();

        $priorityRecipe = '0.60';
        $priorityPost = '0.70';
        $priorityCommercer = '0.80';

        // listado de comercios
        foreach ($commerces as $commerce) {
            $sitemap->add("https://guiaceliaca.com.ar/" . $commerce->slug, $commerce->created_at, $priorityCommercer);
        }

        // listado de posts
        foreach ($posts as $post) {
            $sitemap->add("https://guiaceliaca.com.ar/blog/" . $post->slug, $post->created_at, $priorityPost);
        }

        // listado recetas
        foreach ($recipes as $recipe) {
            $sitemap->add("https://guiaceliaca.com.ar/recetas/" . $recipe->slug, $recipe->created_at, $priorityRecipe);
        }

        $sitemap->store('xml', 'sitemap', base_path('../public_html'));
        // $sitemap->store('xml', 'mysitemap');
        return back();
    }
}
