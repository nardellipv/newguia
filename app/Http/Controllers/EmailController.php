<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Http\Requests\EmailContactSiteRequest;
use App\Http\Requests\MessageClienteToCommerceRequest;
use App\Http\Requests\RespondCommerceToClientMessage;
use App\Mail\MailContactToSite;
use Illuminate\Http\Request;
use App\Mail\MessageClientToCommerce;
use App\Mail\RespondCommerceToClient;
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

    public function respondToClient(RespondCommerceToClientMessage $messageCommerce)
    {
        $message = Message::where('id', $messageCommerce->id)
            ->first();

        $message->read = 'YES';
        $message->save();


        Mail::to($messageCommerce->clientMail)->send(new RespondCommerceToClient($messageCommerce));

        toast('Se envio correctamente tu mensaje, muchas gracias!','success');
        return back();
    }
}
