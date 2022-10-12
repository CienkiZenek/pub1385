@extends('szablon')
@section('title', 'Moje uwagi do tematów i propozycji ')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Moje uwagi do opublikowanych zagadnień i haseł oraz tematów zaproponowanych przez innych:
    </p>
    <div>Do haseł: {{$doHasel->count()}}</div>
<div>Do zagadnień: {{$doZagadnien->count()}}</div>
<div>Do propozycji:  {{$doPropozycji->count()}}</div>
<div>Razem uwag:  {{$Wyniki->count()}}</div>

    <div class="list-group row mt-3">
    @foreach($Wyniki as $uwaga)
            @if(isset($uwaga->haslo_id))
                <div class="col-10 size20"> <a href="{{ route('uwagaTematPodglad', $uwaga->id) }}" class="list-group-item list-group-item-action">
                        {{ Str::limit($uwaga->naglowek, 30) }} (do hasla) </a>
                </div>
            @endif
        @if(isset($uwaga->zagadnienie_id))
            <div class="col-10 size20"> <a href="{{ route('uwagaTematPodglad', $uwaga->id) }}" class="list-group-item list-group-item-action">
                    {{ Str::limit($uwaga->naglowek, 30) }} (do zagadnienia) </a>
            </div>
            @endif

            @if(isset($uwaga->propozycja_id))
                <div class="col-10 size20"> <a href="{{ route('uwagaPodglad', $uwaga->id) }}" class="list-group-item list-group-item-action">
                        {{ Str::limit($uwaga->naglowek, 30) }} (do propozycji) </a>
                </div>
            @endif
    @endforeach
    </div>
   {{-- @include('Dodatki.paginacja')--}}
@endsection
