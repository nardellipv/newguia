<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\NewsLetter;
use App\User;
use Rap2hpoutre\FastExcel\FastExcel;

class ExportController extends Controller
{
    public function exportUserComplete()
    {
        return (new FastExcel(User::all()))->download('users.xlsx', function ($user) {
            return [
                'Name' => $user->name,
                'LastName' => $user->lastname,
                'Email' => $user->email,
            ];
        });
    }

    public function exportUserOwners()
    {
        return (new FastExcel(User::where('type', 'OWNER')->get()))->download('owners.xlsx', function ($user) {
            return [
                'Name' => $user->name,
                'LastName' => $user->lastname,
                'Email' => $user->email,
            ];
        });
    }
    
    public function exportNewsLetters()
    {
        return (new FastExcel(NewsLetter::all()))->download('newsletter.xlsx', function ($user) {
            return [              
                'Email' => $user->email,
            ];
        });
    }
}
