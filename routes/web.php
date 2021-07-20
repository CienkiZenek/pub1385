<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', '_GlownyController@start')->name('stronaGlowne');

// Menu główne
Route::get('/hasla', 'HaslaController@index')->name('hasla');
Route::get('/tematy', '_GlownyController@tematy')->name('tematy');
Route::get('/propozycje', 'PropozycjeController@index')->name('propozycje')->middleware('UserAktywny');
Route::get('/zagadnienia', 'ZagadnieniaController@index')->name('zagadnienia');
Route::get('/zagadnienia_uwagi', 'Zagadnienia_uwagiController@index')->name('zagadnienia_uwagi');
Route::get('/miejsca', 'MiejscaController@index')->name('miejsca')->middleware('UserAktywny');
Route::get('/tagi', 'TagiController@index')->name('tagi');
Route::get('/memKomiksy', 'MemyController@index')->name('memy');
Route::get('/info', 'InfoController@index')->name('info')->middleware('UserAktywny');
Route::get('/komunikaty', 'KomunikatyController@index')->name('komunikaty');
Route::get('/znalezione', 'ZnalezioneController@index')->name('znalezione');
Route::get('/kontakt', '_GlownyController@kontakt')->name('kontakt');
Route::get('/regulamin', '_GlownyController@regulamin')->name('regulamin');
Route::get('/wsparcie', '_GlownyController@wsparcie')->name('wsparcie');
Route::get('/przekazdnia', 'PrzekazdniaController@index')->name('przekazdnia');

// Koniec menu główne

// Całe wpisy

Route::get('/haslo/{slug}', 'HaslaController@hasloCale')->name('hasloCale');
Route::get('/zagadnienie/{slug}', 'ZagadnieniaController@zagadnienieCale')->name('zagadnienieCale');
Route::get('/info/{id}', 'InfoController@infoCale')->name('infoCale')->middleware('UserAktywny');
Route::get('/komunikat/{id}', 'KomunikatyController@komunikatCale')->name('komunikatCale');
Route::get('/przekaz/{id}', 'PrzekazdniaController@przekazCale')->name('przekazCale');
Route::get('/tag/{id}', 'TagiController@tagCale')->name('tagCale');
Route::get('/memy/{id}', 'MemyController@memCale')->name('memCale');

// Koniec całych wpisów

//wyszukiwanie na glownej stronie
Route::post('/szukaj', '_GlownyController@szukaj')->name('szukaj');
Route::get('/szukaj', '_GlownyController@start');

//Koniec wyszukiwania na glownej stronie

// podstrony
// kontakt -- list do redakcji
Route::post('/listDoRedakcji', '_PomocniczyController@listDoRedakcji')->name('listDoRedakcji');

// koniec podstrony

// Użytkownicy - działania

//Formularz do proponowania tematów prze użytkownika
Route::get('/nowyTemat', 'UserDzialaniaController@nowyTemat')->name('nowyTemat')->middleware('UserAktywny');
Route::post('/nowyTematZapisz', 'UserDzialaniaController@create')->name('nowyTematZapisz')->middleware('UserAktywny');

Route::get('/edycjaPropozycji/{id}', 'UserDzialaniaController@edycjaPropozycji')->name('edycjaPropozycji')->middleware('UserAktywny');
Route::post('/updatePropozycji/{id}', 'UserDzialaniaController@updatePropozycji')->name('updatePropozycji')->middleware('UserAktywny');

/* lista propozycji usera*/
Route::get('/listaMoichTematow', 'UserDzialaniaController@lista_moich_propozycji')->name('listaMoichTematow')->middleware('UserAktywny');
Route::get('/searchListaMoichTematow', 'UserDzialaniaController@search_lista_moich_propozycji')->name('searchListaMoichTematow')->middleware('UserAktywny');


/* uwagi usera do tematów i propozycji*/
Route::get('/mojeUwagi', 'UserDzialaniaController@lista_moich_uwag')->name('mojeUwagi')->middleware('UserAktywny');
Route::get('/searchMojeUwagi', 'UserDzialaniaController@search_lista_moich_uwag')->name('searchMojeUwagi')->middleware('UserAktywny');
Route::post('/uwagiZapisNowe', 'Zagadnienia_uwagiController@create')->name('uwagiZapisNowe')->middleware('UserAktywny');

