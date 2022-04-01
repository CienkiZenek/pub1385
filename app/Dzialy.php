<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dzialy extends Model
{
    protected $table = 'dzialy';
  /*  protected $fillable =['dzial', 'opis', 'dodal_user', 'status'];*/

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function kategorie(){
        return $this->hasMany(Kategorie::class, 'dzial_id', 'id');
    }
}
