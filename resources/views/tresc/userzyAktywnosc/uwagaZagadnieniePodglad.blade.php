@extends('szablon')
@section('title', 'PoradnikDyskutanta: Uwagi do tematu')
@section('tresc')



    <div class="row mt-5">
        <div class="col-12 text-center fs-5">
            Uwaga do tematu:

            @if($uwaga->do==='zagadnienie')

<a href="{{route('zagadnienieCale', $uwaga->zagadnienie->slug)}}">{{Str::limit($uwaga->zagadnienie->zagadnienie, 40)}}</a>


            @else

                <a href="{{route('hasloCale', $uwaga->haslo->slug)}}">{{Str::limit($uwaga->haslo->haslo, 40)}}</a>

@endif
    </div>
        <div class="col-12 mt-3">
            {{$uwaga->naglowek}}
        </div>
        <div class="col-12 mt-3">
            {{$uwaga->tresc}}
        </div>

        <div class="col-12 mt-3">
            Opublikowane: {{$uwaga->created_at->format('d-m-Y H:i')}} przez: {{$uwaga->user->name}}
        </div>
        {{-- Nie wyświetla przycisku poczty, gdy autorem jest aktualnie zalogowany user czyli nie wysyła lisyu do samego siebie--}}
        @if(Auth::user()->id!==$uwaga->dodal_user)

            {{--Sprawdza czy użytkownik zgadza się otrzymywać listy od innych--}}
            @if($uwaga->user->przyjmujeListyOdInnych())

                <div class="col-12 mt-3">
                    <a href="{{route('WyslijUser', $uwaga->dodal_user)}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-envelope-open"></i> Wyślij list do autora uwagi</a>
                </div>
            @endif
        @endif
    </div>




@endsection