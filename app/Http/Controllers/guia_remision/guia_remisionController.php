<?php

namespace App\Http\Controllers\guia_remision;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class guia_remisionController extends Controller
{
    public function index()
    {
        return view('guia_remision.index');
    }
}
