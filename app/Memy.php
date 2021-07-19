<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
class Memy extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'mem_tytul' => $this->tytul,
            'mem_podpis' => $this->podpis,


        ];
    }
    protected $table = 'memy';
  /*  protected $fillable =['tytul', 'podpis', 'mem', 'dodal_user', 'status'];*/
    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function getUrlmemAttribute(){
        return Storage::url($this->mem);}
    public function setTytulAttribute($value){
        $this->attributes['tytul']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
