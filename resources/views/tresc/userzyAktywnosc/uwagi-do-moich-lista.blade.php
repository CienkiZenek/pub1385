@extends('szablon')
@section('title', 'Uwagi do moich tematów')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Uwagi do propozycji moich tematów:
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchUwagiPropozycje')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary ms-3" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>


    </div>


    <div class="list-group row mt-3">
    @foreach($Wyniki as $uwaga)
            <div class="col-10 size20"> <a href="{{ route('uwagaPodglad', $uwaga->id) }}" class="list-group-item list-group-item-action">
                    {{ Str::limit($uwaga->naglowek, 30) }} (do: {{Str::limit($uwaga->propozycja->tytul, 20)}} )
                </a>
            </div>
    @endforeach
    </div>
   {{-- @include('Dodatki.paginacja')--}}
@endsection
