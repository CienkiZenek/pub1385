<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Przekazdnia;
class PrzekazdniaController extends Controller
{

    public function __construct()
    {
        /*$this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('UserAktywny');*/
    }

    public function index(){

        $przekazy=Przekazdnia::where('status', 'Opublikowany')->orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.podstrony.przekazdnia', ['Wyniki'=>$przekazy]);
    }
    public function przekazCale($id){

        $przekaz = Przekazdnia::findOrFail($id);

        return view('tresc.cale.przekaz-cale', ['przekaz'=>$przekaz]);

    }
}
