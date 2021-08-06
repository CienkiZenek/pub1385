<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasla;
use App\Dzialy;
use App\Kategorie;
use App\Zagadnienia;
use App\Zagadnienia_uwagi;
class ZagadnieniaController extends Controller
{

    public function index(){
        $zagadnienia=Zagadnienia::orderBy('zagadnienie', 'asc')->paginate(12);
        return view('tresc.podstrony.zagadnienia', ['Wyniki'=>$zagadnienia]);
    }

    public function zagadnienieCale($slug){

        $zagadnienie=Zagadnienia::whereSlug($slug)->firstOrFail();
            $haslo = Hasla::findOrFail($zagadnienie->haslo_id);
            $dzial = Dzialy::findOrFail($haslo->dzial_id);
            $kategoria = Kategorie::findOrFail($haslo->kategoria_id);
            return view('tresc.cale.zagadnienie-cale', ['zagadnienie'=>$zagadnienie, 'haslo'=>$haslo, 'dzial'=>$dzial, 'kategoria'=>$kategoria]);

        }


    public function zagadnienieRozszerzenie($slug){

        $zagadnienie=Zagadnienia::whereSlug($slug)->firstOrFail();
        $haslo = Hasla::findOrFail($zagadnienie->haslo_id);
        $dzial = Dzialy::findOrFail($haslo->dzial_id);
        $kategoria = Kategorie::findOrFail($haslo->kategoria_id);
        return view('tresc.cale.zagadnienie-caleRozszerzenie', ['zagadnienie'=>$zagadnienie, 'haslo'=>$haslo, 'dzial'=>$dzial, 'kategoria'=>$kategoria]);

    }


}
