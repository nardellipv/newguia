<?php

namespace App\Http\Controllers\AdminClient;

use App\Blog;
use App\Commerce;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUserRequest;
use App\Picture;
use App\User;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = userConnect();

        $posts = Blog::orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        return view('adminSite.index', compact('user', 'posts'));
    }

    public function updateData()
    {
        $user = userConnect();

        return view('adminSite.personalData.updateDataPersonal', compact('user'));
    }

    public function update(ProfileUserRequest $request, $id)
    {
        $user = User::find($id);

        $this->authorize('updateClient', $user);

        $user->name = $request['name'];
        $user->lastname = $request['lastname'];


        if ($request['password']) {

            $messages = [
                'password.required' => 'La contraseña es requerida',
                'password.same' => 'Las contraseñas no son iguales',
                'repeat_password.required' => 'Repetir la nueva contraseña',
            ];

            $request->validate([
                'password' => 'required|same:repeat_password',
                'repeat_password' => 'required',
            ], $messages);


            if ($request['password'] == $request['repeat_password']) {
                $user->password = Hash::make($request['password']);
            } else {
                return back()->withErrors('message', 'no son iguales');
            }
        }

        if ($request['email'] != userConnect()->email) {
            $user->email = $request['email'];
        }

        //        creamos carpeta
        $path = 'users/images/' . $user->id;
        $pathSub = 'users/images/' . $user->id . '/perfil';

        if (!is_dir($path)) {
            mkdir('users/images/' . $user->id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $user->id . '/perfil');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo512'] = '512x512-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo100'] = '100x100-' . $user->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(512, 512)->save($path . '/perfil/' . $input['photo512']);
            $img->fit(100, 100)->save($path . '/perfil/' . $input['photo100']);

            foreach ($input as $key => $value) {
                Picture::create([
                    'name' => $value,
                    'user_id' => $user->id
                ]);
            }
            $user->picture = Str::after($input['photo512'], '-');
        }

        $user->save();

        if ($request->province_id) {
            $commerce = Commerce::where('user_id', $user->id)
                ->first();
            $commerce->province_id = $request['province_id'];
            $commerce->save();
        }

        toast('Tu perfil se modificó correctamente', 'success');
        return back();
    }
}
