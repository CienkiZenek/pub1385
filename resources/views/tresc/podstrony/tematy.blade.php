@extends('szablon')
@section('title', 'PoradnikDyskutanta: Hasła')
@section('tresc')

    <div class="row mt-4 mb-5 border-bottom">

        <div class="col-lg-6 col-md-12 fs-5 ">
            <h4 class="pb-3 ">Lista tematów do dyskusji:</h4>
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


            <div class="list-group row">
                <div class="row">
                @foreach($Wyniki->chunk(3) as $porcja)

                        @foreach($porcja as $haslo)

                            <div class="col-md-6 col-sm-12 col-lg-4 mb-3">

                                <div class="feature-icon bg-primary bg-gradient mt-4">
                                    <svg class="bi" width="1em" height="1em" ><use xlink:href="#{{\App\Services\Ikony::ikonaStala($haslo->haslo)}}"></use></svg>
                                </div>

                                <h4><a href="{{ route('hasloCale', $haslo->slug) }}" class="link-dark text-decoration-none">{{ $haslo->haslo }}</a></h4>

                                <a href="{{ route('hasloCale', $haslo->slug) }}" class="link-dark text-decoration-none ">{{ Str::limit($haslo->tresc, 50) }}</a>


                                @foreach($haslo->zagadnieniaAktywne as $zagadnienie)
                                <div class="mt-2 ">

                                                           <a href="{{ route('zagadnienieCale', $zagadnienie->slug) }}" class="link-dark icon-link text-decoration-none">
                                                               <svg class="bi" width="1em" height="1em" ><use xlink:href="#Arrow_right_square"></use></svg>
                                                               {{$zagadnienie->zagadnienie}}
                                                            </a>

                                                        </div>

                                                       @endforeach


                                                            </div>



                                                        @endforeach


                                                @endforeach
                                            </div>
                                            </div>

   {{-- @include('Dodatki.paginacja')--}}

@endsection
