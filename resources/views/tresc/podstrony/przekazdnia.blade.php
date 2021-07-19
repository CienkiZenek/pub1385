@extends('szablon')
@section('title', 'PoradnikDyskutanta: Przekaz dnia')
@section('tresc')

<div>Przekaz dnia</div>



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