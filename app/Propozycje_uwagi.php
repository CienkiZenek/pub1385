<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Propozycje_uwagi extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'prop_uwagi_naglowek' => $this->naglowek,
            'prop_uwagi_tresc' => $this->tresc,

        ];
    }
    protected $table = 'propozycje_uwagi';
    protected $fillable =['naglowek', 'tresc','status', 'propozycja_id', 'dodal_user', 'dodal_user_nazwa', 'historia_zmian'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function propozycja(){
        return $this->belongsTo(Propozycje::class, 'propozycja_id', 'id');}
}
