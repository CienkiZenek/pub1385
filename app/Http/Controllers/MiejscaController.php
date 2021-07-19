<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miejsca;
class MiejscaController extends Controller
{
    public function index(){

        $miejsca=Miejsca::orderBy('created_at', 'desc')->paginate(15);
        return view('tresc.podstrony.miejsca', ['Wyniki'=>$miejsca]);
    }
}
