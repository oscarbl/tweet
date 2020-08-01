<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntryController extends Controller
{
    //
    public function create()
    {
        return view('entries.create');
    }
    //
    public function storage(Request $request)
    {
        //dd($request->all());
        //VAlidamos los datos que nos llegan del formulario
        $validateData = $request->validate([
        'title'=> 'required|min:7|max:255|unique:entries',
        'content'=> 'required|min:25|max:3000'
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
}
