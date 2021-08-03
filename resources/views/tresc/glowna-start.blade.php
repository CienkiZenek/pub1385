@extends('szablon')
@section('title', 'Poradnik dyskutanta - strona główna')
@section('tresc')

    <div class="row">
        <div class="col-md-6 ">
            @if(isset($tematy) && $tematy->count()>0)
            <div class="card">
                <div class="card-header">
                    <a href="{{route('tematy')}}" class="link-secondary">Tematy</a>
                </div>
                <div class="card-body">
                    @foreach($tematy as $temat)
                        <p class="">
                            @if(isset($temat->haslo))
                            <a href="{{ route('hasloCale', $temat->slug) }}" class="link-dark text-decoration-none">{{ Str::limit($temat->haslo, 30) }} (Hasło)</a>
                        @else
                                <a href="{{ route('zagadnienieCale', $temat->slug) }}" class="link-dark text-decoration-none">{{ Str::limit($temat->zagadnienie, 30) }} (Zagadnienie)</a>
                            @endif

                        </p>
                    @endforeach
{{-- <a href="{{ route('hasloCale', $haslo->id) }}" class="link-dark">{{ $haslo->haslo }}
                        </a>--}}

                </div>

            </div>
            @endif


        </div>
        <div class="col-md-6">
            @if(isset($znalezione) && $znalezione->count()>0)
            <div class="card " >
                <div class="card-header">
                    <a href="{{route('znalezione')}}" class="link-secondary">Znalezione w sieci</a>
                </div>

                <div class="card-body">
                    @php $dodal='<b>Dodał: </b>';
                    @endphp
                    @foreach($znalezione as $znal)
                        <p class="" data-bs-toggle="tooltip" data-bs-html="true"
                           title="{{$znal->rodzaj}}. Dodał:  {{$znal->dodal_user_nazwa}}. {{$znal->komentarz}}"


                        ><a href="{{$znal->link}}" class="link-dark text-decoration-none" target="_blank"

                            >{{ Str::limit($znal->nazwa, 30) }}</a>
                            </p>
                    @endforeach


                </div>
            </div>
            @endif
            </div>

        </div>

    @auth
        @if(Auth::user()->hasVerifiedEmail())
    <div class="row mt-3">

        <div class="col-md-6">

            <div class="card ">
                <div class="card-header">
                    <a href="{{route('miejsca')}}" class="link-secondary">Miejsca dyskusji</a>
                </div>
                <div class="card-body">
                    @foreach($miejsca as $miejsce)

                        <p class=""
                           data-bs-toggle="tooltip" data-bs-html="true"
                           title="{{$miejsce->rodzaj}}. Dodał:  {{$miejsce->dodal_user_nazwa}}. {{$miejsce->opis}}"
                        >

                            <a href="{{$miejsce->link}}" class="link-dark text-decoration-none" target="_blank"

                            >{{ Str::limit($miejsce->tytul, 30) }}</a>
                        </p>
                    @endforeach


                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <a href="{{route('info')}}" class="link-secondary">Informacje</a>
                </div>
                <div class="card-body">
                    @foreach($infa as $info)
                        <p class=""><a href="{{ route('infoCale', $info->id) }}" class="link-dark text-decoration-none">{{ Str::limit($info->tytul, 30) }}</a>
                        </p>
                    @endforeach


                </div>
            </div>

        </div>

    </div>
        @endif
    @endauth

    <div class="row mt-3">

        <div class="col-md-6">
            @if($komunikaty->count()>0)

                <div class="card ">
                    <div class="card-header">
                        <a href="{{route('komunikaty')}}" class="link-secondary">Komunikaty</a>
                    </div>
                    <div class="card-body">
                        @foreach($komunikaty as $komunikat)


                            <div class=" mt-3">


                                {{$komunikat->tytul.' ('.$komunikat->created_at->format('d-m-Y').')'}}
                            </div>
                            <div class=" mt-3">
                                {{$komunikat->naglowek}}
                                @if(Str::length($komunikat->tresc)>5)
                                    <a href="{{ route('komunikatCale', $komunikat->id) }}" class="link-dark"><i class="bi bi-arrow-right"></i></a>
                                @endif


                            </div>

                        @endforeach


                    </div>
                </div>




            @endif

        </div>


        </div>

    {{-- Przekaz dnia i propozycje tematów -> tylko dla zweryfikowanych userów--}}
    @auth
        @if(Auth::user()->hasVerifiedEmail())
    <div class="row mt-3">
        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header">
                                    <a href="{{route('propozycje')}}" class="link-secondary">Propozycje tematów</a>
                                </div>
                                <div class="card-body">
                                    @foreach($propozycje as $propozycja)
                                        <p class=""><a href="{{ route('edycjaPropozycji', $propozycja->id) }}" class="link-dark text-decoration-none">{{ Str::limit($propozycja->tytul, 40) }}</a>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header">
                            <a href="{{route('przekazdnia')}}" class="link-secondary">Przekaz dnia</a>
                        </div>
                        <div class="card-body">
                            @foreach($przekazdnia as $przekaz)
                                <p class=""><a href="{{ route('przekazCale', $przekaz->id) }}" class="link-dark text-decoration-none">{{ Str::limit($przekaz->tytul, 30) }}</a>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
    </div>
        @endif
    @endauth

    @if(isset($tagi) && count($tagi)>0)
<div class="row mt-3 mb-3 ">
    <div class="col-8 offset-2">

        <div class="card ">
            <div class="card-header text-center">
                <a href="{{route('tagi')}}" class="link-secondary">Tagi (słowa kluczowe)</a>
            </div>
            <div class="card-body">
                @foreach($tagi as $tag)
                    <span class=""><a href="{{ route('tagCale', $tag['id']) }}" class="@if ($loop->even) link-primary text-decoration-none @else link-secondary text-decoration-none @endif">{{ $tag['nazwa'] }}</a>
                    </span>
                @endforeach


            </div>
        </div>

    </div>


</div>
@endif

    {{--<div class="row mt-4">
        <div class="col-12 mb-3">
            <button type="button" class="btn btn-success" onclick="location.href='{{ route('wsparcie') }}'">
                Wesprzyj serwis! <span class="badge bg-danger">zrzutka 1</span>
            </button>
        </div>
        <div class="col-12 mb-3">
            <button type="button" class="btn btn-success" onclick="location.href='{{ route('wsparcie') }}'">
                Wesprzyj serwis! <span class="badge bg-danger">zrzutka 2</span>
            </button>
        </div>
        <div class="col-12 mb-3">
            <button type="button" class="btn btn-success" onclick="location.href='{{ route('wsparcie') }}'">
                Wesprzyj serwis! <span class="badge bg-danger">zrzutka 3</span>
            </button>
        </div>
    </div>--}}
    
@endsection
