@extends('szablon')
@section('title', 'Szukane: '.$szukane )
@section('tresc')


    <div class="fs-5 text-center mb-3">
        Wyszukiwanie: <span class="fw-bold">{{$szukane}}</span>

    </div>

    <div class="row mb-5">

        @if($hasla->count()>0)
        <div class="col-lg-4 col-md-6 col-sm-12">
    @livewire('wyszukane-hasla', ['szukane'=>$szukane])
        </div>
        @endif

            @if($zagadnienia->count()>0)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-md-1 mt-sm-1">
                    @livewire('wyszukane-zagadnienia', ['szukane'=>$szukane])
                </div>
            @endif

            @if($znalezione->count()>0)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    @livewire('wyszukane-znalezione', ['szukane'=>$szukane])
                </div>
            @endif

            @if($komunikaty->count()>0)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    @livewire('wyszukane-komunikaty', ['szukane'=>$szukane])
                </div>
            @endif

            {{--@if($memy->count()>0)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    @livewire('wyszukane-memy', ['szukane'=>$szukane])
                </div>
            @endif--}}

            @if($tagi->count()>0)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    @livewire('wyszukane-tagi', ['szukane'=>$szukane])
                </div>
            @endif








{{-- Tylko dla zalogowanych i zweryfikowanych--}}
            @auth
                @if(Auth::user()->hasVerifiedEmail())
            @if($przekazdnia->count()>0)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-md-1 mt-sm-1">

                    @livewire('wyszukane-przekazdnia', ['szukane'=>$szukane])
                </div>
            @endif


            @if($miejsca->count()>0)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-md-1 mt-sm-1">
        @livewire('wyszukane-miejsca', ['szukane'=>$szukane])
            </div>
            @endif

                @if($info->count()>0)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @livewire('wyszukane-info', ['szukane'=>$szukane])
                    </div>

                @endif

                @if($propozycje->count()>0)

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @livewire('wyszukane-propozycje', ['szukane'=>$szukane])
                    </div>

                @endif

                {{--@if($zagadnienia_uwagi->count()>0)

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @livewire('wyszukane-zagadnienia-uwagi', ['szukane'=>$szukane])
                    </div>

                @endif--}}


                {{--@if($propozycje_uwagi->count()>0)

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @livewire('wyszukane-propozycje-uwagi', ['szukane'=>$szukane])
                    </div>

                @endif--}}

                @endif
            @endauth

            {{-- Koniec dla zalogowanych i zweryfikowanych--}}


    </div>

@endsection