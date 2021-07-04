<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Http\Requests\EmailContactSiteRequest;
use App\Http\Requests\MessageClienteToCommerceRequest;
use App\Mail\MailContactToSite;
use Illuminate\Http\Request;
use App\Mail\MessageClientToCommerce;
use App\Message;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function MessageClientToCommerce(MessageClienteToCommerceRequest $request, $id)
    {
        Message::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'messageText' => $request['messageText'],
            'read' => 'NO',
            'commerce_id' => $id
        ]);

        $commerce = Commerce::find($id);

        Mail::to($commerce->user->email)->send(new MessageClientToCommerce($commerce));

        toast('Se envio correctamente tu mensaje, muchas gracias!','success');
        return back();
    }

    public function MailContactToSite(EmailContactSiteRequest $request)
    {
        Mail::to('info@guiaceliaca.com.ar')->send(new MailContactToSite($request));

        toast('Se envio correctamente tu mensaje, muchas gracias, en breve te contestaremos!','success');
        return back();
    }
}
