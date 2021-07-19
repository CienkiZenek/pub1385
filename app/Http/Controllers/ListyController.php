<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Propozycje_uwagi;
use App\Zagadnienia_uwagi;
use App\Mail\UserDoUsera;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use PhpParser\Lexer\TokenEmulator\FlexibleDocStringEmulator;

class ListyController extends Controller
{
   public function wyslijUserForm($userAdresatId){
       $wysylajacy = Auth::user();
      $odbiorca = User::findOrFail($userAdresatId);
       return view('wiadomosciForm.formListUser', ['wysylajacy'=>$wysylajacy,
           'odbiorca'=>$odbiorca]);
   }


      public function wyslijUser(Request $request, $odbiorca){


          $tresc= $request['tresc'];
         $odbiorca=User::findOrFail($odbiorca);
          Mail::to($odbiorca)->send(new UserDoUsera($tresc, $odbiorca, Auth::user()));

          session()->flash('komunikat', "List został wysłany!");
          return redirect(route('ustawieniaDane'));

      }

      /* Dodanie funcjonalności - link w treści listu informujacy o tym której uwagi (do propozycji lub tematu) się list odnosi */

    public function listZagadnieniaUwagi(){
        /*TODO */
    }

    public function listPropozycjeUwagi(){
        /*TODO */
    }

}
