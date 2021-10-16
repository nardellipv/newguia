<?php

namespace App\Http\Controllers\Admin;

use App\Commerce;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    public function userCreate()
    {
        $users = User::all();

        $provinces = Province::all();

        return view('admin.parts.user._createUser', compact('users', 'provinces'));
    }


    public function userStore(Request $request)
    {
        //        dd($request->all());
        /*$user = User::create([
             'name' => $request['name'],
             'lastname' => $request['lastname'],
             'email' => $request['email'],
             'type' => $request['type'],
             'status' => 'ACTIVE',
             'password' => bcrypt('123'),
         ]);*/

        Commerce::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'about' => $request['about'],
            'votes_positive' => $request['votes_positive'],
            'votes_negative' => $request['votes_negative'],
            'web' => $request['web'],
            'facebook' => $request['facebook'],
            'type' => 'FREE',
            'slug' => Str::slug($request['name']),
            'user_id' => $request['user_id'],
            'province_id' => $request['province_id'],
        ]);

        return back();
    }

    public function userEdit($id)
    {
        $user = User::where('id', $id)
            ->first();

        return view('admin.parts.user._editUser', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->type = $request['type'];
        if ($request['password']) {
            $user->password = bcrypt($request['password']);
        }
        $user->save();

        return back();
    }
}
