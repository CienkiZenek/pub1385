@extends('szablon')
@section('title', 'PoradnikDyskutanta: Informacje')
@section('tresc')



<div class="row mt-4 mb-5 border-bottom">

    <div class="col-lg-6 col-md-12 fs-5 ">
        <h4 class="pb-3 ">Informacje dla użytkowników serwisu</h4>
    </div>
</div>

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
