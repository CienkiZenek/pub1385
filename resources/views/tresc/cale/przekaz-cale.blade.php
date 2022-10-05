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


        <div class="col-12 fs-3">{{$przekaz->tytul}}</div>

    </div>
    <div class="row mb-2">

<div class="col-lg-8 col-md-6 col-sm-12">
        <div class="mt-2 mb-2 fs-5">{!!  $przekaz->naglowek!!}</div>
        <div class="mb-2">
            <p class="akapit">
                {!! Str::replace("\n","</p><p class='akapit'>",$przekaz->tresc)!!}

            </p>
            {{--{{$przekaz->tresc}}--}}

        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">

        @if(Str::length($przekaz->ramka1)>2)
        <div class=" tlo-szare3 rounded-1 p-1 border border-secondary">{{$przekaz->ramka1}}</div>
        @endif
            @if(Str::length($przekaz->ramka2)>2)
        <div class="tlo-szare3 rounded-1 p-1 border border-secondary mt-3">{{$przekaz->ramka2}}</div>
            @endif

    </div>
    </div>
    <div class="row mt-3">


        <div class="col-12">{{$przekaz->dodal_user_nazwa}}</div>


    </div>
    <div class="row mt-3">

        <div class="col-12"><a href="{{$przekaz->link}}" target="_blank" class="link-primary">{{$przekaz->link_tresc}}</a></div>


    </div>

@endsection
