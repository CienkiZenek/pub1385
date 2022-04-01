<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class Pliki extends Model
{
    use HasFactory;
    protected $table = 'pliki';
  /*  protected $fillable =['plik', 'plik_nazwa', 'dzial', 'dodal_user', 'id_pozycja'];*/

    public function hasla(){
        return $this->belongsTo(Hasla::class, 'id_pozycja', 'id');}
    public function zagadnienia(){
        return $this->belongsTo(Zagadnienia::class, 'id_pozycja', 'id');}
    public function getUrlplikAttribute(){
        return Storage::url($this->plik);}
}
