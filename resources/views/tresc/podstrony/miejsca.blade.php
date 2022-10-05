@extends('szablon')
@section('title', 'PoradnikDyskutanta: Miejsca do dyskusji')
@section('tresc')


    <div class="row mt-4 mb-5 border-bottom">

        <div class="col-lg-6 col-md-12 fs-5 ">
            <h4 class="pb-3 ">Miejsca do dyskusji w sieci:</h4>
        </div>

        <div class="col-lg-6 col-md-12">

            @auth
                @if(Auth::user()->hasVerifiedEmail())
                    <a href="{{route('noweMiejscaDyskusj')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe miejsce do dyskusji</a>

                @endif

            @endauth
        </div>
    </div>

<!--    -->


    <div class="list-group row mb-8-">
        <div class="row ">
            @foreach($Wyniki->chunk(3) as $porcja)

                @foreach($porcja as $miejsce)

                    <div class="col-md-6 col-sm-12 col-lg-4 mb-0" data-bs-toggle="tooltip" data-bs-html="true"
                         title="{{$miejsce->rodzaj}}. {{$miejsce->opis}} (Dodane przez:  {{$miejsce->dodal_user_nazwa}})">

                        <div class=" mt-1">
                            @include('dodatki.miejsceIkony', ['rodzaj'=>$miejsce->rodzaj])
                        </div>



                        <h6><a href="{{$miejsce->link}}" class="link-dark text-decoration-none" target="_blank">{{ $miejsce->tytul }}</a> (Dodane: {{$miejsce->created_at->format('y-m-d H:i')}})</h6>

                    </div>

                @endforeach


            @endforeach
        </div>
    </div>



@include('dodatki.paginacja')


@endsection
