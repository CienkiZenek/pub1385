@extends('szablon')
@section('title', 'PoradnikDyskutanta: Znalezione w sieci')
@section('tresc')

<div class="row mt-4 mb-5 border-bottom">

    <div class="col-lg-6 col-md-12 fs-5 ">
        <h4 class="pb-3 ">Znalezione w sieci:</h4>
    </div>

    <div class="col-lg-6 col-md-12">

        @auth
            @if(Auth::user()->hasVerifiedEmail())
                <a href="{{route('noweZnalezione')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe "Znalezione w sieci"</a>
            @endif
        @endauth
    </div>
</div>





<div class="list-group row mb-6-">
    <div class="row ">
        @foreach($Wyniki->chunk(3) as $porcja)

            @foreach($porcja as $znal)

                <div class="col-md-6 col-sm-12 col-lg-4 mb-0" data-bs-toggle="tooltip" data-bs-html="true"
                     title="{{$znal->rodzaj}}">

                    <div class=" mt-1">
                        @include('dodatki.znalezioneIkony', ['rodzaj'=>$znal->rodzaj])
                    </div>



                    <h6><a href="{{$znal->link}}" class="link-dark text-decoration-none" target="_blank">{{ $znal->nazwa }}</a> (Dodane: {{$znal->created_at->format('y-m-d H:i')}})</h6>

                </div>

            @endforeach


        @endforeach
    </div>
</div>

{{--<div class="list-group row mt-3">--}}
{{--    @foreach($Wyniki as $znal)--}}
{{--        <p class="col-12" data-bs-toggle="tooltip" data-bs-html="true"--}}
{{--           title="{{$znal->rodzaj}}: {{$znal->komentarz}} (Dodał: {{$znal->dodal_user_nazwa}})"--}}
{{--        >@include('dodatki.znalezioneIkony', ['rodzaj'=>$znal->rodzaj]) <a href="{{$znal->link}}" class="link-dark text-decoration-none" target="_blank"--}}
{{--            >{{ $znal->nazwa }}</a>--}}
{{--             (Dodane: {{$znal->created_at->format('y-m-d H:i')}})--}}
{{--        </p>--}}
{{--    @endforeach--}}

</div>





@include('dodatki.paginacja')
@endsection
