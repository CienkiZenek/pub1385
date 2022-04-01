@extends('szablon')
@section('title', 'PoradnikDyskutanta: Komunikaty')
@section('tresc')

<div>Komunikaty</div>


<div class="list-group row mt-3">
    @foreach($Wyniki as $komunikat)

        <div>
            <a href="{{ route('komunikatCale', $komunikat->id) }}" class="link-dark text-decoration-none">
                {{ $komunikat->tytul }} ({{$komunikat->created_at->format('Y-m-d')}})</a>
        </div>
    @endforeach
</div>
@include('dodatki.paginacja')

@endsection