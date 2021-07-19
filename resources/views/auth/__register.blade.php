@extends('szablon')
@section('title', 'Rejestracja nowego użytkownika')
@section('tresc')

    <div class="row ">
        <div class="col-3"></div>
        <div class="col-6 tloSzare2 border1">

            <form method="post" action="{{ route('register') }}">
                @csrf
                <fieldset class="form-group ">
                    <legend class="">Rejestracja nowego użytkownika. Podaj dane:</legend>
                    <div class="form-group">
                        <label for="nazwa">Użytkownik:</label>
                        <input type="text" class="form-control " id="name" name="name" placeholder="Podaj nazwę użytkownika" required minlength="4">
                        <div class="valid-feedback">
                            Nazwa jest dobra!
                        </div>
                        <div class="invalid-feedback">
                            Podaj unikalną nazwę (min. 4 znaki)
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Wpisz email" required>
                        <div class="invalid-feedback">
                            Podaj poprawny e-mail!
                        </div>
                        <div class="valid-feedback">
                            Poprawny adres e-mail!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="haslo1">Hasło:</label>
                        <input type="password" class="form-control" id="password"  name="password" placeholder="Hasło" aria-describedby="hasloHelp" required minlength="8">
                        <small id="hasloHelp" class="form-text text-muted">Hasło musi się składać z minimum 8 znaków!</small>
                        <div class="invalid-feedback">
                            Podaj hasło!
                        </div>
                        <div class="valid-feedback">
                            Hasło OK!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="haslo2">Powtórz hasło:</label>
                        <input type="password" class="form-control" id="password_confirmed" name="password_confirmed" placeholder="Powtórz hasło" required minlength="8">
                        <div class="invalid-feedback">
                            Podane hasła nie zgadzają sie!
                        </div>
                        <div class="valid-feedback">
                            Powtórka hasła OK!
                        </div>
                    </div>

                    <button type="submit" id="zapiszBtn" class="btn btn-primary" >Zapisz</button>
                </fieldset>
            </form>

        </div>
        <div class="col-3"></div>
    </div>


@endsection
