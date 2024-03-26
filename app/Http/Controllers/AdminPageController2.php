<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController2 extends Controller
{
    public function dashboard ()
    {
        return view('admin2.pages.dashboard');
    }
    public function chart ()
    {

        return view('admin2.pages.chart');
    }
    public function table ()
    {
        return view('admin2.pages.table');
    }
}
