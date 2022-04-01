<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komunikaty;
class KomunikatyController extends Controller
{
    public function index(){

        $komunikaty=Komunikaty::orderBy('created_at', 'asc')->paginate(10);
        return view('tresc.podstrony.komunikaty', ['Wyniki'=>$komunikaty]);
    }

    public function komunikatCale($id){

        $komunikat = Komunikaty::findOrFail($id);

        return view('tresc.cale.komunikat-cale', ['komunikat'=>$komunikat]);

    }
}
