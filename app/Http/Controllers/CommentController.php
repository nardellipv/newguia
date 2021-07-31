<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Commerce;
use App\Http\Requests\CommentToCommerceRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(CommentToCommerceRequest $request, $slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        Comment::create([
            'name' =>  userConnect()->name,
            'email' =>  userConnect()->email,
            'message' =>  $request['text-message'],
            'commerce_id' => $commerce->id
        ]);

        toast('Comentario ingresado correctamente, Muchas Gracias, ' . userConnect()->name . '!', 'success');
        return back();
    }
}
