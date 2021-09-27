<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4G7JJM3GW8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-4G7JJM3GW8');
    </script>

    {{--Open Graph dane dla facebooka i Twittera przy udostepnianiu--}}

    <meta property="og:url"           content="@yield('og_url', 'https://poradnikdyskutanta.pl')" />
    <meta property="og:type"           content="@yield('og_type', 'website')" />
    <meta property="og:title"         content="@yield('og_title', 'Poradnik Dyskutanta')" />
    <meta property="og:description"   content="@yield('og_description', 'Pomaga w znalezieniu argumantów podczas internetowej dyskusji')" />
    <meta property="og:image"         content="@yield('og_image', 'https://poradnikdyskutanta.pl/img/poradnikObrazek.jpg')" />

    {{--<meta property="og:image:width"        content="" />
    {{--<meta property="og:image:height"        content="" />
    --}}
    <meta property="og:locale" content="pl_PL" />
    <meta name="twitter:card" content="summary_large_image" />
    {{--Koniec Open Graph --}}

    <title>@yield('title', 'Poradnik dyskutanta')</title>
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-utilities.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/lightbox.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/fonty.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css')}}">
   {{-- <link rel="stylesheet" href="{{ URL::asset('/css/app.css')}}">--}}


    @livewireStyles
</head>
<body class="d-flex flex-column min-vh-100">
{{--
Święty Michale Archaniele,
 wspomagaj nas w walce, a przeciw niegodziwości
  i zasadzkom złego ducha bądź naszą obroną.
   Oby go Bóg pogromić raczył, pokornie o to prosimy,
    a Ty, Wodzu niebieskich zastępów, szatana i inne
     duchy złe, które na zgubę dusz ludzkich po tym
      świecie krążą, mocą Bożą strąć do piekła. Amen.
--}}
@include('cookieConsent::index')
<nav class="navbar navbar-expand-lg navbar-light tlo-nav" >
    <div class="container-fluid">
        <a class="navbar-brand fs-3" href="/" style="color:#dc3545">
            <img src="{{ URL::asset('/img/logoPoradnik.png')}}" width="226" height="80" title="PoradnikDyskutanta.pl wersja Alfa" alt="PoradnikDyskutanta.pl wersja Alfa">


        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTresc"
                aria-controls="navbarTresc" aria-expanded="false" aria-label="Toggle navigation"

                data-toggle="collapse" data-target="#navbarTresc"
        >
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarTresc">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('tematy')}}" style="color: #fff;">Tematy&nbsp;dyskusji</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('znalezione')}}" style="color: #fff;">Znalezione</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('memy')}}" style="color: #fff;">Memy</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('wsparcie')}}" style="color: #fff;">Wsparcie</a>
                </li>

                @auth
                    @if(Auth::user()->hasVerifiedEmail())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('miejsca')}}"  style="color: #fff;">Miejsca&nbsp;dyskusji</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('przekazdnia')}}"  style="color: #fff;">Przekaz&nbsp;dnia</a>
                    @endif
                @endauth

            </ul>
            <form class="d-flex" method="POST" action="{{ route('szukaj') }}">
                @csrf
                <input class="form-control me-2" name="szukane" type="search" placeholder="Szukaj" aria-label="Szukaj">
                <button class="btn btn-primary" type="submit">Szukaj</button>
            </form>
            </li>
        </div>
    </div>
</nav>


<div class="container-fluid d-flex align-items-center justify-content-end mt-2 mb-2">

    {{-- Wyświetlanie social na strone głownej--}}
    @if(isset($strona_glowna))

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


        <div class="d-flex mt-4 mb-4 me-5">
            {{-- Twitter share button--}}
            <a class="twitter-share-button"
               href="https://twitter.com/intent/tweet"
               data-size="large"
               data-lang="pl"
               data-text="Poradnik Dyskutanta pomaga w znalezieniu argumantów podczas internetowej dyskusji!"
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



        @endif


    {{-- w zależności od zalgowania pojawiją się odpowiednie przyciski--}}
    @auth
        <div class="fw-bold text-primary fs-6 me-3">{{ Auth::user()->name }}</div>
        <a href="#wylogowanie" class="btn btn-outline-info me-2" role="button" aria-pressed="true">
            <i class="bi bi-person-dash-fill"></i> Wyloguj</a>

        <a href="{{route('ustawieniaDane')}}" class="btn btn-outline-warning me-2" role="button" aria-pressed="true">
            <i class="bi bi-person-lines-fill"></i> Moje konto</a>


    @else
        <a href="{{route('register')}}" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">
            <i class="bi bi-person-plus-fill"></i> Rejestracja</a>
        <a href="{{route('login')}}" class="btn btn-outline-success me-2" role="button" aria-pressed="true">
            <i class="bi bi-person-check-fill"></i> Logowanie</a>

    @endauth

