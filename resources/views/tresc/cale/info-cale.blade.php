@extends('szablon')
@section('title', 'Info: '.$info->tytul)
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>

    <div class="row text-center fs-4">


        <div class="col-12 ">{{$info->tytul}}</div>

    </div>
    <div class="row mb-2">


        <div class="mt-2 mb-2">{{$info->naglowek}}</div>
        <div class="mb-2">{{$info->tresc}}</div>

    </div>
    <div class="row">


        <div>{{$info->user->name}} ({{$info->created_at->format('Y-m-d')}})</div>


    </div>

@endsection