<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Commerce;
use App\Message;
use App\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        $messages = Message::with(['commerce'])
            ->orderBy('created_At', 'DESC')
            ->get();

        //cantidad
        $countUsers = User::count();
        $countCommerces = Commerce::count();
        $countMessage = Message::count();
        $countPost = Blog::count();

        return view('admin.dashboard', compact(
            'users',
            'countCommerces',
            'countMessage',
            'countPost',
            'countUsers',
            'messages'
        ));
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $message->delete();

        return back();
    }
}