</div>

<div class="container mt-2 mb-2">

    @if(isset($zagadnienia_karuzela) && $zagadnienia_karuzela->count()>1)
@include('dodatki.karuzela', ['zagadnienia_karuzela'=>$zagadnienia_karuzela])

        @endif
</div>



<div class="container justify-content-center" id="zawartoscGlowna">

<div class="row text-center" id="tytul">


</div>
    {{-- Komunikaty - Start--}}
    @include('dodatki.komunikaty')
    {{-- Komunikaty - Koniec --}}

    <div class="mb-5"></div>
    @yield('tresc')



    <div>
        {{--reklama googla--}}
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3561469657068826"
                crossorigin="anonymous"></script>
        <!-- DomyslnaPoradnik -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-3561469657068826"
             data-ad-slot="1539392620"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        {{--koniec reklamy googla--}}
    </div>
    <div class="mt-5 mb-5"></div>


    <button onclick="topFunction()" id="myBtn" title="Do góry">Do góry</button>

</div>
{{--Koniec zawartości głownej--}}

<footer class="tlo-nav mt-auto py-2 tlo-nav">

    <div class="col-12 text-center" style="color: white">&reg; PoradnikDyskutanta 2021 </div>
    <div class="col-12 text-center " ><a class="link-white" href="{{route('kontakt')}}"  style="color: white">Kontakt</a>
        <a class="link-dark" href="{{route('regulamin')}}"  style="color: white">Regulamin</a>
        <a class="link-dark" href="{{route('dzialyWszystkie')}}"  style="color: white">Wszystkie działy</a>

    </div>
    @php
       $motto=rand(1, 2);
    @endphp
    <div class="offset-2 col-9 mt-2" style="color: white"><i>
            @if($motto==1)
                {{--{{$motto}}--}}
            Zawsze bądźcie gotowi udzielić odpowiedzi tym, którzy pragnęliby wyjaśnień co do ożywiającej was nadziei
        @elseif($motto==2)
               {{-- {{$motto}}--}}
                Bądźcie zawsze gotowi do obrony wobec każdego, kto domaga się od was uzasadnienia tej nadziei, która w was jest
       @endif

        </i>(1P 3,15)</div>

    @auth<div class="fs-6 kolorBialy">Wersja: 0.108</div>@endauth


</footer>



@auth
    <form method="POST" id="wylogowanie_form" action="{{ route('wylogowanie') }}" >
        @csrf
    </form>
    <script>
        document.querySelector("a[href='#wylogowanie']").addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector("#wylogowanie_form").submit();
        }, false);
    </script>
@endauth
@livewireScripts

</body>
<script src="{{ URL::asset('/js/jquery-3.5.1.min.js')}}"></script>
{{--
kłóci się z NAVbarem - menu się nie zwija...
<script src="{{ URL::asset('/js/bootstrap-js/bootstrap.min.js')}}"></script>--}}
<script src="{{ URL::asset('/js/bootstrap-js/bootstrap.bundle.min.js')}}"></script>
{{--<script src="{{ URL::asset('/js/bootstrap-js/bootstrap.esm.js')}}"></script>--}}
<script src="{{ URL::asset('/js/scriptsWspolne.js')}}"></script>
<script src="{{ URL::asset('/js/lightbox.js')}}"></script>
{{--<script src="{{ URL::asset('/js/app.js')}}"></script>--}}
{{--<script src="{{ URL::asset('/js/mdb/mdb.min.js')}}"></script>--}}

</html>