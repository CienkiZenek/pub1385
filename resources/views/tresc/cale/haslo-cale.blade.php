@extends('szablon')
@section('title', 'Hasło: '.$haslo -> haslo)
@section('tresc')

    {{-- dane Open Graph dla facebooka--}}
@section('og_url', Request::url())
@section('og_type', 'article')
@section('og_title', 'Poradnik dyskutant - '.$haslo -> haslo)
@if(Str::length($haslo -> tresc)>10)
@section('og_description', Str::limit($haslo -> tresc, 45))
@else()
    @section('og_description', 'Poradnik Dyskutanta - pomaga w znalezieniu argumantów podczas interentowej dyskusji')
    @endif()

{{-- facebook SDK --}}
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v11.0"
        nonce="djYMT9ht"></script>
{{-- Koniec facebook SDK --}}
{{-- Twitter js --}}
<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>




<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb fs-6 mb-4">
            <li class="breadcrumb-item"><a href="{{route('dzial', $haslo->dzialy->slug)}}">{{$haslo -> dzialy->dzial}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('kategoria', $haslo->kategorie->slug)}}">{{$haslo ->kategorie->kategoria}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$haslo -> haslo}}</li>
        </ol>
    </nav>
    <div class="row">

        <div class="fs-4 mb-3">{{ $haslo -> haslo}}</div>

        {{-- Twitowanie tylko zaznaczonego fragmentu - button twittera wszystko przebija,
         a display:none uniemożliwia załodwanie widgetu...  --}}
        {{--<div id="tw_zazn" class="fs-6 mb-2 align-text-top" style="opacity:0; ">Opublikuj zazanczony fragment:
            <a class="twitter-share-button"
               href="https://twitter.com/intent/tweet"
               data-size="large"
               data-lang="pl"
               data-text=""
               data-url="{{Request::url()}}"
            >
                Tweet
            </a>
        </div>--}}


        <div id="tresc" class="mb-2 fs-6 col-lg-9 col-md-12" style="text-indent: 1em">
            <p class="akapit">
            {!! Str::replace("\n","</p><p class='akapit'>",$haslo -> tresc) !!}

            {{-- nl2br($haslo -> tresc) --}}
            </p>
            <div id="dodaj" style="color: white; font-size: 1px"> ({{Request::url()}})</div>
        </div>


        <div class="d-flex mt-4 mb-4">
            {{-- Twitter share button--}}
            <a class="twitter-share-button"
               href="https://twitter.com/intent/tweet"
               data-size="large"
               data-lang="pl"
               data-text="{{Str::limit(strip_tags($haslo->tresc), 2900)}}"
               data-url="{{Request::url()}}"
            >
                Tweet
            </a>
            {{-- Facebook share button--}}
            <div class="fb-share-button ms-2"
                 data-href="{{Request::url()}}"
                 data-layout="button"
                 size="large">
            </div>

            {{-- Facebook like button--}}
            <div class="fb-like ms-2" data-href="{{Request::url()}}"
                 data-width="" data-layout="standard" data-action="like"
                 data-size="large" data-share="false"></div>
        </div>




        <div class=" fs-6">

            Kopiuj całe hasło: <i class="bi bi-clipboard fs-3" onClick="kopiujCalaTresc()" id="wszystko" title="Zaznacz wszystko"></i>
            <div id="komunikatKopiowanie"></div>
        </div>

        {{-- Postęp hasła--}}
        @include('dodatki.progresBar', ['tresc'=>'hasła', 'procent'=>$haslo->procent_tresci])

        @if($haslo->zagadnienia->count()>0)
            <div class="row mt-5 mb-3 fs-5">
                <div>
                    Zagadnienia wchodzące w skład tego hasła:
                </div>

                @foreach($haslo->zagadnienia as $zagadnienie)
                    <div class="ms-2 mt-2 fs-6">

                        <a href="{{ route('zagadnienieCale', $zagadnienie->slug) }}" class="link-dark">{{$zagadnienie->zagadnienie}}
                        </a>

                    </div>

                @endforeach
            </div>
        @endif

        @if(Str::length($haslo->linkSlownikPdf)>2)


        <div class="mt-3  fs-6"><a href="https://slownik1894.poradnikdyskutanta.pl/slownik_pdf/{{$haslo ->linkSlownikPdf}}" target="_blank">Hasło w słowniku 1894 (pdf)</a></div>
        @endif



        @if($haslo->bibliografia->count()>0)
        <div class="mt-3 fs-6">Bibliografia</div>
        <div class="">

            @foreach($haslo->bibliografia as $bibl)
                <div class="ms-2 mt-2 fs-6">

                    {{$bibl->tresc}}
                </div>

            @endforeach
        </div>
        @endif
        @if($haslo->linki->count()>0)
        <div class="mt-3 fs-6">Linki:</div>
        <div>

            @foreach($haslo->linki as $link)
                <div class="ms-2 mt-2 fs-6">

                    <a href="{{$link->link}}" target="_blank" class="link-dark">{{$link->tresc}}</a>

                </div>

            @endforeach

        </div>
        @endif
        @if($haslo->pliki->count()>0)
        <div class="mt-3 fs-6">Pliki:</div>
        <div>
            @foreach($haslo->pliki as $plik)
                <div class="ms-2 mt-2 fs-6">

                    <a href=" {{$plik->urlplik}}" target="_blank" class="link-dark">{{$plik->plik_nazwa}}</a>


                </div>

            @endforeach
        </div>
        @endif

            @if($haslo->tagi->count()>0)
        <div class="mt-3 fs-6">Tagi</div>
    <div>
        @foreach($haslo->tagi as $tag)
            <div class="ms-2 mt-2 fs-6">
                <a href="{{ route('tagCale', $tag['id']) }}" class="link-dark">{{$tag->nazwa}}</a>
            </div>
        @endforeach
    </div>
        @endif


    </div>






    {{--@if($haslo->zagadnienia->count()>0)
    <div class="row mt-3 fs-6">
        <div>
            Zagadnienia wchodzące w skład tego hasła:
        </div>

        @foreach($haslo->zagadnienia as $zagadnienie)
            <div class="ms-2 mt-2 fs-6">

                <a href="{{ route('zagadnienieCale', $zagadnienie->slug) }}" class="link-dark">{{$zagadnienie->zagadnienie}}
                </a>

            </div>

        @endforeach
    </div>
@endif--}}

