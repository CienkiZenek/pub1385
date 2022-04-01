<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Znalezione;
class ZnalezioneController extends Controller
{
    public function index(){

        $znalezione=Znalezione::orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.podstrony.znalezione', ['Wyniki'=>$znalezione]);
    }




}
