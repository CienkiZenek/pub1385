<?php

namespace App\Services;
use App\Services\IkonyLosowanie;
use Illuminate\Support\Facades\App;

class Ikony
{

    public static function ikonaStala($tytul){
$ikonaLosowa= new IkonyLosowanie();

        switch($tytul) {
            case('Inkwizycja'):
                $wynik = 'Cloud_sun';
                break;
            case('Istnienie Boga'):
                $wynik = 'Fingerprint';
                break;
            case('Życie po śmierci'):
                $wynik = 'Calculator';
                break;
            case('Czy Chrześcijaństwo to jedna z najbardziej amoralnych religii? Cześć 1'):
                $wynik = 'Bag';
                break;
            case('Czy Chrześcijaństwo to jedna z najbardziej amoralnych religii? Cześć 2'):
                $wynik = 'Bag_check';
                break;
            case('Czy Chrześcijaństwo to jedna z najbardziej amoralnych religii? Cześć 3'):
                $wynik = 'Bag_check_fill';
                break;
            default:
                $wynik = $ikonaLosowa->ikona();
        }


        return $wynik;
    }
}
