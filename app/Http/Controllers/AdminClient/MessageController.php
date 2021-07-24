<?php

namespace App\Http\Controllers\AdminClient;

use App\Commerce;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function list()
    {
        $commerce = commerceActive();

        $messages = Message::where('commerce_id', $commerce->id)
            ->get();

        return view('adminSite.message.index', compact('messages'));
    }
}
