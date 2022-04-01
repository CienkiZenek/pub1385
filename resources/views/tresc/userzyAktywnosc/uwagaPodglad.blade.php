@extends('szablon')
@section('title', 'PoradnikDyskutanta: Uwagi do propozycji tematu')
@section('tresc')



    <div class="row mt-5">
        <div class="col-12 text-center fs-5">
            Uwaga do propozycji tematu:  <a href="{{route('edycjaPropozycji', $uwaga->propozycja->id)}}">{{Str::limit($uwaga->propozycja->tytul, 40)}}</a>
        </div>
        {{-- <div>{{$propozycja->moznaEdytowac()}}</div>
         <div>{{$propozycja->created_at}}</div>
         <div>{{\Carbon\Carbon::now()}}</div>--}}

        <div class="col-12 mt-3">
            {{$uwaga->naglowek}}
        </div>
        <div class="col-12 mt-3">
            {{$uwaga->tresc}}
        </div>

        <div class="col-12 mt-3">
            Opublikowane: {{$uwaga->created_at->format('d-m-Y H:i')}} przez: {{$uwaga->user->name}}
        </div>
        {{-- Nie wyświetla przycisku poczty, gdy autorem jest aktualnie zalogowany user czyli nie wysyła listyu do samego siebie--}}
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