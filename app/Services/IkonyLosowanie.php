<?php
namespace App\Services;


class IkonyLosowanie {


    public static function ikona(){
        $numer = rand(1, 41);

        switch($numer) {
            case(1):
                $wynik = 'home';
                break;
            case(2):
                $wynik = 'speedometer2';
                break;
            case(3):
                $wynik = 'table';
                break;
            case(4):
                $wynik = 'people-circle';
                break;
            case(5):
                $wynik = 'App_indicator';
                break;
            case(6):
                $wynik = 'Archive';
                break;
            case(7):
                $wynik = 'Archive_fill';
                break;
            case(8):
                $wynik = 'Bag';
                break;
            case(9):
                $wynik = 'Bag_check';
                break;
            case(10):
                $wynik = 'Bag_fill';
                break;
            case(11):
                $wynik = 'Balloon';
                break;
            case(12):
                $wynik = 'Balloon_fill';
                break;
            case(13):
                $wynik = 'Bandaid';
                break;
            case(14):
                $wynik = 'Bank';
                break;
            case(15):
                $wynik = 'Bank2';
                break;
            case(16):
                $wynik = 'Book';
                break;
            case(17):
                $wynik = 'Bookshelf';
                break;
            case(18):
                $wynik = 'Box_seam';
                break;
            case(19):
                $wynik = 'Calendar2';
                break;
            case(20):
                $wynik = 'Calendar3';
                break;
            case(21):
                $wynik = 'Card_text';
                break;
            case(22):
                $wynik = 'Clock';
                break;
            case(23):
                $wynik = 'Clock_history';
                break;
            case(24):
                $wynik = 'Compass';
                break;
            case(25):
                $wynik = 'Diamond_half_fill';
                break;
            case(26):
                $wynik = 'Door_open';
                break;
            case(27):
                $wynik = 'Easel2';
                break;
            case(28):
                $wynik = 'Exclude';
                break;
            case(29):
                $wynik = 'Gem';
                break;
            case(30):
                $wynik = 'Globe';
                break;
            case(31):
                $wynik = 'Hypnotize';
                break;
            case(32):
                $wynik = 'Magnet';
                break;
            case(33):
                $wynik = 'Megaphone';
                break;
            case(34):
                $wynik = 'Puzzle';
                break;
            case(35):
                $wynik = 'Shield';
                break;
            case(36):
                $wynik = 'Shop';
                break;
            case(37):
                $wynik = 'Signpost_2';
                break;
            case(38):
                $wynik = 'Snow';
                break;
            case(39):
                $wynik = 'Stars';
                break;
            case(40):
                $wynik = 'Tornado';
                break;
            case(41):
                $wynik = 'Watch';
                break;

            default:
                $wynik = 'home';
        }


return $wynik;
    }

}
