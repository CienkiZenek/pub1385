@extends('szablon')
@section('title', 'PoradnikDyskutanta: Przekaz dnia')
@section('tresc')


<div class="col-lg-6 col-md-12 fs-5 mb-5">
    Przekaz dnia
</div>

<div class="list-group row mt-3">
    @foreach($Wyniki as $przekaz)

       <div>
           <a href="{{ route('przekazCale', $przekaz->id) }}" class="link-dark text-decoration-none">
               {{ $przekaz->tytul }} ({{$przekaz->created_at->format('Y-m-d')}})</a>
       </div>
    @endforeach
</div>
@include('dodatki.paginacja')
@endsection