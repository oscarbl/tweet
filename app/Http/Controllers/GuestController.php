<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        //dd('GuestController');
        //Ingreso todas las entradas a la variable entries
        $entries = Entry::All();
         return view('welcome');
    }
}
