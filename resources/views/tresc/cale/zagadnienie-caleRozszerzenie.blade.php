@extends('szablon')
@section('title', 'Zagadnienie: '.$zagadnienie->zagadnienie)
@section('tresc')

    {{-- dane Open Graph dla facebooka--}}
@section('og_url', Request::url())
@section('og_type', 'article')
@section('og_title', 'Poradnik dyskutant - '.$zagadnienie->zagadnienie)

{{--@section('og_description', 'Opis  '.$zagadnienie->zajawka)--}}

@if(Str::length($zagadnienie->zajawka)>10)
    @section('og_description', Str::limit($haslo -> tresc, 150))
@else()
    @section('og_description', 'Poradnik Dyskutanta - pomaga w znalezieniu argumentów podczas interentowej dyskusji')
@endif()

@if(Str::length($zagadnienie->obrazek1)>5)
@section('og_image', $zagadnienie->urlobrazek1)
@endif

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



    <nav class="tlo-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb fs-6 mb-4">
            <li class="breadcrumb-item"><a href="#">{{$zagadnienie -> dzialy->dzial}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{$zagadnienie ->kategorie->kategoria}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('hasloCale', $zagadnienie ->hasla->slug) }}">{{$zagadnienie ->hasla->haslo}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$zagadnienie->zagadnienie}}</li>
        </ol>
    </nav>
    <div class="row">
<div class=" mt-3 mb-4 col-12 fs-4" style="text-indent: 1em">
    {{ $zagadnienie->zagadnienie}} (Wersja zozszerzona)
</div>
</div>
    @include('komponenty.opublikujZaznaczone')
        <div class="mb-2 col-md-8 col-sm-12" >
           <div id="tresc" class="fs-6" style="text-indent: 1em">

               @if(Str::length($zagadnienie->w_skrocie)>5)
                   <p class=" tlo-nav">W skrócie:</p>
                   <p class="akapit fw-bold">
                       {!! Str::replace("\n","</p><p class='akapit fw-bold'>",$zagadnienie->w_skrocie)!!}
                   </p>
               @endif

                   @if(Str::length($zagadnienie->w_skrocie)>5)
                       <p class=" tlo-nav">Więcej:</p>
                   @endif
               <p class="akapit">
                   {!! Str::replace("\n","</p><p class='akapit'>",$zagadnienie->rozszerz)!!}

               </p>


               <div id="dodaj" style="color: white; font-size: 1px"> ({{Request::url()}})</div>

           </div>

            <div class="d-flex mt-2 mb-5">
                {{-- Twitter share button--}}
                <a class="twitter-share-button"
                   href="https://twitter.com/intent/tweet"
                   data-size="large"
                   data-lang="pl"
                   data-text="{{Str::limit(strip_tags($zagadnienie->rozszerz), 2900)}}"
                   data-url="{{Request::url()}}"
                >
                    Tweet
                </a>
                <div class="me-2 ms-2">
                    <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: pl_PL</script>
                    <script type="IN/Share" data-url="{{Request::url()}}"></script>
                </div>
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

    Kopiuj całe zagadnienie: <i class="bi bi-clipboard fs-2" onClick="kopiujCalaTresc()" id="wszystko" title="Skopiuj całą treść zagadnienia do schowka"></i>
            <div id="komunikatKopiowanie"></div>
