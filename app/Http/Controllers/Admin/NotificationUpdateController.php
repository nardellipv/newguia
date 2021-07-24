<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;

class NotificationUpdateController extends Controller
{
    public function notificationList()
    {
        $notifications = Notification::get();

        return view('admin.parts.notification._listNotification', compact('notifications'));
    }

    public function notificationCreate(Request $request)
    {
        Notification::create([
            'notification' => $request['notification'],
            'show' => $request['show'],
            'status' => 'ACTIVE',
        ]);

        toast('Notification Creada', 'success');
        return back();
    }

    public function notificationOn($id)
    {
        $notification = Notification::find($id);
        $notification->status = 'ACTIVE';
        $notification->save();

        toast('Notification Activa', 'success');
        return back();
    }
    
    public function notificationOff($id)
    {
        $notification = Notification::find($id);
        $notification->status = 'INACTIVE';
        $notification->save();

        toast('Notification Inactiva', 'success');
        return back();
    }
    
    public function notificationDelete($id)
    {
        $notification = Notification::find($id);
        $notification->delete();

        toast('Notification Borrada', 'success');
        return back();
    }
}
