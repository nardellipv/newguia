<?php

namespace App\Http\Controllers\AdminClient;

use App\Characteristic;
use App\Characteristic_commerce;
use App\Commerce;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProfileCommerceStep1Request;
use App\Http\Requests\CreateProfileCommerceStep2Request;
use App\Payment;
use App\Payment_commerce;
use App\Picture;
use App\Province;
use App\Region;
use App\User;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Auth;

class CommerceController extends Controller
{
    public function create()
    {
        $provinces = Province::all();
        $characteristics = Characteristic::all();
        $payments = Payment::all();

        return view('adminSite.commerce.createCommerce', compact('provinces', 'characteristics', 'payments'));
    }

    public function addCommerceStep1(CreateProfileCommerceStep1Request $request)
    {
        $user = User::where('id', userConnect()->id)
            ->first();

        $commerce = Commerce::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'phoneWsp' => $request['phoneWsp'],
            'about' => $request['about'],
            'web' => $request['web'],
            'facebook' => $request['facebook'],
            'instagram' => $request['instagram'],
            'slug' => Str::slug($request['name']),
            'user_id' => $user->id,
        ]);

        $characteristicId = $request->characteristic_id;
        $paymentId = $request->payment_id;

        if ($characteristicId) {
            foreach ($characteristicId as $characteristic) {
                Characteristic_commerce::create([
                    'commerce_id' => $commerce->id,
                    'characteristic_id' => $characteristic
                ]);
            }
        }

        if ($paymentId) {
            foreach ($paymentId as $payment) {
                Payment_commerce::create([
                    'commerce_id' => $commerce->id,
                    'payment_id' => $payment
                ]);
            }
        }

        $user->type = 'OWNER';
        $user->save();

        //        creamos carpeta
        $path = 'users/images/' . $user->id;
        $pathSub = 'users/images/' . $user->id . '/comercio';

        if (!is_dir($path)) {
            mkdir('users/images/' . $user->id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $user->id . '/comercio');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo358'] = '358x250-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo260'] = '260x260-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo260_1'] = '260x160-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo284'] = '284x386-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo165'] = '165x165-' . $user->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(358, 250)->save($path . '/comercio/' . $input['photo358']);
            $img->fit(260, 260)->save($path . '/comercio/' . $input['photo260']);
            $img->fit(260, 160)->save($path . '/comercio/' . $input['photo260_1']);
            $img->fit(284, 386)->save($path . '/comercio/' . $input['photo284']);
            $img->fit(165, 165)->save($path . '/comercio/' . $input['photo165']);

            foreach ($input as $key => $value) {
                Picture::create([
                    'name' => $value,
                    'user_id' => $user->id
                ]);
            }
            $commerce->logo = Str::after($input['photo358'], '-');
        }

        $commerce->save();

        $provinces = Province::all();

        toast('Completa el último paso para que tu comercio se publique correctamente!', 'info');
        return view('adminSite.commerce.createCommerceStep2', compact('provinces'));
    }

    public function chooseProvince()
    {
        $chooseProvince = request()->input(['provincia']);

        $regions = Region::where('province_id', $chooseProvince)
            ->get();

        $provinceName = Province::where('id', $chooseProvince)
            ->first();

        $provinces = Province::all();


        return view('adminSite.commerce.createCommerceStep2', compact('provinces', 'regions', 'provinceName'));
    }

    public function addCommerceStep2(CreateProfileCommerceStep2Request $request)
    {
        $commerce = Commerce::where('user_id', userConnect()->id)
            ->first();

        $commerce->province_id = $request['province_id'];
        $commerce->region_id = $request['region_id'];
        $commerce->address = $request['address'];
        $commerce->status = 'ACTIVE';
        $commerce->save();

        return view('adminSite.commerce.createCommerceStep3');
    }

    public function updateCommerce($slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        $this->authorize('updateCommerce', $commerce);

        $provinces = Province::all();
        $characteristics = Characteristic::all();
        $payments = Payment::all();

        $characteristicsCommerce = Characteristic_commerce::with(['characteristic'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $paymentsCommerce = Payment_commerce::with(['payment'])
            ->where('commerce_id', $commerce->id)
            ->get();


        return view('adminSite.commerce.updateCommerce', compact(
            'provinces',
            'characteristics',
            'payments',
            'commerce',
            'characteristicsCommerce',
            'paymentsCommerce'
        ));
    }

    public function editCommerceStep1(CreateProfileCommerceStep1Request $request, $slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        $this->authorize('updateCommerce', $commerce);

        $commerce->phone = $request['phone'];
        $commerce->phoneWsp = $request['phoneWsp'];
        $commerce->about = $request['about'];
        $commerce->web = $request['web'];
        $commerce->facebook = $request['facebook'];
        $commerce->instagram = $request['instagram'];

        $characteristicId = $request->characteristic_id;
        $paymentId = $request->payment_id;

        if ($characteristicId) {
            foreach ($characteristicId as $characteristic) {
                Characteristic_commerce::create([
                    'commerce_id' => $commerce->id,
                    'characteristic_id' => $characteristic
                ]);
            }
        }

        if ($paymentId) {
            foreach ($paymentId as $payment) {
                Payment_commerce::create([
                    'commerce_id' => $commerce->id,
                    'payment_id' => $payment
                ]);
            }
        }

        //        creamos carpeta
        $path = 'users/images/' . $commerce->user_id;
        $pathSub = 'users/images/' . $commerce->user_id . '/comercio';

        if (!is_dir($path)) {
            mkdir('users/images/' . $commerce->user_id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $commerce->user_id . '/comercio');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo358'] = '358x250-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo260'] = '260x260-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo260_1'] = '260x160-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo284'] = '284x386-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo165'] = '165x165-' . $commerce->user_id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(358, 250)->save($path . '/comercio/' . $input['photo358']);
            $img->fit(260, 260)->save($path . '/comercio/' . $input['photo260']);
            $img->fit(260, 160)->save($path . '/comercio/' . $input['photo260_1']);
            $img->fit(284, 386)->save($path . '/comercio/' . $input['photo284']);
            $img->fit(165, 165)->save($path . '/comercio/' . $input['photo165']);

            foreach ($input as $key => $value) {
                Picture::create([
                    'name' => $value,
                    'user_id' => $commerce->user_id
                ]);
            }
            $commerce->logo = Str::after($input['photo358'], '-');
        }

        $commerce->save();

        $provinces = Province::all();
        $regions = Region::where('province_id', $commerce->province_id)
            ->get();

        toast('Completa el último paso para que tu comercio se publique correctamente!', 'info');
        return view('adminSite.commerce.updateCommerceStep2', compact('provinces', 'commerce', 'regions'));
    }

    public function updateCommerceStep2(CreateProfileCommerceStep2Request $request, $slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        $this->authorize('updateCommerce', $commerce);

        $commerce->province_id = $request['province_id'];
        $commerce->region_id = $request['region_id'];
        $commerce->address = $request['address'];
        $commerce->save();

        return view('adminSite.commerce.createCommerceStep3');
    }

    public function deleteCharacteristic($id)
    {
        $characteristic = Characteristic_commerce::find($id);

        $characteristic->delete();

        toast('Caracteristica eliminada correctamente!', 'info');
        return back();
    }

    public function deletePayment($id)
    {
        $payment = Payment_commerce::find($id);

        $payment->delete();

        toast('Método de Pago eliminado correctamente!', 'info');
        return back();
    }
}
