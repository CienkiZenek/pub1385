<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memy;
class MemyController extends Controller
{
    public function index(){

        $memy=Memy::orderBy('tytul', 'asc')->paginate(10);
        return view('tresc.podstrony.memy', ['Wyniki'=>$memy]);
    }

    public function memCale($id){

        $mem = Memy::findOrFail($id);

        return view('tresc.cale.mem-cale', ['mem'=>$mem]);

    }
}
