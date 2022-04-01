<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
class Znalezione extends Model
{
    use HasFactory;
    use Searchable;
    public $asYouType = true;
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'znal_nazwa' => $this->nazwa,
            'znal_komentarz' => $this->komentarz,


        ];
    }
    protected $table = 'znalezione';
    protected $fillable =['nazwa', 'link', 'rodzaj', 'status', 'dodal_user', 'dodal_user_nazwa', 'komentarz', 'media_id'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function media(){
        return $this->belongsTo(Media::class, 'media_id', 'id');}
}
