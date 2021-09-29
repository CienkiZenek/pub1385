@extends('szablon')
@section('title', 'Moje uwagi do tematów i propozycji ')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Moje uwagi do tematów (opublikowanych i proponowanych przez innych):
    </p>
    {{--<div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchMojeUwagi')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary ms-3" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>


    </div>--}}

<div>Do zagadnień: {{$doZagadnien->count()}}</div>
<div>Do propozycji:  {{$doPropozycji->count()}}</div>
<div>Uwagi:  {{$Wyniki->count()}}</div>

    <div class="list-group row mt-3">
    @foreach($Wyniki as $uwaga)
        @if(isset($uwaga->zagadnienie_id))
            <div class="col-10 size20"> <a href="{{ route('uwagaTematPodglad', $uwaga->id) }}" class="list-group-item list-group-item-action">
                    {{ Str::limit($uwaga->naglowek, 30) }} (do tematu) </a>
            </div>
            @else
                <div class="col-10 size20"> <a href="{{ route('uwagaPodglad', $uwaga->id) }}" class="list-group-item list-group-item-action">
                        {{ Str::limit($uwaga->naglowek, 30) }} (do propozycji tematu) </a>
                </div>
            @endif
    @endforeach
    </div>
   {{-- @include('Dodatki.paginacja')--}}
@endsection
