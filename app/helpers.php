<?php

use App\Commerce;
use Illuminate\Support\Facades\Auth;

function userConnect()
{
    return Auth::user();    
}

function userCommerceActive()
{
    return userConnect()->type == 'OWNER' AND userConnect()->commerce->status == 'ACTIVE';
}

function commerceActive()
{
    return Commerce::where('user_id', userConnect()->id)->first();
}
