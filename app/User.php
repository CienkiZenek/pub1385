<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Propozycje_uwagi;
use App\Propozycje;
use App\Zagadnienia_uwagi;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'stan',
        'ranga',
        'uprawnienia',
        'izsk',
        'izsk_warunek',
        'imie',
        'nazwisko',
        'ulica_nazwa',
        'ulica_numer',
        'miejscowosc',
        'kod',
        'zgoda_regulamin',
        'listy_odbiera',
        'zgoda_listy_red',
        'zgoda_listy_innych'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAktywny(){

        return $this->stan==='Aktywny';
    }

    public function isAktPotw(){

        return $this->stan==='Aktywny' && $this->hasVerifiedEmail();
    }

    public function przyjmujeListyOdInnych(){

        return ($this->stan==='Aktywny' && $this->hasVerifiedEmail() && $this->zgoda_listy_innych===1);
    }

    public function mozeKomentowac(){

        return $this->stan==='Aktywny' && $this->hasVerifiedEmail();
    }

    public function propozycjeUwagi(){
        return $this->hasMany(Propozycje_uwagi::class, 'dodal_user', 'id');
    }

    public function propozycje(){
        return $this->hasMany(Propozycje::class, 'dodal_user', 'id');
    }

    public function zagadnieniaUwagi(){
        return $this->hasMany(Zagadnienia_uwagi::class, 'dodal_user', 'id');
    }


}
