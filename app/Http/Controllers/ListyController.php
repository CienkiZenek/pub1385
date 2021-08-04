<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Listy;
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

          // Zapisywanie treści do bazy
          $list['tresc']=$tresc;
          $list['naglowek']='';
          $list['tytul']='';
         // $list['autor_id']=Auth::user()->id;
          $list['autor_id']=auth()->user()->id;
          $list['odbiorca_id']=$odbiorca->id;
          $list['status']='wyslane';
          $list['rodzajOdbiorcy']='user';
          Listy::create($list);

          session()->flash('komunikat', "List został wysłany!");
          return redirect(route('ustawieniaDane'));

      }

      /* TODO Dodanie funcjonalności - link w treści listu informujacy o tym której uwagi (do propozycji lub tematu) się list odnosi */



}
