@extends('szablon')
@section('title', 'PoradnikDyskutanta: Propozycje tematów')
@section('tresc')



<div class="row mt-4 mb-5">

    <div class="col-lg-6 col-md-12 fs-5 ">
        Propozycje tematów zgłoszone przez użytkowników
    </div>
    <div class="col-lg-6 col-md-12">

        @auth
            @if(Auth::user()->hasVerifiedEmail())
                <a href="{{route('nowyTemat')}}" class="btn btn-primary me-2" role="button" aria-pressed="true">
                    <i class="bi bi-file-earmark-text"></i> Zaproponuj nowy temat</a>

            @endif

        @endauth

    </div>
</div>

<div class="list-group row mt-3">
    @foreach($Wyniki as $propozycja)
               <p class="col-12">
        <a href="{{route('edycjaPropozycji', $propozycja->id)}}" class="link-dark">
            {{ Str::limit($propozycja->tytul, 50) }}
            </a> (Dodana: {{$propozycja->created_at->format('y-m-d')}}, przez: {{$propozycja->user->name}})
        </p>
    @endforeach
</div>
@include('dodatki.paginacja')


@endsection