@extends('szablon')
@section('title', 'PoradnikDyskutanta: Propozycja tematu')
@section('tresc')

    <div class="row mt-3">
        <div class="col-12 ">
            <a href="{{route('listaMoichTematow')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                <i class="bi bi-list"></i> Moje propozycje tematów</a>
        </div>
        </div>
    <div class="mt-3">Autor propozycji: {{$propozycja->user->name}}</div>
    @if($propozycja->moznaEdytowac())

    <form action="{{route('updatePropozycji', $propozycja->id)}}" method="POST">
        @csrf
    <div class="row mt-3">
        <div class="col-12 text-center fs-5">
            Edycja proponowanego tematu (możesz go edytować przez 7 dni od dodania)
        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >Tytuł:</span>
                                </div>
                                <textarea class="form-control" name="tytul" id="tytul" rows="1">{{$propozycja->tytul}}</textarea>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >Treść:</span>
                                </div>
                                <textarea class="form-control" name="tresc" id="tresc" rows="10">{{$propozycja->tresc}}</textarea>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Aktualizuj</button>
                        </div>

    </div>
        </form>

@else
    <div class="row mt-3">
        <div class="col-12 text-center fs-5">
            Zaproponowany temat:
        </div>


        <div class="col-12 mt-3">
            {{$propozycja->naglowek}}
        </div>
        <div class="col-12 mt-3">
            {{$propozycja->tresc}}
        </div>

    </div>
    @endif

    <div class="mt-3 mb-3">

        {{-- Nie wyświetla przycisku poczty, gdy autorem jest aktualnie zalogowany user czyli nie wysyła lisyu do samego siebie--}}
        @if(Auth::user()->id!==$propozycja->dodal_user)

            {{--Sprawdza czy użytkownik zgadza się otrzymywać listy od innych--}}
            @if($propozycja->user->przyjmujeListyOdInnych())

                <div class="col-12 mt-3">
                    <a href="{{route('WyslijUser', $propozycja->dodal_user)}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-envelope-open"></i> Wyślij list do autora propozycji</a>
                </div>
            @endif
        @endif
    </div>

    @if($Wyniki->count()>0)
    <div class="row mt-3">
        <div class="col-12 text-center fs-5">
            Uwagi i uzupelnienia zgłoszone  do tej propozycji:
        </div>


        <div class="list-group row mt-3">

            @foreach($Wyniki as $uwaga)

                <div class="col-10 size20"> <a href="{{ route('uwagaPodglad', $uwaga->id) }}" class="list-group-item list-group-item-action">
                        {{ Str::limit($uwaga->naglowek, 50) }} (Autor: {{$uwaga->dodal_user_nazwa}})
                    </a>
                </div>
            @endforeach
        </div>

        </div>

@endif
@endsection