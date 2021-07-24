<?php

namespace App\Http\Controllers\Admin;

use App\Commerce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommercesController extends Controller
{
    public function listCommerces()
    {
        $commerces = Commerce::with(['user'])
            ->get();

            $visit = Commerce::orderBy('visit', 'DESC')
            ->first();

            $likes = Commerce::orderBy('votes_positive', 'DESC')
            ->first();

        return view('admin.parts.commerce._commerces', compact('commerces','visit', 'likes'));
    }

    public function EditCommerces($id)
    {
        $commerce = Commerce::find($id);

        return view('admin.parts.commerce._editCommerces', compact('commerce'));
    }

    public function UpdateCommerces(Request $request, $id)
    {
        $commerce = Commerce::find($id);
        $commerce->name = $request['name'];
        $commerce->address = $request['address'];
        $commerce->phone = $request['phone'];
        $commerce->phoneWsp = $request['phoneWsp'];
        $commerce->about = $request['about'];
        $commerce->votes_positive = $request['votes_positive'];
        $commerce->visit = $request['visit'];
        $commerce->type = $request['type'];
        $commerce->web = $request['web'];
        $commerce->facebook = $request['facebook'];
        $commerce->instagram = $request['instagram'];

        $commerce->save();

        return back();
    }
}
