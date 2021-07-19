<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasla;
use App\Dzialy;
use App\Kategorie;
class HaslaController extends Controller
{
    public function index(){

        $hasla=Hasla::orderBy('haslo', 'asc')->paginate(10);
       return view('tresc.podstrony.hasla', ['Wyniki'=>$hasla]);
    }

    public function hasloCale($slug){
        $haslo=Hasla::whereSlug($slug)->firstOrFail();
        //$haslo = Hasla::findOrFail($id);
        $dzial = Dzialy::findOrFail($haslo->dzial_id);
        $kategoria = Kategorie::findOrFail($haslo->kategoria_id);
        return view('tresc.cale.haslo-cale', ['haslo'=>$haslo, 'dzial'=>$dzial, 'kategoria'=>$kategoria]);

    }

}