</div>

            {{-- Postęp hasła--}}
            @include('dodatki.progresBar', ['tresc'=>'zagadnienia', 'procent'=>$zagadnienie->procent_tresci])


            @if(Str::length($zagadnienie->linkSlownikPdf)>2)
                <div class="mt-3 fs-6">
                    <i class="bi bi-filetype-pdf" style="font-size: x-large; color:dodgerblue;"></i>
                    <a href="https://slownik1894.poradnikdyskutanta.pl/slownik_pdf/{{$zagadnienie ->linkSlownikPdf}}" target="_blank">Hasło w słowniku 1894</a></div>
            @endif
            @if($zagadnienie->bibliografia->count()>0)
            <div class="mt-3 fs-6">Bibliografia</div>
            <div class="">

                @foreach($zagadnienie->bibliografia as $bibl)
                    <div class="ms-2 mt-2 fs-6" style="color: #0d6efd ">
                        <i class="bi bi-book" style="font-size: x-large; color:dodgerblue;"></i>
{{$bibl->tresc}}
                    </div>
                @endforeach
            </div>
            @endif

            @if($zagadnienie->linki->count()>0)
            <div class="mt-3 fs-6 ">Linki</div>
            <div>
                @foreach($zagadnienie->linki as $link)
                    <div class="ms-2 mt-2 fs-6">
                        <i class="bi bi-link-45deg" style="font-size: x-large; color:dodgerblue;"></i><a href="{{$link->link}}" target="_blank" class="link-primary">{{$link->tresc}}</a>
                    </div>
                @endforeach
            </div>
            @endif


            @if($zagadnienie->pliki->count()>0)
            <div class="mt-3 fs-6">Pliki</div>
            <div>
                @foreach($zagadnienie->pliki as $plik)
                    <div class="ms-2 mt-2 fs-6">
                        <i class="bi bi-file-earmark-arrow-down" style="font-size: x-large; color:dodgerblue;"></i> <a href=" {{$plik->urlplik}}" target="_blank" class="link-primary">{{$plik->plik_nazwa}}</a>
                    </div>
                @endforeach
            </div>
            @endif


                            @if($zagadnienie->tagi->count()>0)
                <div class="mt-3 fs-6">Tagi</div>

                @foreach($zagadnienie->tagi as $tag)
                    <div class="ms-2 mt-2 fs-6">
                        <i class="bi bi-arrow-left-right" style="font-size: x-large; color:dodgerblue;"></i><a href="{{ route('tagCale', $tag['id']) }}" class="link-primary">{{$tag->nazwa}}</a>
                    </div>
                @endforeach


            @endif

        </div>


        <div class="col-md-4 col-sm-12">
             @if(Str::length($zagadnienie->obrazek1)>5)
            <div class="card mb-5 fs-6" >
                <a href="{{$zagadnienie->urlobrazek1}}" data-lightbox="obrazek1" data-title="{{$zagadnienie->tytulObrazek1}}">
                <img src="{{$zagadnienie->urlobrazek1}}" class="card-img-top" alt="{{$zagadnienie->tytulObrazek1}}"></a>
                <div class="card-body">
                    <h5 class="card-title">{{$zagadnienie->tytulObrazek1}}</h5>
                    <p class="card-text">{{$zagadnienie->podpisObrazek1}}</p>
                   {{-- <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
            @endif

            @if(Str::length($zagadnienie->obrazek2)>5)
                <div class="card mb-5 fs-6" style="width: 18rem;">
                    <a href="{{$zagadnienie->urlobrazek2}}" data-lightbox="obrazek1" data-title="{{$zagadnienie->tytulObrazek2}}">
                        <img src="{{$zagadnienie->urlobrazek2}}" class="card-img-top" alt="{{$zagadnienie->tytulObrazek2}}"></a>
                    <div class="card-body">
                        <h5 class="card-title fs-6">{{$zagadnienie->tytulObrazek2}}</h5>
                        <p class="card-text fs-6">{{$zagadnienie->podpisObrazek2}}</p>
                        {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                    </div>
                </div>
            @endif



        </div>



<!--            <div class="row">
            @if(Str::length($zagadnienie->linkSlownikPdf)>4)
                <div class="mb-2 mt-2 col-md-8 col-sm-12">
                    <div class=" fs-6">
                        Hasło w słowniku apologetycznym z 1894:<br>
                        <a href="http://slownik1894.poradnikdyskutanta.pl/slownik_pdf/{{$zagadnienie->linkSlownikPdf}}" target="_blank">{{$zagadnienie->trescLinku}}</a>
                    </div>
                </div>
            @endif
        </div>-->



    <div class=" col-4 mb-5 mt-3 fs-6 alert alert-primary">Ostatnia modyfikacja: {{$zagadnienie->updated_at->format('Y-m-d')}}</div>

<a href="{{route('zagadnienieCale', $zagadnienie->slug )}}" class="btn btn-primary mb-3" role="button" aria-pressed="true">Wersja podstawowa</a>

    {{--<button class="btn btn-primary mt-5 mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#rozszerzenie" aria-expanded="false" aria-controls="usuwanie">
        Wersja rozszerzona
    </button>--}}
    {{--<div class="collapse" id="rozszerzenie">
        <div class="row">


            <div class="offset-2 col-8" id="rozszerzTresc">{{$zagadnienie->rozszerz}}
                <div id="dodaj" style="color: white; font-size: 1px"> ({{Request::url()}})</div>
            </div>


            <div class="col-2">

                <i class="bi bi-clipboard fs-3" onClick="kopiujCaleRozszerzenie()" id="rozszerzIkona" title="Skopiuj całą treść rozszerzenia do schowka"></i>

            </div>
        </div>
--}}{{-- Skrytp kopujacy treśc całego rozszerzenia! --}}{{--
        <script>
            var komunikat  = document.getElementById("komunikatKopiowanie");
            function kopiujCaleRozszerzenie() {
                var rozszerzTresc    = document.getElementById("rozszerzTresc");
                komunikat.style.display = "block";

                // console.log(rozszerzTresc);
                let range = new Range();
                range.selectNodeContents(rozszerzTresc);
               // range.setStart(rozszerzTresc.firstChild, 0);
               // range.setEnd(rozszerzTresc.firstChild, tresc.firstChild.length);
                document.getSelection().removeAllRanges();
                document.getSelection().addRange(range);

                try {
                    var ok = document.execCommand('copy');
                    if (ok) komunikat.innerHTML = 'Skopiowano wersję rozszerzoną do schowka!';
                    else    komunikat.innerHTML = 'Nieudało się skopiować!';
                } catch (err) {
                    komunikat.innerHTML = 'Twoja przeglądarka nie obsługuje funkcji kopiowania!';
                }
                //odznaczamy zaznaczenie
                document.getSelection().removeAllRanges();
                // czyszczenie komunikatu
                setTimeout(wyczyscKomunikat, 10000);
            }

            function wyczyscKomunikat() {
                komunikat.style.display = "none";
                komunikat.innerHTML = '';

            }

        </script>
    </div>
--}}


  @auth
      @if(Auth::user()->hasVerifiedEmail())
        @if($zagadnienie->uwagi->count()>0)
        <div class="mb-3 mt-3 fs-6">
        <div class=" fs-6">Uwagi do tego zagadnienia:</div>
        @foreach($zagadnienie->uwagi as $uwaga)
            <div class="ms-2 mt-2 fs-6">

                <i class="bi bi-arrow-90deg-right" style="font-size: x-large; color:dodgerblue;"></i><a href="{{ route('uwagaTematPodglad', $uwaga->id) }}" class="link-primary">{{Str::limit($uwaga->naglowek, 50) }}
                </a>

            </div>

        @endforeach
        </div>
@endif

@if(Auth::user()->mozeKomentowac())
    <div class=" fs-6 mt-5">Moja nowa uwaga do tego zagadnienia:</div>

    <form action="{{route('uwagiZapisNowe')}}" method="POST">
    @csrf
        <input type="text" hidden name="do" value="zagadnienie">
        <input type="text" hidden name="zagadnienie_id" value="{{$zagadnienie ->id}}">
        <input type="text" hidden name="slug" value="{{$zagadnienie ->slug}}">
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text fs-6" >Naglowek:</span>
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
                              name="tresc" id="tresc" rows="10">
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
@endif
    @endauth



    <script src="{{ URL::asset('/js/kopiowanie.js')}}"></script>
    <script src="{{ URL::asset('/js/kopiowanieFF.js')}}"></script>
@endsection
