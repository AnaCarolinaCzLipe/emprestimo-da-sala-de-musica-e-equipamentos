<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        
        return view('admin.inicio');

    }
    
    public function indexAjuda()
    {
        
        return view('ajuda.ajuda');
        
    }
    
}
