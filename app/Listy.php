<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listy extends Model
{
    use HasFactory;
    protected $table = 'listy';
    protected $fillable =['tresc', 'naglowek', 'tytul', 'autor_id', 'odbiorca_id', 'status', 'rodzajOdbiorcy'];
}
