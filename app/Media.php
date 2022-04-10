<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
 protected $fillable =['nazwa', 'link', 'dodal_user', 'logo'];


    public function znalezione(){
        return  $this->hasMany(Znalezione::class, 'media_id', 'id');
    }

    public function miejsca(){
        return  $this->hasMany(Miejsca::class, 'media_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function getUrllogoAttribute(){
        return Storage::url($this->logo);}
}
