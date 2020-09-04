<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function single(){
        return view('pages.notifications.single');
    }
}
