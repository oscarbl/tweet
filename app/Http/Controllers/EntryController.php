<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    //Creamos un middleware para prevenir acceso no autorizado
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function create()
    {
        return view('entries.create');
    }

    //
    public function store(Request $request)
    {
        //dd($request->all());

        //Validamos los datos que nos llegan del formulario
        $validateData = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries',
            'content' => 'required|min:25|max:3000'
        ] );

        //creamos un nuevo objeto
        $entry = new Entry();
        $entry->title = $validateData['title'];
        $entry->content = $validateData['content'];
        $entry->user_id = auth()->id();
        //Metodo que produce el Insert
        $entry->save();
        
        //Devolvemos un mensaje de status para ser mostrado al usuario
        $status = 'Your entry has been published successfully';
        return back()->with(compact('status'));

    }

    public function edit(Entry $entry){
        //Devolvemos una vista de edición con los datos de la entrada que se esta editando
        return view('entries.edit',compact('entry'));
    }

       public function update(Request $request, Entry $entry)
    {
        //dd($request->all());

        //Validamos los datos que nos llegan del formulario
        $validateData = $request->validate([
            //Let update for this id even did not change anything
            'title' => 'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content' => 'required|min:25|max:3000'
        ] );

        //TODO: allow edit action only for author
        //creamos un nuevo objeto
        $entry->title = $validateData['title'];
        $entry->content = $validateData['content'];
        //Metodo que produce el Insert
        $entry->save();
        
        //Devolvemos un mensaje de status para ser mostrado al usuario
        $status = 'Your entry has been published successfully';
        return back()->with(compact('status'));

    }
}
