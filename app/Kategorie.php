<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorie extends Model
{
    protected $table = 'kategorie';
    /*protected $fillable =['kategoria', 'opis', 'dzial_id', 'dodal_user', 'status', 'dodal_user'];*/


    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

   public function dzialy(){
        return $this->belongsTo(Dzialy::class, 'dzial_id', 'id');}

    public function hasla(){
        return $this->hasMany(Hasla::class, 'kategoria_id', 'id');
    }
}
