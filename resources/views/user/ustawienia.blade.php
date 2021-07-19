@extends('szablon')
@section('title', 'Poradnik dyskutanta - ustawienia')
@section('tresc')

    <div class="container">
        <div class="row">
            @if(Auth::user()->hasVerifiedEmail())
            <div class="text-center fs-4 ">Moje konto</div>
<div class="col-sm-12 col-md-6 col-lg-4 mt-3">
            <a href="{{route('ustawieniaEdycja')}}" class="btn btn-outline-success me-2" role="button"
               aria-pressed="true">
                <i class="bi bi-pen"></i> Zmień dane</a>
</div>

            <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
            <a href="{{route('hasloReset.email')}}" class="btn btn-outline-success me-2" role="button"
               aria-pressed="true">
                <i class="bi bi-file-earmark-lock"></i> Zmień hasło</a>
            </div>

                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <a href="{{route('nowyTemat')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-file-earmark-text"></i> Zaproponuj nowy temat</a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <a href="{{route('listaMoichTematow')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-list"></i> Moje propozycje tematów</a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('mojeUwagi')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-list-nested"></i> Moje uwagi</a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('uwagiPropozycje')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-list-check"></i> Uwagi innych do moich propozycji</a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('znalezioneLista')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-box-arrow-up-right"></i> Znalezione w sieci</a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('miejscaDyskusjiLista')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-people-fill"></i> Miejsca do dyskusji</a>
                </div>
               {{-- <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('nowyTemat')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-envelope"></i> Wiadomości</a>
                </div>--}}

            @endif
            @if(!Auth::user()->hasVerifiedEmail())
                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
            <a href="{{route('verification.send')}}" class="btn btn-outline-primary me-2" role="button"
               aria-pressed="true">
                <i class="bi-arrow-bar-right"></i> Ponowne wysłanie linku do potwierdzenia adresu e-mail</a>
                </div>
@endif

                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <a href="#" class="btn btn-outline-danger me-2" role="button"
                       aria-pressed="true" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
                        <i class="bi bi-person-x-fill"></i> Usuń konto</a>
                </div>
        </div>
    </div>

    <div class="collapse" id="usuwanie">
        <div class="mt-5 mb-5"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunKonto')}}" method="post">
                @csrf

                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń konto</button>


            </form>

        </div>
    </div>

@endsection