<div class="mt-3 fs-6">Ostatnia modyfikacja: {{$haslo->created_at->format('Y-m-d')}}</div>


    @auth
        @if($haslo->uwagi->count()>0)
        <div class="mb-3 mt-3 fs-6">
            <div>Uwagi do tego hasła:</div>
            @foreach($haslo->uwagi as $uwaga)
                <div class="ms-2 mt-2 fs-6">

                    <a href="{{ route('uwagaTematPodglad', $uwaga->id) }}" class="link-dark">{{Str::limit($uwaga->naglowek, 50) }}
                    </a>

                </div>

            @endforeach
        </div>
@endif
        @if(Auth::user()->mozeKomentowac())
            <div class=" fs-6 mt-5">Moja nowa uwaga do tego hasła:</div>

            <form action="{{route('uwagiZapisNowe')}}" method="POST">
                @csrf
                <input type="text" hidden name="do" value="haslo">
                <input type="text" hidden name="haslo_id" value="{{$haslo ->id}}">
                <input type="text" hidden name="slug" value="{{$haslo ->slug}}">
                <div class="row mt-3 fs-6">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text  fs-6" >Naglowek:</span>
                            </div>
                            <textarea class=" fs-6 form-control{{ $errors->has('naglowek') ? ' is-invalid' : '' }}"
                                      name="naglowek" id="naglowek" rows="2">
                        {{ old('naglowek') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text fs-6" >Tresc:</span>
                            </div>
                            <textarea class=" fs-6 form-control{{ $errors->has('tresc') ? ' is-invalid' : '' }}"
                                      name="tresc" id="tresc" rows="8">
                        {{ old('tresc') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row mb-5 mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary fs-6">Zapisz</button>
                    </div>

                </div>


            </form>
        @endif
    @endauth
    <script src="{{ URL::asset('/js/kopiowanie.js')}}"></script>
@endsection
