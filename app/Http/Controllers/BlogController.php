<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class BlogController extends Controller
{
    public function listBlog()
    {
        SEOMeta::setTitle('📰 Noticias de interés en temas celíacos ' . date('Y'));
        SEOMeta::setDescription('👉 Enterate de lo último en temas de celiaquia. Publicamos contenido semanalmente estes actualizados constantemente.');
        SEOMeta::addKeyword([
            'celíacos', 'locales', 'celíacos argentinos', 'TACC', 'celiaco sintomas', 'celiaco que no puede comer',
            'celiaco sintomas', 'celiaco dieta', 'celiaco tratamiento'
        ]);

        OpenGraph::setDescription('👉 Enterate de lo último en temas de celiaquia. Publicamos contenido semanalmente estes actualizados constantemente.');
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar');
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/styleWeb/assets/images/logo.png', 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');


        $posts = Blog::where('status', 'ACTIVE')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('web.blog.index', compact('posts'));
    }

    public function postBlog($slug)
    {
        $post = Blog::where('slug', $slug)
            ->first();

        SEOMeta::setTitle('Noticia sobre ' . $post->title);
        SEOMeta::setDescription('👉 Enterate de lo último en temas de celiaquia. Publicamos contenido semanalmente estes actualizados constantemente.');
        SEOMeta::addKeyword([
            'celíacos', 'locales', 'celíacos argentinos', 'TACC', 'celiaco sintomas', 'celiaco que no puede comer',
            'celiaco sintomas', 'celiaco dieta', 'celiaco tratamiento'
        ]);

        OpenGraph::setDescription($post->title);
        OpenGraph::setTitle('Comunidad de celiacos en toda la argentina');
        OpenGraph::setUrl('https://guiaceliaca.com.ar/blog/' . $post->slug);
        OpenGraph::addImage(['url' => 'https://guiaceliaca.com.ar/blog/images/301x160-' . $post->photo, 'size' => 300]);
        OpenGraph::addProperty('type', 'articles');


        if (Carbon::parse($post->created_at)->diffInDays(now()) <= '30 day') {
            if (!Auth::check()) {
                toast('Necesitas estar registrado para leer esta noticia!', 'success');
                return view('auth.register');
            }
        }

        Blog::where('id', $post->id)
            ->increment('view', 1);

        return view('web.blog.post', compact('post', 'commercesPro', 'commentsPost', 'countCommentBlog'));
    }

    public function postBlogLike($id)
    {
        Blog::where('id', $id)
            ->increment('like', 1);

        toast('Muchas gracias por tu voto!', 'success');
        return back();
    }
}
