<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GuestController extends Controller
{
    //
    public function index()
    {
        //dd('GuestController');
        //Ingreso todas las entradas a la variable entries
        //$entries = Entry::All();
        //Paginamos las entradas de 10 en 10
        $entries = Entry::with('user')
        ->orderByDesc('created_at')
        ->orderByDesc('id')
        ->paginate();

        //Retorno a la vista welcomoe y le paso la variable entries
         return view('welcome',compact('entries'));
    }
    
    public function show(Entry $entry)
    {
        //Devolvemos una vista con las entradas recibidas
        return view('entries.show', compact('entry'));
    }
}
