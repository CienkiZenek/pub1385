<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Czlonkowie extends Model
{
    use HasFactory;
    //

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}
}
