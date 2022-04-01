@extends('szablon')
@section('title', 'Komunikat: '.$komunikat->tytul)
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>


    <div class="row text-center fs-4">


        <div class="col-12 ">{{$komunikat->tytul}}</div>

    </div>
    <div class="row mb-2">


        <div class="mt-2 mb-2">{{$komunikat->naglowek}}</div>
        <div class="mb-2">{{$komunikat->tresc}}</div>

    </div>
    <div class="row">


        <div>{{$komunikat->user->name}} ({{$komunikat->created_at->format('Y-m-d')}})</div>


    </div>
@endsection