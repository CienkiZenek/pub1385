@extends('szablon')
@section('title', 'Mem: ')
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>
    <div class="row">

        <figure class="figure">
            <figcaption class="figure-caption">{{ $mem->tytul }}</figcaption>
            <img src="{{$mem->Urlmem}}" class="figure-img img-fluid rounded kopiowanieObrazka" alt="...">
           {{-- {{$mem->Urlmem}}--}}
        </figure>
        {{--<div>Ostatnia modyfikacja: {{$mem->created_at->format('Y-m-d H:i:s')}}</div>--}}

    </div>

    <span class="badge bg-primary"  onClick="pobierzObrazek()"><a href="{{$mem->Urlmem}}" target="_blank" download class="link-light text-decoration-none">Pobierz obrazek</a></span>
    <div id="komunikatKopiowanie"></div>
    <span class="badge bg-primary"  onClick="kopiujObrazekDoSchowka()">Kopiuj obrazek do schowka</span>


    <script src="{{ URL::asset('/js/obrazekKopiowanie.js')}}"></script>
@endsection