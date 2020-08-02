<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //Definimos una relacion $entry->user
    //Entry N - 1 User
    //Eager loading
    
public function user(){

    return $this->belongsTo(User::class);
}

}
