@extends('szablon')
@section('title', 'PoradnikDyskutanta: Tagi')
@section('tresc')

<div>Tagi - słowa kluczowe</div>


<div class="list-group row mt-3">
    @foreach($Wyniki as $tag)

        <p class="col-12" ><a href="{{route('tagCale', $tag->slug)}}" class="link-dark">{{ $tag->nazwa }}</a>
        </p>
    @endforeach
</div>
@include('dodatki.paginacja')


@endsection