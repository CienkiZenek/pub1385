@extends('szablon')
@section('title', 'PoradnikDyskutanta: Informacje')
@section('tresc')

<div>Informacje dla użytkowników serwisu</div>


<div class="list-group row mt-3">
    @foreach($Wyniki as $info)

        <div>
            <a href="{{ route('infoCale', $info->id) }}" class="link-dark text-decoration-none">
                {{ $info->tytul }} ({{$info->created_at->format('Y-m-d')}})</a>
        </div>
    @endforeach
</div>
@include('dodatki.paginacja')
@endsection