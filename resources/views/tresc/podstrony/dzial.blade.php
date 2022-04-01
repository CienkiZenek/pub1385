@extends('szablon')
@section('title', 'Dział: '.$dzial->dzial)
@section('tresc')

<div>Dział: {{$dzial->dzial}}. Kategorie w tym dziale:</div>



@foreach($dzial->kategorie as $kategoria)
<div class="list-group row mt-3">
    <a href="{{ route('kategoria', $kategoria->slug) }}" class="link-dark">{{$kategoria->kategoria}}
    </a>

</div>
@endforeach


@endsection