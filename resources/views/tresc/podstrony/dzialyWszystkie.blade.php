@extends('szablon')
@section('title', 'Wszystkie działy')
@section('tresc')

<div>Działy:</div>



@foreach($dzialy as $dzial)
<div class="list-group row mt-3">
    <a href="{{ route('dzial', $dzial->slug) }}" class="link-dark">{{$dzial->dzial}}
    </a>

</div>
@endforeach


@endsection