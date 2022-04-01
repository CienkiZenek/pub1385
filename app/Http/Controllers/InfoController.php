<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;
use App\Inf;
class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('UserAktywny');
    }

    public function index(){

        $info=Info::orderBy('created_at', 'asc')->paginate(10);
        return view('tresc.podstrony.info', ['Wyniki'=>$info]);
    }
    public function infoCale($id){

       $info = Info::findOrFail($id);

        return view('tresc.cale.info-cale', ['info'=>$info]);

    }

}

