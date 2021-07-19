<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class UstawieniaController extends Controller
{
    public function index(){


    }


    public function __construct()
    {
        $this->middleware('auth');
        /*$this->middleware('signed')->only('verify');*/
       $this->middleware('UserAktywny');
    }

    /*protected function validator(array $data)
    {
        return Validator::make($data, [

                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
    }*/

    protected function validator(array $data)
    {
        return Validator::make(['email' => $data['email']], [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'
        ]]);
    }

    // Wyświetla uzytkownikowi jego dane
    public function ustawienia(){
        return view('user.ustawienia');

    }
    // Wyświetla uzytkownikowi jego dane w formularzu, gdu chce je zmienić
    public function ustawieniaEdycja(){
        return view('user.ustawieniaForm');

    }
    //Zapisuje zmienione dane użytkownika
    public function ustawieniaZapis(Request $request)
    {

$user=Auth::user();

$user->email = $request->email;
        $user->zgoda_listy_innych = $request->zgoda_listy_innych;
        $user->save();

        session()->flash('komunikat', "Dane zostały zaktualizowany!");
        return view('user.ustawieniaForm');


    }

    public function usunKonto(){
        $user=Auth::user();
        $user->stan='Usunięty';
        $user->save();
        session()->flash('komunikat', "Konto zostało usunięte!");
        Auth::logout();
        return redirect(route('stronaGlowne'));

    }


}
