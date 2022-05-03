<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function email()
    {
        return view('email.test');
    }

    public function sendNoty()
    {
        return view('notify.token');
    }

    public function sms()
    {
        return view('sms.index');
    }

    public function saveToken(Request $request)
    {

    }
}
