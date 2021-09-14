<?php

namespace App\Http\Controllers;

use App\Zagadnienia_uwagi;
use App\Hasla;
use App\Zagadnienia;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class Zagadnienia_uwagiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('UserAktywny');
    }


    protected function validator($data){
        $walidated= Validator::make($data, [
            'naglowek'=>'required|min:30',
            'tresc'=>'required|min:500'

        ])->validate();
        return $walidated;
    }

    public function index(){

        $zagadnienia_uwagi=Zagadnienia_uwagi::orderBy('created_at', 'asc')->paginate(10);
        return view('tresc.podstrony.zagadnienia_uwagi', ['Wyniki'=>$zagadnienia_uwagi]);
    }


    public function create(Request $request)
    {
        //$data=$request->all();
        $data = $this->validator($request->all());
        $data = Arr::add($data, 'status', 'Nowa');
        $data = Arr::add($data, 'dodal_user', \Auth::user()->id);
        $data = Arr::add($data, 'dodal_user_nazwa', \Auth::user()->name);

        Zagadnienia_uwagi::create($data);

if($data['do']==='zagadnienie')
{
    session()->flash('komunikat', "Nowy komentarz do zagadnienia został dodany!");
    return redirect(route('zagadnienieCale', $data['slug'] ));
}

else

{
    session()->flash('komunikat', "Nowy komentarz do hasła został dodany!");
    return redirect(route('hasloCale', $data['slug']));

}
        //hasloCale

    }
}
