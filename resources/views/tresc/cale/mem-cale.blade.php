@extends('szablon')
@section('title', 'Mem: ')
@section('tresc')

    {{-- dane Open Graph dla facebooka--}}
@section('og_url', Request::url())
@section('og_type', 'image')
@section('og_title', 'Poradnik dyskutant - '.$mem->tytul)
@section('og_description', $mem->podpis)
    @section('og_image', $mem->Urlmem)

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
    <div class="row ">
<div class="offset-2">
        <figure class="figure">
            <figcaption class="figure-caption">{{ $mem->tytul }}</figcaption>
            <img src="{{$mem->Urlmem}}" id="memObrazek" class="figure-img img-fluid rounded kopiowanieObrazka" title="{{ $mem->tytul }}" alt="{{ $mem->tytul }}">

        </figure>
        {{--<div>Ostatnia modyfikacja: {{$mem->created_at->format('Y-m-d H:i:s')}}</div>--}}


<div class="d-flex mt-2 mb-5">
    {{-- Twitter share button--}}
    <a class="twitter-share-button"
       href="https://twitter.com/intent/tweet"
       data-size="large"
       data-lang="pl"
       data-text="{{$mem->tytul}}"
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



    <span class="badge bg-primary"  onClick="pobierzObrazek()"><a href="{{$mem->Urlmem}}" target="_blank" download class="link-light text-decoration-none">Pobierz obrazek</a></span>
    {{--<span class="badge bg-info"  ><a href="{{route('pobierz')}}"  class="link-light text-decoration-none">Pobierz obrazek 2</a></span>--}}
{{--*todo sprawdzić w kolejnych wersjach!!! --}}


<div id="komunikatKopiowanie"></div>
    <span class="badge bg-primary" onClick="ustawienieSciezki('{{$mem->Urlmem}}')" id="kopiujObrazek" >Kopiuj obrazek do schowka</span>
{{--<p>Can write ? <span id="can-write"></span></p>--}}
{{--<button id="copy-img-btn">Copy image to clipboard</button>--}}

</div>
    </div>
    <script src="{{ URL::asset('/js/obrazekKopiowanie.js')}}"></script>
@endsection
