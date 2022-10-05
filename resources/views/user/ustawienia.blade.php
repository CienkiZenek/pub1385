@extends('szablon')
@section('title', 'Moje konto')
@section('tresc')


    <div class="text-center fs-4 mb-3">Moje konto</div>
    <div class="accordion" id="mojeKontoUstawienia">
        <div class="accordion-item">
            <h2 class="accordion-header" id="ogolne">
                <button class="accordion-button tlo-nav"  type="button" data-bs-toggle="collapse" data-bs-target="#panelOgolne" aria-expanded="true" aria-controls="panelOgolne">
                    Ogólne
                </button>
            </h2>
            <div id="panelOgolne" class="accordion-collapse collapse show" aria-labelledby="ogolne">
                <div class="accordion-body">

                    @if(!Auth::user()->hasVerifiedEmail())

                        <a href="{{route('verification.send')}}" class="btn btn-outline-primary me-2" role="button"
                           aria-pressed="true">
                            <i class="bi-arrow-bar-right"></i> Ponowne wysłanie linku do potwierdzenia adresu e-mail</a>

                    @endif


                    @if(Auth::user()->hasVerifiedEmail())
                            <div class="row">
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

                    @endif


                    <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                        <a href="#" class="btn btn-outline-danger me-2" role="button"
                           aria-pressed="true" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
                            <i class="bi bi-person-x-fill"></i> Usuń konto</a>
                    </div>
                        <div class="collapse offset-8" id="usuwanie">
                            <div class="mt-5 mb-5"></div>
                            <div class="card card-body col-3 text-center">
                                <form action="{{route('usunKonto')}}" method="post">
                                    @csrf

                                    <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń konto</button>


                                </form>

                            </div>
                        </div>
                            </div>



                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="tematy">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelTematy" aria-expanded="false" aria-controls="panelTematy">
                    Tematy
                </button>
            </h2>
            <div id="panelTematy" class="accordion-collapse collapse" aria-labelledby="tematy">
                <div class="accordion-body">
                    <div class="row">

                        @if(Auth::user()->hasVerifiedEmail())
                            <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                                <a href="{{route('propozycje')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                                    <i class="bi bi-file-earmark-text"></i> Propozycje tematów</a>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                                <a href="{{route('nowyTemat')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                                    <i class="bi bi-file-earmark-text"></i> Zaproponuj nowy temat</a>
                            </div>
                        @endif


                    </div>



                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="mojaTresc">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelMojaTresc" aria-expanded="false" aria-controls="panelMojaTresc">
                   Moja treść
                </button>
            </h2>
            <div id="panelMojaTresc" class="accordion-collapse collapse" aria-labelledby="mojaTresc">
                <div class="accordion-body">
                    <div class="row">

                        @if(Auth::user()->hasVerifiedEmail())
                            @if(\App\Propozycje::Where('dodal_user', Auth::user()->id)->count()>0)
                                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                                    <a href="{{route('listaMoichTematow')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                                        <i class="bi bi-list"></i> Moje propozycje tematów</a>
                                </div>
                            @endif

                            @if(\App\Zagadnienia_uwagi::Where('dodal_user', \auth()->user()->id)->get()->count()>0 || \App\Propozycje_uwagi::Where('dodal_user', \auth()->user()->id)->get()->count()>0)
                                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                                    <a href="{{route('mojeUwagi')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                                        <i class="bi bi-list-nested"></i> Moje uwagi</a>
                                </div>
                            @endif

                            @if(\App\Services\PropozycjeUwagiService::propozycjeUwagi()->count()>0)
                                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                                    <a href="{{route('uwagiPropozycje')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                                        <i class="bi bi-list-check"></i> Uwagi innych do moich propozycji</a>
                                </div>
                            @endif
                        @endif



                    </div>
                </div>
            </div>
        </div>


        <div class="accordion-item">
            <h2 class="accordion-header" id="wInternecie">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelwInternecie" aria-expanded="false" aria-controls="panelwInternecie">
                    W internecie
                </button>
            </h2>
            <div id="panelwInternecie" class="accordion-collapse collapse" aria-labelledby="wInternecie">
                <div class="accordion-body">
                    <div class="row">


                        @if(Auth::user()->hasVerifiedEmail())

                            <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                                <a href="{{route('znalezioneLista')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                                    <i class="bi bi-box-arrow-up-right"></i> Znalezione w sieci</a>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                                <a href="{{route('miejscaDyskusjiLista')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                                    <i class="bi bi-people-fill"></i> Miejsca do dyskusji</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>


        <div class="accordion-item">
            <h2 class="accordion-header" id="wersja">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelWersja" aria-expanded="false" aria-controls="panelWersja">
                    Wersja systemu
                </button>
            </h2>
            <div id="panelWersja" class="accordion-collapse collapse" aria-labelledby="wersja">
                <div class="accordion-body">
                    <strong>Informacje o wersji systemu: </strong> {{   config('pomocnik.wersja') }}
                </div>
            </div>
        </div>

        </div>

   <div class="container">
        <div class="row">



            {{--@if(Auth::user()->hasVerifiedEmail())
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

            @endif--}}
                {{--@if(Auth::user()->hasVerifiedEmail())
                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <a href="{{route('propozycje')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-file-earmark-text"></i> Propozycje tematów</a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <a href="{{route('nowyTemat')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-file-earmark-text"></i> Zaproponuj nowy temat</a>
                </div>
            @endif--}}

           {{-- @if(Auth::user()->hasVerifiedEmail())
            @if(\App\Propozycje::Where('dodal_user', Auth::user()->id)->count()>0)
                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <a href="{{route('listaMoichTematow')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-list"></i> Moje propozycje tematów</a>
                </div>
@endif

                @if(\App\Zagadnienia_uwagi::Where('dodal_user', \auth()->user()->id)->get()->count()>0 || \App\Propozycje_uwagi::Where('dodal_user', \auth()->user()->id)->get()->count()>0)
                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('mojeUwagi')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-list-nested"></i> Moje uwagi</a>
                </div>
                @endif

                    @if(\App\Services\PropozycjeUwagiService::propozycjeUwagi()->count()>0)
                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('uwagiPropozycje')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-list-check"></i> Uwagi innych do moich propozycji</a>
                </div>
                @endif
            @endif
--}}
            {{--@if(Auth::user()->hasVerifiedEmail())

                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('znalezioneLista')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-box-arrow-up-right"></i> Znalezione w sieci</a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('miejscaDyskusjiLista')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-people-fill"></i> Miejsca do dyskusji</a>
                </div>
            @endif--}}

               {{-- <div class="col-sm-12 col-md-6 col-lg-4  mt-3">
                    <a href="{{route('nowyTemat')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-envelope"></i> Wiadomości</a>
                </div>--}}


           {{-- @if(!Auth::user()->hasVerifiedEmail())
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
                </div>--}}
        </div>
    </div>

    {{--<div class="collapse" id="usuwanie">
        <div class="mt-5 mb-5"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunKonto')}}" method="post">
                @csrf

                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń konto</button>


            </form>

        </div>
    </div>--}}

@endsection
