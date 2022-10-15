@extends('szablon')
@section('title', 'Przekaz dnia: '.$przekaz->tytul)
@section('tresc')

    {{-- dane Open Graph dla facebooka--}}
    @section('og_url', Request::url())
    @section('og_type', 'article')
    @section('og_title', 'Poradnik dyskutant - '.$przekaz->tytul)

    {{--@section('og_description', 'Opis  '.$zagadnienie->zajawka)--}}

    @if(Str::length($przekaz->naglowek)>10)
        @section('og_description', Str::limit($przekaz->naglowek, 45))
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
        <ol class="breadcrumb">

        </ol>
    </nav>


    <div class="row fs-5">


        <div class="col-12 ">Przekaz dnia: {{$przekaz->created_at->format('Y-m-d')}}</div>

    </div>

    <div class="row text-center fs-4">


        <div class="col-12 fs-3">{{$przekaz->tytul}}</div>

    </div>
    @include('komponenty.opublikujZaznaczone')
    <div class="row mb-2">

<div  class="col-lg-8 col-md-6 col-sm-12">
    <div id="tresc">
        <div class="mt-2 mb-2 fs-5">{!!  $przekaz->naglowek!!}</div>
        <div class="mb-2">
            <p class="akapit">
                {!! Str::replace("\n","</p><p class='akapit'>",$przekaz->tresc)!!}
            </p>
            <div id="dodaj" style="color: white; font-size: 1px">({{Request::url()}})
            </div>
        </div>
</div>
    <div class="row mt-1">


        <div class="col-12">{{$przekaz->dodal_user_nazwa}}</div>


    </div>
    <div class="d-flex mt-4 mb-4">
        {{-- Twitter share button--}}
        <a class="twitter-share-button"
           href="https://twitter.com/intent/tweet"
           data-size="large"
           data-lang="pl"
           data-text="{{Str::limit(strip_tags($przekaz->tresc), 2900)}}"
           data-url="{{Request::url()}}"
        >
            Tweet
        </a>
        <div class="ms-2">
        <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: pl_PL</script>
        <script type="IN/Share" data-url="{{Request::url()}}"></script></div>

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

        Kopiuj cały przekaz dnia: <i class="bi bi-clipboard fs-2" onClick="kopiujCalaTresc()" id="wszystko" title="Skopiuj całą treść zagadnienia do schowka"></i>
        <div id="komunikatKopiowanie"></div>
    </div>


    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">

        @if(Str::length($przekaz->ramka1)>2)
        <div class=" tlo-szare3 rounded-1 p-1 border border-secondary">{{$przekaz->ramka1}}</div>
        @endif
            @if(Str::length($przekaz->ramka2)>2)
        <div class="tlo-szare3 rounded-1 p-1 border border-secondary mt-3">{{$przekaz->ramka2}}</div>
            @endif

    </div>
    </div>
    @if(Str::length($przekaz->link)>5)
    <div class="row mt-3">

        <div class="col-12"><i class="bi bi-link-45deg fs-4" ></i><a href="{{$przekaz->link}}" target="_blank" class="link-primary">{{$przekaz->link_tresc}}</a></div>


    </div>
    @endif

    <script src="{{ URL::asset('/js/kopiowanie.js')}}"></script>
    <script src="{{ URL::asset('/js/kopiowanieFF.js')}}"></script>

@endsection