/* uwagi do propozycji usera*/
Route::get('/uwagiPropozycje', 'UserDzialaniaController@lista_uwag_do_moich_propozycji')->name('uwagiPropozycje')->middleware('UserAktywny');
Route::get('/searchUwagiPropozycje', 'UserDzialaniaController@search_lista_uwag_do_moich_propozycji')->name('searchUwagiPropozycje')->middleware('UserAktywny');

/* podgląd uwagi do propozycji*/
Route::get('/uwagaPodglad/{id}', 'UserDzialaniaController@uwagaPodglad')->name('uwagaPodglad')->middleware('UserAktywny');

/* podgląd uwagi do teamtu (zagadnienie lub hasła)*/
Route::get('/uwagaTematPodglad/{id}', 'UserDzialaniaController@uwagaTematPodglad')->name('uwagaTematPodglad')->middleware('UserAktywny');


/*dodawnie nowego medium*/
Route::get('/noweMedium}', 'UserDzialaniaController@noweMedium')->name('noweMedium')->middleware('UserAktywny');
Route::post('/noweMediumZapis}', 'UserDzialaniaController@noweMediumZapis')->name('noweMediumZapis')->middleware('UserAktywny');

/*List do innego użytkownika*/

Route::get('/WyslijUser/{id}', 'ListyController@wyslijUserForm')->name('WyslijUser')->middleware('UserAktywny');
Route::post('/WyslijUser/{user}', 'ListyController@wyslijUser')->name('WyslijUserWy')->middleware('UserAktywny');


/* Znalezione w sieci dodane przez usera - lista i dodawanie nowego*/
Route::get('/znalezioneLista', 'UserDzialaniaController@znalezioneLista')->name('znalezioneLista')->middleware('UserAktywny');
Route::get('/noweZnalezione', 'UserDzialaniaController@noweZnalezione')->name('noweZnalezione')->middleware('UserAktywny');
Route::post('/noweZnalezione', 'UserDzialaniaController@noweZnalezioneZapis')->name('noweZnalezioneZapis')->middleware('UserAktywny');

/* Miejsca do dyskusji dodane przez usera - lista i dodawanie nowego*/
Route::get('/miejscaDyskusjiLista', 'UserDzialaniaController@miejscaDyskusjiLista')->name('miejscaDyskusjiLista')->middleware('UserAktywny');
Route::get('/noweMiejscaDyskusj', 'UserDzialaniaController@noweMiejscaDyskusj')->name('noweMiejscaDyskusj')->middleware('UserAktywny');
Route::post('/noweMiejscaDyskusj', 'UserDzialaniaController@noweMiejscaDyskusjZapis')->name('noweMiejscaDyskusjZapis')->middleware('UserAktywny');




// Koniec użytkownicy - działania

//Autentykacja
Auth::routes(['verify'=>true]); // dodaje wszystkie ścieżki, ale wolimy dodać je ręcznie:

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::post('/wylogowanie', 'Auth\LoginController@logout')->name('wylogowanie');
//resetowanie hasła
Route::get('/hasloReset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('hasloReset.email');
Route::post('/hasloReset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('hasloReset.email');
Route::get('/password.reset{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password.reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// weryfikacja e-maila
//Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('verified', 'Treść');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('resent', 'Treść');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Koniec autentykacji


// konto użytkownika/ustawienia własne
Route::get('/ustawienia', 'User\UstawieniaController@ustawienia')->name('ustawieniaDane')->middleware('UserAktywny');
Route::get('/ustawieniaEdycja', 'User\UstawieniaController@ustawieniaEdycja')->name('ustawieniaEdycja')->middleware('UserAktywny');
Route::post('/ustawieniaZapis', 'User\UstawieniaController@ustawieniaZapis')->name('ustawieniaZapis')->middleware('UserAktywny');
Route::get('/usunKonto', 'User\UstawieniaController@usunKonto')->name('usunKonto')->middleware('UserAktywny');
Route::post('/usunKonto', 'User\UstawieniaController@usunKonto')->name('usunKonto')->middleware('UserAktywny');

//Koniec ustawień użytkownika

/*
Route::get('/test2', function () {
    return view('auth.login');
})->name('test2');
function () {
    return view('tresc.dodawanie.czlonkowie-dodawanie');
}*/

// captcha
Route::get('refresh_captcha', '_GlownyController@refreshCaptcha')->name('refresh_captcha');
// koniec captcha