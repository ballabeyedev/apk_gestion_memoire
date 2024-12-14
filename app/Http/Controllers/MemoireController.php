<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoireController extends Controller
{
    //consultation des memoire disponible
    public function index(){
        $memoires = Memoire::all();
        return view('memoire.listememoire');
    }

}
