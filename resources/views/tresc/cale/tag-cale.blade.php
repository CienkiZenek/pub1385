@extends('szablon')
@section('title', 'Tag: '.$tag->nazwa)
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>
    <div class="row">

        <div class="col-8">

<div class="fw-bold">{{$tag->nazwa}}</div>

            @if($tag->hasla->count()>0)

            <div class=" mt-4 mb-2 fs-5">Hasła odnoszące się do tego tagu:</div>

            @foreach($tag->hasla as $haslo)

                <div class="col-12 mb-1 fs-5" ><a href="{{route('hasloCale', $haslo->slug)}}" class="link-dark">{{ $haslo->haslo }}</a>
                </div>
            @endforeach
            @endif
            @if($tag->zagadnienia->count()>0)

            <div class="mt-4 mb-2 fs-5">Zagadnienia odnoszące się do tego tagu:</div>

            @foreach($tag->zagadnienia as $zagadnienie)

                <div class="col-12 mb-1 fs-5" ><a href="{{route('zagadnienieCale', $zagadnienie->slug)}}" class="link-dark">{{ $zagadnienie->zagadnienie }} ({{$zagadnienie->hasla->haslo}})</a>
                </div>
            @endforeach
            @endif



        </div>

    </div>

@endsection