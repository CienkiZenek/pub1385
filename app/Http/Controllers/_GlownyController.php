<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasla;
use App\Tagi;
use App\Miejsca;
use App\Info;
use App\Komunikaty;
use App\Memy;
use App\Propozycje;
use App\Propozycje_uwagi;
use App\Zagadnienia;
use App\Zagadnienia_uwagi;
use App\Znalezione;
use App\Przekazdnia;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class _GlownyController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/



    public function  start(){

        // info, że mamy stronę główną
        $strona_glowna='Tak';
        /*pobieranie tematów na stronę główną*/
        $hasla=Hasla::all();
        $zagadnienia=Zagadnienia::where('status', 'Aktywny')->get();

        /*Łączenie obu kolekcji*/
        $tematy=$hasla->concat($zagadnienia);
        $tematy = $tematy->sortByDesc('updated_at')->take(10);;
        /* koniec pobieranie tematów na stronę główną*/

        //$zagadnienia=Zagadnienia::orderBy('zagadnienie', 'asc')->take(10)->get();
        $propozycje=Propozycje::orderBy('created_at', 'asc')->take(10)->get();
        $przekazdnia=Przekazdnia::orderBy('tytul', 'asc')->take(10)->get();
        $znalezione=Znalezione::orderBy('created_at', 'asc')->take(10)->get();
        /*$tagi=Tagi::orderBy('nazwa', 'asc')->take(30)->get();*/

        if(Tagi::all()->count()>10){
       $tagi=Arr::random(Tagi::all()->toArray(), 10); // pobiera losowo 10 tagów
        }
        else {

            $tagi=Tagi::all();
        }

        $infa=Info::orderBy('created_at', 'asc')->take(10)->get();
        $miejsca=Miejsca::orderBy('created_at', 'asc')->take(10)->get();
        $komunikaty=Komunikaty::orderBy('created_at', 'asc')->take(5)->get();
        $zagadnienia_karuzela=Zagadnienia::where('zajawka_pokaz', 'Tak')->where('status','Aktywny')->orderBy('zagadnienie', 'asc')->take(10)->get();

        return view('tresc.glowna-start', [
            'hasla'=>$hasla,
            'tematy'=>$tematy,
            'przekazdnia'=>$przekazdnia,
            'znalezione'=>$znalezione,
            'propozycje'=>$propozycje,
           'tagi'=>$tagi,
            'komunikaty'=>$komunikaty,
            'miejsca'=>$miejsca,
            'strona_glowna'=>$strona_glowna,
            'infa'=>$infa,
            'zagadnienia_karuzela'=>$zagadnienia_karuzela
        ]);
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function szukaj(Request $request){

        if(Str::length($request->szukane)>2)
        {
        $hasla = Hasla::search($request->szukane)->get();
        $tagi=Tagi::search($request->szukane)->get();
        $miejsca=Miejsca::search($request->szukane)->get();
        $info=Info::search($request->szukane)->get();
        $komunikaty=Komunikaty::search($request->szukane)->get();
        $memy=Memy::search($request->szukane)->get();
        $propozycje=Propozycje::search($request->szukane)->get();
        $propozycje_uwagi=Propozycje_uwagi::search($request->szukane)->get();
        $zagadnienia=Zagadnienia::search($request->szukane)->get();
        $zagadnienia_uwagi=Zagadnienia_uwagi::search($request->szukane)->get();
        $znalezione=Znalezione::search($request->szukane)->get();
        $przekazdnia=Przekazdnia::search($request->szukane)->get();



        return view('tresc.wyszukane', [
            'hasla'=>$hasla,
            'tagi'=>$tagi,
            'miejsca'=>$miejsca,
            'szukane'=>$request->szukane,
            'info'=>$info,
            'komunikaty'=>$komunikaty,
            'memy'=>$memy,
            'propozycje'=>$propozycje,
            'propozycje_uwagi'=>$propozycje_uwagi,
            'zagadnienia'=>$zagadnienia,
            'zagadnienia_uwagi'=>$zagadnienia_uwagi,
            'znalezione'=>$znalezione,
            'przekazdnia'=>$przekazdnia

        ]);

        }

        else {
            return redirect(route('stronaGlowne'));
        }
    }

   /* public function hasla(){

        return view('tresc.podstrony.hasla', );
    }*/

    public function tematy(){

        $hasla=Hasla::orderBy('haslo', 'asc')->paginate(10);


        return view('tresc.podstrony.tematy', ['Wyniki'=>$hasla]);
    }

    public function zagadnienia(){

        return view('tresc.podstrony.zagadnienia', );
    }

    public function miejsca(){

        return view('tresc.podstrony.miejsca', );
    }

    public function znalezione(){

        return view('tresc.podstrony.znalezione', );
    }

    public function kontakt(){

        return view('tresc.podstrony.kontakt', );
    }

    public function wsparcie(){

        return view('tresc.podstrony.wsparcie', );
    }

    public function regulamin(){

        return view('tresc.podstrony.regulamin');
    }

    public function jakDyskutowac(){

        return view('tresc.podstrony.jakDyskutowac');
    }
}
