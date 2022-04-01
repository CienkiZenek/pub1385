<?php

namespace App\Http\Controllers;

use App\Zagadnienia_uwagi;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Services\PropozycjeUwagiService;
use App\Propozycje;
use App\Propozycje_uwagi;
use App\Znalezione;
use App\Miejsca;
use App\User;
use App\Media;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserDzialaniaController extends Controller
{


    protected function validator(array $data)
    {        $walidated= Validator::make($data, [
            'tytul' => ['required', 'string', 'min:20', 'max:300'],
            'tresc' => ['required', 'string', 'min:500', 'max:4500']

        ])->validate();
        return $walidated;
    }

    protected function validatorUwagi(array $data)
    {        $walidated= Validator::make($data, [
        'naglowek' => ['required', 'string', 'min:20', 'max:300'],
        'tresc' => ['required', 'string', 'min:100', 'max:4500']

    ])->validate();
        return $walidated;
    }

    protected function validatorMedium(array $data){
        $walidated= Validator::make($data, [
            'nazwa' => ['required', 'string', 'min:3', 'max:100'],
            'link'=>'required|url'

        ])->validate();
        return $walidated;
    }

    /* miejsca do dyskusji  - lista i dodawanie*/

    protected function validatorMiejsca(array $data){
        $walidated= Validator::make($data, [
            'tytul'=>'required|max:200',
            'link'=>'required|url',
            'media_id'=>'required',
            'dodal_user'=>'nullable',
            'dodal_user_nazwa'=>'nullable',
            'status'=>'required',
            'opis'=>'nullable',
            'rodzaj'=>'required',

        ])->validate();
        return $walidated;
    }

    protected function validatorZnalezione(array $data){
        $walidated= Validator::make($data, [
            'nazwa'=>'required|min:3',
            'media_id'=>'required',
            'rodzaj'=>'required',
            'dodal_user'=>'nullable',
            'dodal_user_nazwa'=>'nullable',
            'status'=>'required',
            'link'=>'required|url',
            'komentarz'=>'required|min:10'

        ])->validate();
        return $walidated;
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('UserAktywny');
    }

    public function nowyTemat(){

        return view('tresc.userzyAktywnosc.nowyTemat');
    }

    public function create(Request $request)
    {
        //$data=$request->all();
        $data = $this->validator($request->all());
        $data = Arr::add($data, 'status', 'Nowa');
        $data = Arr::add($data, 'dodal_user', Auth::user()->id);
        $data = Arr::add($data, 'dodal_user_nazwa', \auth()->user()->name);
        Propozycje::create($data);
        session()->flash('komunikat', "Propozycja nowego tematu została dodana!");
        return redirect(route('ustawieniaDane'));
    }

    public function lista_moich_propozycji(){

        $Wyniki=Propozycje::Where('dodal_user', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(9);

        return view('tresc.userzyAktywnosc.propozycje-moje-lista', compact('Wyniki'));
    }

    public function search_lista_moich_propozycji(Request $request){

        $szukane=$request->get('szukane');
       $Wyniki=Propozycje::Where('dodal_user', Auth::user()->id)
            ->Where(function ($query)  use ($szukane) {
                $query->Where('tresc', 'like', "%$szukane%")
                    ->orWhere('tytul', 'like', "%$szukane%");
            })
            ->paginate(9);

        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.userzyAktywnosc.propozycje-moje-lista', compact('Wyniki'));
    }




    public function edycjaPropozycji($id){

        $propozycja = Propozycje::findOrFail($id);
        $uwagi_do_propozycji = Propozycje_uwagi::Where('propozycja_id', $id)->orderBy('created_at', 'desc')->get();
        //$uwagi_do_propozycji = $propozycja->uwagi();

       // dd($uwagi_do_propozycji);
        return view('tresc.userzyAktywnosc.tematEdycja', ['propozycja'=>$propozycja, 'Wyniki'=>$uwagi_do_propozycji]);

    }

    public function updatePropozycji(Request $request, $id){

        $propozycja = Propozycje::findOrFail($id);
        $data = $request->all();
        $propozycja->update($data);
        $uwagi_do_propozycji = Propozycje_uwagi::Where('propozycja_id', $id)->orderBy('created_at', 'desc')->get();
        return view('tresc.userzyAktywnosc.tematEdycja', ['propozycja'=>$propozycja
            , 'Wyniki'=>$uwagi_do_propozycji,
        ]);

    }



    public function lista_moich_uwag(){

        /* Pobieranie uwag do zagadnień i do propozycji osobno*/

        $doZagadnien=Zagadnienia_uwagi::Where('dodal_user', \auth()->user()->id)->get();
        $doPropozycji=Propozycje_uwagi::Where('dodal_user', \auth()->user()->id)->get();
        /*Łączenie obu kolekcji*/
        $mojeUwagi=$doZagadnien->concat($doPropozycji);
        $mojeUwagi = $mojeUwagi->sortByDesc('created_at');



        return view('tresc.userzyAktywnosc.uwagi-moje-lista',
            ['doZagadnien'=>$doZagadnien,
                'doPropozycji'=>$doPropozycji,
                'Wyniki'=>$mojeUwagi]);

    }

    public function search_lista_moich_uwag(Request $request){


    }

    /* Formularz do dodawania dodawania uwag do propozycji tematów/*/
    public function nowaUwagaPropozycja($id){
$propozycjaTematu=Propozycje::findOrFail($id);
$tytulPropozycji=$propozycjaTematu->tytul;
        return view('tresc.userzyAktywnosc.nowaUwagaPropozycja', ['id'=>$id, 'tytulPropozycji'=>$tytulPropozycji]);
    }

    /* Zapisywanie  uwag do propozycji tematów*/
    public function nowaUwagaPropozycjaZapisz(Request $request){

        //$data=$request->all();
        $data = $this->validatorUwagi($request->all());
        $data = Arr::add($data, 'status', 'Nowa');
        $data = Arr::add($data, 'propozycja_id', $request['propozycja_id']);
        $data = Arr::add($data, 'dodal_user', Auth::user()->id);
        $data = Arr::add($data, 'dodal_user_nazwa', \auth()->user()->name);
        Propozycje_uwagi::create($data);
        session()->flash('komunikat', "Uwaga do propozycji została dodana!");
        return redirect(route('ustawieniaDane'));

    }


    public function lista_uwag_do_moich_propozycji(){

        /* 1 wyszukiwanie listy moich propzycji*/

      // $propozycjeUsera=Propozycje::Where('dodal_user', \auth()->user()->id)->get();
       /* 2 dla każdej z propozycji wyszukujemy powiązanych z nią uwag
       i łaczymy je razem
       */
        /*$Wyniki=collect();
        for($i = 0;$i<$propozycjeUsera->count();$i++)
        {
           $tmp=$propozycjeUsera->slice($i,1)->first()->uwagi;
            $Wyniki=$Wyniki->concat($tmp);
        }*/

        // <- przeniesioen do Serwisu!!!!!!!!!!
     //$Wyniki=auth()->user()->propozycjeUwagi()->paginate(9);

       // $Wyniki=$this->paginate($Wyniki);
       // $Wyniki=$Wyniki->forPage(2, 9);

        $Wyniki=PropozycjeUwagiService::propozycjeUwagi();
        return view('tresc.userzyAktywnosc.uwagi-do-moich-lista', compact('Wyniki'));

    }

    public function search_lista_uwag_do_moich_propozycji(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Propozycje_uwagi::Where('dodal_user', Auth::user()->id)
            ->Where(function ($query)  use ($szukane) {
                $query->Where('tresc', 'like', "%$szukane%")
                    ->orWhere('naglowek', 'like', "%$szukane%");
            })
            ->paginate(9);

        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.userzyAktywnosc.uwagi-do-moich-lista', compact('Wyniki'));
    }


    public function uwagaPodglad($id){

        $uwaga = Propozycje_uwagi::findOrFail($id);

        return view('tresc.userzyAktywnosc.uwagaPodglad', ['uwaga'=>$uwaga]);

    }

    public function uwagaTematPodglad($id){

        $uwaga = Zagadnienia_uwagi::findOrFail($id);

        return view('tresc.userzyAktywnosc.uwagaZagadnieniePodglad', ['uwaga'=>$uwaga]);

    }





/* znalezione w sieci - lista i dodawanie*/



    public function znalezioneLista(){
        $Wyniki=Znalezione::Where('dodal_user', \auth()->user()->id)->orderBy('created_at', 'desc')->paginate(9);
        return view('tresc.userzyAktywnosc.znalezione-moje-lista', ['Wyniki'=>$Wyniki]);
    }

    public function noweZnalezione(){

        $Media=Media::orderBy('nazwa', 'asc')->get();
        return view('tresc.userzyAktywnosc.znalezione-nowe', ['Media'=>$Media]);
    }

    public function noweZnalezioneZapis(Request $request){

       $data = $this->validatorZnalezione($request->all());
       // $data = $request->all();
        // Log::info($data);
        $data = Arr::add($data, 'dodal_user_nazwa', \auth()->user()->name);
        $data = Arr::add($data, 'dodal_user', \auth()->user()->id);

        Znalezione::create($data);
        session()->flash('komunikat', "Nowy link został dodany.");
        return redirect(route('znalezioneLista'));
    }




    public function miejscaDyskusjiLista(){
        $Wyniki=Miejsca::Where('dodal_user', \auth()->user()->id)->orderBy('created_at', 'desc')->paginate(9);
        return view('tresc.userzyAktywnosc.miejsca-moje-lista', ['Wyniki'=>$Wyniki]);

    }

    public function noweMiejscaDyskusj(){

        $Media=Media::orderBy('nazwa', 'asc')->get();
        return view('tresc.userzyAktywnosc.miejsca-nowe', ['Media'=>$Media]);
    }

    public function noweMiejscaDyskusjZapis(Request $request){
        $data = $this->validatorMiejsca($request->all());
        // $data = $request->all();
        // Log::info($data);
        $data = Arr::add($data, 'dodal_user_nazwa', \auth()->user()->name);
        $data = Arr::add($data, 'dodal_user', \auth()->user()->id);

        Miejsca::create($data);
        session()->flash('komunikat', "Nowy miejsce do dyskusji zostało dodane.");
        return redirect(route('miejscaDyskusjiLista'));

    }

    public function noweMedium (){

        return view('tresc.userzyAktywnosc.noweMedium');
    }

    public function noweMediumZapis (Request $request){

        $data = $this->validatorMedium($request->all());
        $data = $request->all();
        $data = Arr::add($data, 'dodal_user', \auth()->user()->id);
        Media::create($data);
        session()->flash('komunikat', "Nowy medium zostało dodane.");
        return redirect(route('znalezione'));
    }

    /* funkcja do ewantualnej paginacji danych w kollekcji, a nie wyszuknania elloquent*/
    public function paginate($items, $perPage = 9, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

}
