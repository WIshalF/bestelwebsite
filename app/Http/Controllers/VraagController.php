<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vraag;

class VraagController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
            'naam' => 'required' ,
            'achternaam' => 'required',
           'vraag' => 'required'
    ]);
        // create vraag
         $vraag = new Vraag;
         $vraag->naam = $request ->input('naam');
         $vraag->achternaam = $request ->input('achternaam');
         $vraag->vraag = $request ->input('vraag');

         $vraag->save();

         return redirect ('/');

    }
}
