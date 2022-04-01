<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hasla;
use App\Dzialy;
use App\Kategorie;
use App\Zagadnienia;
use App\Propozycje;
use App\Propozycje_uwagi;

class Propozycje_uwagiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('UserAktywny');
    }

    public function index(){

        $propozycje_uwagi=Propozycje_uwagi::orderBy('created_at', 'asc')->paginate(10);
        return view('tresc.podstrony.propozycje_uwagi', ['Wyniki'=>$propozycje_uwagi]);
    }
}
