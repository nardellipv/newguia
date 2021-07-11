<?php

use Illuminate\Support\Facades\Auth;

function userConnect()
{
    return Auth::user();
}

function userCommerceActive()
{
    return userConnect()->type == 'OWNER' AND userConnect()->commerce->status == 'ACTIVE';
}
