@extends('szablon')
@section('title', 'PoradnikDyskutanta: Miejsca do dyskusji')
@section('tresc')

    <div class="row mt-4 mb-5">

        <div class="col-lg-6 col-md-12 fs-5 ">
            Miejsca do dyskusji w sieci:
        </div>
        <div class="col-lg-6 col-md-12">

@auth
                @if(Auth::user()->hasVerifiedEmail())
                    <a href="{{route('noweMiejscaDyskusj')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe miejsce do dyskusji</a>

                    @endif

    @endauth

        </div>
    </div>



<div class="list-group row mt-3">
    @foreach($Wyniki as $miejsce)
        <p class="col-12" data-bs-toggle="tooltip" data-bs-html="true"
           title="{{$miejsce->rodzaj}}. {{$miejsce->opis}} (Dodał:  {{$miejsce->dodal_user_nazwa}})">
            @include('dodatki.miejsceIkony', ['rodzaj'=>$miejsce->rodzaj])
            <a href="{{$miejsce->link}}" class="link-dark text-decoration-none" target="_blank"

            >{{ $miejsce->tytul }}

            </a> (Dodane: {{$miejsce->created_at->format('y-m-d H:i')}}))
        </p>
    @endforeach
</div>
@include('dodatki.paginacja')


@endsection