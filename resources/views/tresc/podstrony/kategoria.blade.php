@extends('szablon')
@section('title', 'Kategoria: '.$kategoria->kategoria)
@section('tresc')

<div>Kategoria: {{$kategoria->kategoria}}. Hasła w tej kategorii:</div>


@foreach($kategoria->hasla as $haslo)
    <div class="list-group row mt-3">
        <a href="{{ route('hasloCale', $haslo->slug) }}" class="link-dark">{{$haslo->haslo}}
        </a>

    </div>
@endforeach

@endsection