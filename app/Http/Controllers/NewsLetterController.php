<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsLetter;

class NewsLetterController extends Controller
{
    public function add(Request $request)
    {
        NewsLetter::create([
            'email' => $request['email'],
        ]);

        toast('Muchas gracias por darte de alta!','success');
        return back();
    }
}
