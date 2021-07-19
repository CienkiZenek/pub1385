<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class _PomocniczyController extends Controller
{

   /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'tresc' => ['required', 'string', 'min:10'],
            'captcha' => 'required|captcha'
        ]);
    }*/
    protected function validator($data){
        $walidated= Validator::make($data, [
            'tresc'=>'required|min:10',
            'captcha' => 'required|captcha'
        ])->validate();
        return $walidated;
    }


    public function listDoRedakcji(Request $request){
        $data = $this->validator($request->all());
        /*dd($data);*/
$wiadomosc=$data['tresc'];
       mail(env('MAIL_REDAKCJA' ), 'Wiadomość z PoradnikDyskutanta.pl', $wiadomosc);
      // mail('w.operacz@poczta.onet.pl', 'Wiadomość z PoradnikDyskutanta.pl', 'aaaa');
        return redirect('/')->with('komunikat', 'Wysłano wiadomość do redakcji');
    }


}
