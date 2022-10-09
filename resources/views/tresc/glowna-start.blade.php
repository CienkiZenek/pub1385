@extends('szablon')
@section('title', 'Poradnik dyskutanta - strona główna')
@section('tresc')

    <div class="row">
        <div class="col-md-6 ">
            @if(isset($tematy) && $tematy->count()>0)

            <div class="card obwodkaKarty">
                <div class="card-header tlo-nav obwodkaKartyBottom" >
                    <a href="{{route('tematy')}}" class="link-secondary text-decoration-none  napis-kolor fs-5" ><i class="bi bi-file-text me-2"></i> Tematy</a>
                </div>
                <div class="card-body">
                    @foreach($tematy as $temat)
                        <p class="">
                            @if(isset($temat->haslo))
                            <a href="{{ route('hasloCale', $temat->slug) }}" class="link-dark text-decoration-none ">{{ Str::limit($temat->haslo, 30) }} </a>
                        @else
                                <a href="{{ route('zagadnienieCale', $temat->slug) }}" class="link-dark text-decoration-none ">{{ Str::limit($temat->zagadnienie, 30) }} ({{$temat->hasla->haslo}})</a>
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
            <div class="card obwodkaKarty" >
                <div class="card-header tlo-nav obwodkaKartyBottom">
                    <a href="{{route('przekazdnia')}}" class="link-secondary text-decoration-none  napis-kolor fs-5"><i class="bi bi-journal-arrow-up me-2"></i> Przekaz dnia</a>
                </div>
                <div class="card-body">
                    @foreach($przekazdnia as $przekaz)
                        <p class=""><a href="{{ route('przekazCale', $przekaz->id) }}" class="link-dark text-decoration-none ">{{$przekaz->tytul  /*Str::limit($przekaz->tytul, 30)*/ }}</a>
                        </p>
                    @endforeach
                </div>
            </div>
           {{-- @if(isset($znalezione) && $znalezione->count()>0)
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
            @endif--}}

            </div>

        </div>

    @auth
        @if(Auth::user()->hasVerifiedEmail())
    <div class="row mt-3">

        <div class="col-md-6">

            <div class="card obwodkaKarty" >
                <div class="card-header tlo-nav obwodkaKartyBottom">
                    <a href="{{route('miejsca')}}" class="link-secondary text-decoration-none napis-kolor fs-5"><i class="bi bi-chat-right-text me-2"></i>Miejsca dyskusji</a>
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
            <div class="card obwodkaKarty" >
                <div class="card-header tlo-nav obwodkaKartyBottom">
                    <a href="{{route('info')}}" class="link-secondary text-decoration-none napis-kolor fs-5"><i class="bi bi-info-square me-2"></i>Informacje</a>
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
        @if(isset($znalezione) && $znalezione->count()>0)
            <div class="card obwodkaKarty" >
                <div class="card-header tlo-nav obwodkaKartyBottom">
                    <a href="{{route('znalezione')}}" class="link-secondary text-decoration-none napis-kolor fs-5"><i class="bi bi-link-45deg me-2"></i> Znalezione w sieci</a>
                </div>

                <div class="card-body">
                    @php $dodal='<b>Dodał: </b>';
                    @endphp
                    @foreach($znalezione as $znal)
                        <p class="" data-bs-toggle="tooltip" data-bs-html="true"
                           title="{{$znal->rodzaj}}. Dodał:  {{$znal->dodal_user_nazwa}}. {{$znal->komentarz}}"


                        ><a href="{{$znal->link}}" class="link-dark text-decoration-none napis-kolor fs-6" target="_blank"

                            >{{ Str::limit($znal->nazwa, 30) }}</a>
                            </p>
                    @endforeach


                </div>
            </div>
            @endif

        </div>
        <div class="col-md-6">
            @if($komunikaty->count()>0)

                <div class="card obwodkaKarty" >
                    <div class="card-header tlo-nav obwodkaKartyBottom">
                        <a href="{{route('komunikaty')}}" class="link-secondary text-decoration-none napis-kolor fs-5"><i class="bi bi-card-list me-2"></i>Komunikaty</a>
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

    {{--  propozycje tematów -> tylko dla zweryfikowanych userów--}}
    @auth
        @if(Auth::user()->hasVerifiedEmail())

            <div class="row mt-3 mb-3 ">
                <div class="col-8 offset-2">

                            <div class="card obwodkaKarty " >
                                <div class="card-header text-center tlo-nav obwodkaKartyBottom">
                                    <a href="{{route('propozycje')}}" class="link-secondary text-decoration-none napis-kolor fs-5" style="color: #012970;"><i class="bi  bi-folder-plus me-2"></i> Zaproponowane tematy</a>
                                </div>
                                <div class="card-body">
                                    @foreach($propozycje as $propozycja)
                                        <p class=""><a href="{{ route('edycjaPropozycji', $propozycja->id) }}" class="link-dark text-decoration-none">{{ Str::limit($propozycja->tytul, 40) }}</a>
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

        <div class="card obwodkaKarty" >
            <div class="card-header text-center tlo-nav obwodkaKartyBottom">
                <a href="{{route('tagi')}}" class="link-secondary text-decoration-none napis-kolor fs-5"><i class="bi bi-body-text me-2"></i> Tagi (słowa kluczowe)</a>
            </div>
            <div class="card-body">
                @foreach($tagi as $tag)
                    <span class=""><a href="{{ route('tagCale', $tag['slug']) }}" class="@if ($loop->even) link-primary text-decoration-none @else link-secondary text-decoration-none @endif">{{ $tag['nazwa'] }}</a>
                    </span>
                @endforeach


            </div>
        </div>

    </div>


</div>
@endif

    <div class="row mt-4">

        <div class="col-lg-6 col-sm-12 mb-3">
            {!!   config('pomocnik.zrzutka1') !!}

        </div>
        <div class="col-lg-6 col-sm-12 mb-3">
            {!!   config('pomocnik.zrzutka1') !!}

        </div>

    </div>

@endsection
