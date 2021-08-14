<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DonneeController extends Controller
{
    public function getdemande(){
        $demande = Demande::findorfail(request()->demande);
        return  view('partials.demandeshow')->with(compact('demande'))->render();
        
    }
}
