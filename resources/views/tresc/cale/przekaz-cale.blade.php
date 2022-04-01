@extends('szablon')
@section('title', 'Przekaz dnia: ')
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>


    <div class="row fs-5">


        <div class="col-12 ">Przekaz dnia: {{$przekaz->created_at->format('Y-m-d')}}</div>

    </div>

    <div class="row text-center fs-4">


        <div class="col-12 ">{{$przekaz->tytul}}</div>

    </div>
    <div class="row mb-2">


        <div class="mt-2 mb-2">{{$przekaz->naglowek}}</div>
        <div class="mb-2">{{$przekaz->tresc}}</div>

    </div>
    <div class="row">

        @if(Str::length($przekaz->ramka1)>2)
        <div class="col-md-5 col-sm-12 tlo-szare3 rounded-1 p-1 border border-secondary">{{$przekaz->ramka1}}</div>
        @endif
            @if(Str::length($przekaz->ramka2)>2)
        <div class="col-md-5 col-sm-12 tlo-szare3 ms-3 p-1 border border-secondary">{{$przekaz->ramka2}}</div>
            @endif

    </div>

    <div class="row mt-3">


        <div class="col-12">{{$przekaz->user->name}}</div>


    </div>
@endsection