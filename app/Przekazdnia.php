<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Przekazdnia extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'przekazdnia_tytul' => $this->tytul,
            'przekazdnia_naglowk' => $this->naglowek,
            'przekazdnia_tresc' => $this->tresc,
            'przekazdnia_ramka1' => $this->ramka1,
            'przekazdnia_ramka2' => $this->ramka2,


        ];
    }
    protected $table = 'przekazdnia';
   /* protected $fillable =['tytul', 'naglowek', 'tresc', 'ramka1', 'ramka2', 'status', 'dodal_user', 'dodal_user_nazwa'];*/

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function tagi(){
        return $this->belongsToMany(Tagi::class,'przekazdnia_tagi', 'przekazdnia_id','tagi_id');
    }
}

