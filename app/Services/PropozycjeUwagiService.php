<?php
namespace App\Services;
use App\Propozycje;

class PropozycjeUwagiService {

public static function propozycjeUwagi(){

    /* 1 wyszukiwanie listy moich propzycji*/

    $propozycjeUsera=Propozycje::Where('dodal_user', \auth()->user()->id)->get();
    /* 2 dla każdej z propozycji wyszukujemy powiązanych z nią uwag
    i łaczymy je razem
    */
    $Wyniki=collect();
    for($i = 0;$i<$propozycjeUsera->count();$i++)
    {
        $tmp=$propozycjeUsera->slice($i,1)->first()->uwagi;
        $Wyniki=$Wyniki->concat($tmp);
    }
    return $Wyniki;
}

}