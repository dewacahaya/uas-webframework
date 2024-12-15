<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusanaController extends Controller
{
    public function index()
    {
        return view('busanas.index');
    }
}
