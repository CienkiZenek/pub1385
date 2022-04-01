<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
class Info extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'info_tytul' => $this->tytul,
            'info_naglowek' => $this->naglowek,
            'info_tresc' => $this->tresc,


        ];
    }
    protected $table = 'info';
   /* protected $fillable =['tytul', 'naglowek', 'tresc', 'rodzaj', 'dodal_user', 'link'];*/

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function setTytulAttribute($value){
        $this->attributes['tytul']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
