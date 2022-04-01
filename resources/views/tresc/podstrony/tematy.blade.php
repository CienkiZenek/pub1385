@extends('szablon')
@section('title', 'PoradnikDyskutanta: Hasła')
@section('tresc')

    <div class="row mt-4 mb-5">

        <div class="col-lg-6 col-md-12 fs-5 ">
            Lista tematów:
        </div>
        <div class="col-lg-6 col-md-12">

            @auth
                @if(Auth::user()->hasVerifiedEmail())
                    <a href="{{route('nowyTemat')}}" class="btn btn-primary me-2" role="button" aria-pressed="true">
                        <i class="bi bi-file-earmark-text"></i> Zaproponuj nowy temat</a>
                @endif
            @endauth
        </div>
    </div>

            <div class="list-group row ">
                    @foreach($Wyniki as $haslo)
                        <div class="mt-2 col-12"><a href="{{ route('hasloCale', $haslo->slug) }}" class="link-dark">{{ $haslo->haslo }}
                            </a>
                        </div>
                        @foreach($haslo->zagadnieniaAktywne as $zagadnienie)
                        <div class="ms-5 col-12">

                            <a href="{{ route('zagadnienieCale', $zagadnienie->slug) }}" class="link-dark">{{$zagadnienie->zagadnienie}}
                            </a>

                        </div>

                        @endforeach

                    @endforeach


                </div>


        </div>







   {{-- @include('Dodatki.paginacja')--}}

@endsection