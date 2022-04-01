<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Carbon\Carbon;
class Propozycje extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'prop_naglowek' => $this->naglowek,
            'prop_tresc' => $this->tresc,



        ];
    }
    protected $table = 'propozycje';
    protected $fillable =['tytul', 'tresc', 'status', 'dodal_user', 'dodal_user_nazwa'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}


    public function uwagi(){
        return $this->hasMany(Propozycje_uwagi::class, 'propozycja_id', 'id');
    }
        
        public function moznaEdytowac()
        {
            /*czas*/
            $utworzono = new Carbon($this->created_at);
            $roznica = $utworzono->diff(Carbon::now());
            /*Właściciel*/
           if( \Auth::user()->id===$this->dodal_user)
           {
            if ($roznica->d < 8) {
                return true;
            } else {
                return false;
            }
           }
        }



}
