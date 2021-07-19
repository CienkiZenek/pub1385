@extends('szablon')
@section('title', 'Znalezione przeze mnie w sieci ')
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
            <a href="{{route('noweZnalezione')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe "Znalezione w sieci"</a>
        </div>
    </div>

    <p class="badge bg-secondary fs-5">
        Znalezione przeze mnie w sieci:
    </p>

    <div class="list-group row mt-3">
        @foreach($Wyniki as $znal)

            <p class="col-12" data-bs-toggle="tooltip" data-bs-html="true"
               title="{{$znal->rodzaj}}. Dodał:  {{$znal->dodal_user_nazwa}}. {{$znal->komentarz}}"


            ><a href="{{$znal->link}}" class="link-dark" target="_blank"

                >{{ $znal->nazwa }}</a> ({{$znal->rodzaj}}, Dodane: {{$znal->created_at->format('y-m-d H:i')}})
            </p>
        @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
