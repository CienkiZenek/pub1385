<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagi;
class TagiController extends Controller
{
    public function index(){

        $tagi=Tagi::orderBy('nazwa', 'asc')->paginate(10);
        return view('tresc.podstrony.tagi', ['Wyniki'=>$tagi]);
    }

    public function tagCale($id){

        $tag = Tagi::findOrFail($id);

        return view('tresc.cale.tag-cale', ['tag'=>$tag]);

    }
}
