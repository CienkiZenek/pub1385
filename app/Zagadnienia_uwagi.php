<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Hasla;
use App\Zagadnienia;
class Zagadnienia_uwagi extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'zag_uw_naglowek' => $this->naglowek,
            'zag_uw_tresc' => $this->tresc,


        ];
    }
    protected $table = 'zagadnienia_uwagi';
    protected $fillable =['naglowek', 'tresc', 'status', 'do','zagadnienie_id', 'haslo_id', 'dodal_user_nazwa', 'dodal_user', 'historia_zmian'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function zagadnienie(){
        return $this->belongsTo(Zagadnienia::class, 'zagadnienie_id', 'id');}

    public function haslo(){
        return $this->belongsTo(Hasla::class, 'haslo_id', 'id');}
}
