<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
class Zagadnienia extends Model
{

    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'zag_zag' => $this->zagadnienie,
            'zag_tresc' => $this->tresc,
            'zag_wiecej' => $this->wiecej,
            'zag_rozszerz' => $this->rozszerz,
            'zag_podp1' => $this->podpisObrazek1,
            'zag_podp2' => $this->podpisObrazek2,


        ];
    }
    protected $table = 'zagadnienia';
    /*protected $fillable =['zagadnienie',
        'tresc',
        'wiecej',
        'zajawka',
        'zajawka_pokaz',
        'rozszerz',
        'dzial_id',
        'kategoria_id',
        'haslo_id',
        'dodal_user',
        'status',
        'historia_zmian',
        'dodal_user',
        'obrazek1',
        'obrazek2',
        'tytulObrazek1',
        'tytulObrazek2',
        'podpisObrazek1',
        'podpisObrazek2',
        'ramka_mala',
        'ramka_duza',
        'linkSlownikPdf',
        'trescLinku'
        ];*/


    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function kategorie(){
        return $this->belongsTo(Kategorie::class, 'kategoria_id', 'id');}

    public function dzialy(){
        return $this->belongsTo(Dzialy::class, 'dzial_id', 'id');}

    public function hasla(){
        return $this->belongsTo(Hasla::class, 'haslo_id', 'id');}

    public function tagi(){
        return $this->belongsToMany(Tagi::class,'zagadnienia_tagi', 'zagadnienia_id','tagi_id');
    }

    public function uwagi(){
        return $this->hasMany(Zagadnienia_uwagi::class, 'zagadnienie_id', 'id')->where('do', 'zagadnienie');
    }

    public function bibliografia(){
        return $this->hasMany(Bibliografia::class, 'id_pozycja', 'id')->where('dzial', 'zagadnienia');
    }

    public function linki(){
        return $this->hasMany(Linki::class, 'id_pozycja', 'id')->where('dzial', 'zagadnienia');
    }

    public function pliki(){
        return $this->hasMany(Pliki::class, 'id_pozycja', 'id')->where('dzial', 'zagadnienia');
    }



    public function getUrlobrazek1Attribute(){
        return Storage::url($this->obrazek1);}
    public function getUrlobrazek2Attribute(){
        return Storage::url($this->obrazek2);}

    public function setZagadnienieAttribute($value){
        $this->attributes['zagadnienie']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }


}
