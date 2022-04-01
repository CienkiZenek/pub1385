<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Miejsca extends Model
{
    use Searchable;

    public $asYouType = true;
    public function toSearchableArray()
    {
        return [

            'id' => $this->id,
            'miejsce_tytul' => $this->tytul,
            'miejsce_opis' => $this->opis,
        ];
    }
    protected $table = 'miejsca';
    protected $fillable =['link', 'rodzaj', 'opis', 'status', 'dodal_user', 'dodal_user_nazwa', 'tytul', 'media_id'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function media(){
        return $this->belongsTo(Media::class, 'media_id', 'id');}
}
