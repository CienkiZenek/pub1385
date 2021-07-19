@extends('szablon')
@section('title', 'Miejsca do dyskusji dodane przeze mnie')
@section('tresc')


    <div class="row mt-2 mb-3">

        {{--<div class="col-6">
            <form action="{{route('searchTagi')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>--}}
        <div class="col-6">
            <a href="{{route('noweMiejscaDyskusj')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe miejsce do dyskusji</a>
        </div>
    </div>

    <p class="badge bg-secondary fs-5">
        Miejsca do dyskusji dodane przeze mnie:
    </p>

    <div class="list-group row mt-3">
    @foreach($Wyniki as $miejsce)
            <p class="col-12" data-bs-toggle="tooltip" data-bs-html="true"
               title="{{$miejsce->rodzaj}}. Dodał:  {{$miejsce->dodal_user_nazwa}}. {{$miejsce->opis}}"


            ><a href="{{$miejsce->link}}" class="link-dark" target="_blank"

                >{{ $miejsce->tytul }}</a> ({{$miejsce->rodzaj}}, Dodane: {{$miejsce->created_at->format('y-m-d H:i')}})
            </p>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
