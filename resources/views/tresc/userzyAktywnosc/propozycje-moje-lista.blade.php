@extends('szablon')
@section('title', 'Lista proponowanych tematów')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista proponowanych tematów:
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchListaMoichTematow')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary ms-3" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>


    </div>


    <div class="list-group row mt-3">
    @foreach($Wyniki as $propozycja)
            <div class="col-10 size20"> <a href="{{ route('edycjaPropozycji', $propozycja->id) }}" class="list-group-item list-group-item-action">{{ Str::limit($propozycja->tytul, 30) }}   </a>
            </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
