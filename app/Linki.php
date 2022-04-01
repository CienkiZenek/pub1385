<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Linki extends Model
{
    use HasFactory;
    protected $table = 'linki';
   /* protected $fillable =['tresc', 'dzial', 'dodal_user', 'link', 'id_pozycja'];*/

    public function hasla(){
        return $this->belongsTo(Hasla::class, 'id_pozycja', 'id');}
    public function zagadnienia(){
        return $this->belongsTo(Zagadnienia::class, 'id_pozycja', 'id');}
}
