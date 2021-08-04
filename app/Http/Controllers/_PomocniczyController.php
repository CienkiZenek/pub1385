<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Listy;
use Illuminate\Support\Facades\Auth;

class _PomocniczyController extends Controller
{

    public $headers = "MIME-Version: 1.0"."\r\n"."Content-Type: text/html; charset=UTF-8". "\r\n". "From: <info@example.com>";


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
    protected function validatorBezCaptha($data){
        $walidated= Validator::make($data, [
            'tresc'=>'required|min:10'
        ])->validate();
        return $walidated;
    }

/* List do redakcji użytkowników niezalogownych i bez potwierdzonego e-mailu*/
    public function listDoRedakcji(Request $request){
        $data = $this->validator($request->all());
        /*dd($data);*/
$wiadomosc=$data['tresc'];
       mail(env('MAIL_REDAKCJA' ), 'List z PoradnikDyskutanta.pl', $wiadomosc, $this->headers);

        return redirect('/')->with('komunikat', 'Wysłano wiadomość do redakcji');
    }


    /* List do redakcji użytkowników Zalogownych i Z potwierdzonym e-mailem*/
    public function listDoRedakcjiUser(Request $request){
        $data = $this->validatorBezCaptha($request->all());
        /*dd($data);*/
        $wiadomosc=$data['tresc'];

        /* zapisywanie treści listu  w bazie */
        /* Odbiorca o id 1 to redakcj!!*/

        $list['tresc']=$wiadomosc;
        $list['naglowek']='';
        $list['tytul']='';
        $list['autor_id']=Auth::user()->id;
        $list['odbiorca_id']=1;
        $list['status']='wyslane';
        $list['rodzajOdbiorcy']='redakcja';
        Listy::create($list);

        /* Wysyłanie listu*/

       // $headers = "MIME-Version: 1.0" . "\r\n";
       // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
        //$headers .= 'From: <webmaster@example.com>' . "\r\n";

        // create header
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
       // $header .= 'To: ' . $r. "\r\n";
       // $header .= 'From: ' . $s. "\r\n";
       // $headers = "Content-Type: text/html; charset=UTF-8";
        $wiadomosc.= Auth::user()->name;
        $wiadomosc.="\r\n".Auth::user()->email;
       // dd($wiadomosc);
            mail(env('MAIL_REDAKCJA'), 'List z PoradnikDyskutanta.pl', $wiadomosc, $this->headers);
        // mail('w.operacz@poczta.onet.pl', 'Wiadomość z PoradnikDyskutanta.pl', 'aaaa');
        return redirect('/')->with('komunikat', 'Wysłano wiadomość do redakcji');
    }

}
