<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bibliografia extends Model
{
    use HasFactory;
    protected $table = 'bibliografia';
   /* protected $fillable =['tresc', 'dzial', 'dodal_user', 'id_pozycja'];*/

    public function hasla(){
        return $this->belongsTo(Hasla::class, 'id_pozycja', 'id');}
    public function zagadnienia(){
        return $this->belongsTo(Zagadnienia::class, 'id_pozycja', 'id');}
}
