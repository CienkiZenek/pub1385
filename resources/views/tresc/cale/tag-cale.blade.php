@extends('szablon')
@section('title', 'Tag: ')
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>
    <div class="row">

        <div class="col-8">
            <div>{{$tag->nazwa}}</div>


            @if($tag->hasla->count()>0)

            <div class="mt-2 mb-2">Hasła odnoszące się do tego tagu:</div>

            @foreach($tag->hasla as $haslo)

                <div class="col-12 mb-1" ><a href="{{route('hasloCale', $haslo->slug)}}" class="link-dark">{{ $haslo->haslo }}</a>
                </div>
            @endforeach
            @endif
            @if($tag->zagadnienia->count()>0)

            <div class="mt-2 mb-2">Zagadnienia odnoszące się do tego tagu:</div>

            @foreach($tag->zagadnienia as $zagadnienie)

                <div class="col-12 mb-1" ><a href="{{route('zagadnienieCale', $zagadnienie->slug)}}" class="link-dark">{{ $zagadnienie->zagadnienie }}</a>
                </div>
            @endforeach
            @endif



        </div>

    </div>

@endsection