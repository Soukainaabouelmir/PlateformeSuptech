<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calendarcontroller extends Controller
{
    public function index()
{
    return view('scolarite.views.calendar');
}

}
