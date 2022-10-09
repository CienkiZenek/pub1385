@extends('szablon')
@section('title', 'PoradnikDyskutanta: Tagi')
@section('tresc')


<div class="row mt-4 mb-5 border-bottom">

    <div class="col-lg-6 col-md-12 fs-5 ">
        <h4 class="pb-3 ">Tagi - słowa kluczowe</h4>
    </div>
</div>

<div class="list-group row mt-3">
    @foreach($Wyniki as $tag)

        <p class="col-12" ><a href="{{route('tagCale', $tag->slug)}}" class="link-dark">{{ $tag->nazwa }}</a>
        </p>
    @endforeach
</div>
@include('dodatki.paginacja')


@endsection
