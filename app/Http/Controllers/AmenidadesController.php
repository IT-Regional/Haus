<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmenidadesController extends Controller
{
    public function dashboard(){
        
        return view('amenidades.dashboard');
    }

    public function index(){

        return view('amenidades.index');
    }

    public function create(){

        return view('amenidades.create');
    }
}
