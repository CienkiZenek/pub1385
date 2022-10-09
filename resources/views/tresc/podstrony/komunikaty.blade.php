@extends('szablon')
@section('title', 'PoradnikDyskutanta: Komunikaty')
@section('tresc')



<div class="row mt-4 mb-5 border-bottom">

    <div class="col-lg-6 col-md-12 fs-5 ">
        <h4 class="pb-3 ">Komunikaty</h4>
    </div>
</div>
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
