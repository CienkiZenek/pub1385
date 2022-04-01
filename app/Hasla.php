<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;
use phpDocumentor\Reflection\DocBlock\Tag;


class Hasla extends Model
{
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'haslo_tytul' => $this->haslo,
            'haslo_tresc' => $this->tresc,

        ];
    }
    protected $table = 'hasla';
    /*protected $fillable =[
        'haslo',
        'tresc',
        'kategoria_id',
        'dzial_id',
        'status',
        'dodal_user',
        'historia_zmian',
        'linkSlownikPdf',
        'trescLinku'
    ];*/


    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    /*public function hasla(){
        return $this->belongsTo(Zagadnienia::class, 'haslo_id', 'id');}*/

    public function kategorie(){
        return $this->belongsTo(Kategorie::class, 'kategoria_id', 'id');}

    public function dzialy(){
        return $this->belongsTo(Dzialy::class, 'dzial_id', 'id');}

    public function zagadnienia(){
        return $this->hasMany(Zagadnienia::class, 'haslo_id', 'id');
    }
    public function zagadnieniaAktywne(){
        return $this->hasMany(Zagadnienia::class, 'haslo_id', 'id')->where('status', 'Aktywny');
    }

    public function uwagi(){
        return $this->hasMany(Zagadnienia_uwagi::class, 'haslo_id', 'id')->where('do', 'haslo');
    }

    public function tagi(){
        return $this->belongsToMany(Tagi::class,'hasla_tagi', 'hasla_id','tagi_id');
    }

    public function bibliografia(){
        return $this->hasMany(Bibliografia::class, 'id_pozycja', 'id')->where('dzial', 'hasla');
    }

    public function linki(){
        return $this->hasMany(Linki::class, 'id_pozycja', 'id')->where('dzial', 'hasla');
    }

    public function pliki(){
        return $this->hasMany(Pliki::class, 'id_pozycja', 'id')->where('dzial', 'hasla');
    }



    public function setHasloAttribute($value){
        $this->attributes['haslo']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
