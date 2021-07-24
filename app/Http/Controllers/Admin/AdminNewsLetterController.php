<?php

namespace App\Http\Controllers\Admin;

use App\NewsLetter;
use App\Http\Controllers\Controller;

class AdminNewsLetterController extends Controller
{
    public function listNewsLetter()
    {
        $newsLetters = NewsLetter::all();

        return view('admin.parts.newsLetter._listNewsLetter', compact('newsLetters'));
    }

    public function deleteNewsLetter($id)
    {
        $newsLetter = NewsLetter::find($id);
        $newsLetter->delete();

        toast('NewsLetter Eliminado Correctamente', 'success');
        return back();
    }
}
