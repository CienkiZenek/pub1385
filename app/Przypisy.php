<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Przypisy extends Model
{
    use HasFactory;
    protected $table = 'przypisy';
   /* protected $fillable =['tresc', 'dodal_user', 'id_pozycja', 'numer'];*/

    public function zagadnienia(){
        return $this->belongsTo(Zagadnienia::class, 'id_pozycja', 'id');}

}
